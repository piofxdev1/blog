<?php

namespace App\Http\Controllers\Blog;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DB;

use App\Models\Blog\Category as Obj;
use App\Models\Blog\Post;
use App\Models\Blog\Tag;

class CategoryController extends Controller
{
    /**
     * Define the app and module object variables and component name 
     *
     */
    public function __construct(){
      // load the app, module and component name to object params
      $this->app      =   'Blog';
      $this->module   =   'Category';
      $theme = session()->get('theme');
      $this->componentName = 'themes.'.$theme.'.layouts.app';
    }
  
    public function index(Obj $obj)
    {
        // Retrieve all records
        $objs = $obj->getRecords();

        return view("apps.".$this->app.".".$this->module.".index")
                ->with("app", $this)
                ->with("objs", $objs);    
    }

    public function show($slug, Obj $obj, Post $post, Tag $tag)
    {    
      // Retrieve specific Record based on slug
      $category = $obj->getRecord($slug);
      // Get id of the particular record
      $id = $category->id;
      
      // Retrieve records based on category id
      $posts = $post->where("category_id", $id)->simplePaginate(5);

      // Retrieve all categories
      $objs = $obj->getRecords();
      // Retrieve all tags
      $tags = $tag->getRecords();
              
      return view("apps.".$this->app.".".$this->module.".show")
              ->with("app", $this)
              ->with("objs", $objs)
              ->with("category", $category)
              ->with("posts", $posts)
              ->with("tags", $tags);
    }

    public function create(Obj $obj)
    {
      // authorize the app
      $this->authorize('create', $obj);

      return view("apps.".$this->app.".".$this->module.".createEdit")
            ->with('stub', "create")
            ->with("app", $this)
            ->with("obj", $obj);
    }

    public function store(Request $request, Obj $obj)
    {
      // Authorize the request
      $this->authorize('create', $obj);
      // Store the records
      $obj = $obj->create($request->all());

      return redirect()->route($this->module.'.index');
    }

    public function edit($slug, Obj $obj)
    {
      // Retrieve Specific record
      $obj = $obj->getRecord($slug);

      return view("apps.".$this->app.".".$this->module.".createEdit")
              ->with("stub", "update")
              ->with("app", $this)
              ->with("obj", $obj);
    }

    public function update($id, Request $request)
    {
        // load the resource
        $obj = Obj::where('id',$id)->first();
        // authorize the app
        $this->authorize('update', $obj);
        //update the resource
        $obj = $obj->update($request->all());
        return redirect()->route($this->module.'.index'); 
    }
    
     public function destroy($id)
     {
        // load the resource
        $obj = Obj::where('id',$id)->first();
        // authorize
        $this->authorize('delete', $obj);
        // delete the resource
        $obj->delete();

        return redirect()->route($this->module.'.index');

    }

}


