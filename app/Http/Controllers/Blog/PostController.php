<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Blog\Post as Obj;
use App\Models\Blog\Category;
use App\Models\Blog\Tag;

class PostController extends Controller
{
    /**
     * Define the app and module object variables and component name 
     *
     */
    public function __construct(){
        // load the app, module and component name to object params
        $this->app      =   'Blog';
        $this->module   =   'Post';
        $theme = session()->get('theme');
        $this->componentName = 'themes.'.$theme.'.layouts.app';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Obj $obj, Category $category, Tag $tag)
    {
        // Retrieve all posts
        $objs = $obj->getRecords(5, 'desc');
        // Retrieve all categories
        $categories = $category->getRecords();
        // Retrieve all tags
        $tags = $tag->getRecords();

        return view("apps.".$this->app.".".$this->module.".index")
                ->with("app", $this)
                ->with("objs", $objs)
                ->with("categories", $categories)
                ->with("tags", $tags);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Obj $obj, Category $category, Tag $tag)
    {
        // Authorize the request
        $this->authorize('create', $obj);
        // Retrieve all categories
        $categories = $category->getRecords();
        // Retrieve all tags
        $tags = $tag->getRecords();

        $this->componentName = 'themes.'.env('ADMIN_THEME').'.layouts.app';

        return view("apps.".$this->app.".".$this->module.".createEdit")
                ->with("stub", "create")
                ->with("app", $this)
                ->with("obj", $obj)
                ->with("categories", $categories)
                ->with("tags", $tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Obj $obj, Request $request)
    {
        // Authorize the request
        $this->authorize('create', $obj);
        
        // Check for when to publish
        if(!empty($request->input('published_at'))){
            $status = 0;
        }
        else{
            if($request->input('publish') == "now" ){
                $status = 1;
            }
            else if($request->input('publish') == "save_as_draft"){
                $status = 0;
            }   
        }
        
        // Store the records
        $obj = $obj->create($request->all() + ['status' => $status]);

        if($request->input('tag_ids')){
            foreach($request->input('tag_ids') as $tag_id){
                if(!$obj->tags->contains($tag_id)){
                    $obj->tags()->attach($tag_id);
                }
            }
        }

        return redirect()->route($this->module.'.posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Obj $obj, $slug)
    {
        // Retrieve specific Record
        $obj = $obj->getRecord($slug);

        return view("apps.".$this->app.".".$this->module.".show")
                ->with("app", $this)
                ->with("obj", $obj);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($slug, Obj $obj, Category $category, Tag $tag)
    {
        // Retrieve Specific record
        $obj = $obj->getRecord($slug);
        // Authorize the request
        $this->authorize('create', $obj);
        // Retrieve all categories
        $categories = $category->getRecords();
        // Retrieve all tags
        $tags = $tag->getRecords();

        $this->componentName = 'themes.'.env('ADMIN_THEME').'.layouts.app';

        return view("apps.".$this->app.".".$this->module.".createEdit")
                ->with("stub", "update")
                ->with("app", $this)
                ->with("obj", $obj)
                ->with("categories", $categories)
                ->with("tags", $tags);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Obj $obj, $id)
    {

        // load the resource
        $obj = Obj::where('id',$id)->first();
        // authorize the app
        $this->authorize('update', $obj);

        // Check for when to publish
        if(!empty($request->input('published_at'))){
            $status = 0;
        }
        else{
            if($request->input('publish') == "now" ){
                $status = 1;
            }
            else if($request->input('publish') == "save_as_draft"){
                $status = 0;
            }   
        }   

        //update the resource
        $obj->update($request->all() + ['status' => $status]);

        $obj->tags()->detach();

        if($request->input('tag_ids')){
            foreach($request->input('tag_ids') as $tag_id){
                if(!$obj->tags->contains($tag_id)){
                    $obj->tags()->attach($tag_id);
                }
            }
        }
        
        return redirect()->route($this->module.'.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        // load the resource
        $obj = Obj::where('id',$id)->first();
        // authorize
        $this->authorize('update', $obj);
        // delete the resource
        $obj->delete();

        return redirect()->route($this->module.'.list');
    }

    // Search for blog posts
    public function search(Obj $obj, Request $request){
        // Get the search query
        $query = $request->input("query");

        // Retrieve posts which match the given title query
        $objs = $obj->where("title", "LIKE", "%".$query."%")->simplePaginate(5);

        return view("apps.".$this->app.".".$this->module.".search")
                ->with("app", $this)
                ->with("objs", $objs);
    }

    // List all Posts
    public function list(Obj $obj){
        // Retrieve all records
        $objs = $obj->getRecords(5, 'desc');
        // Authorize the request
        $this->authorize('create', $obj);

        $this->componentName = 'themes.'.env('ADMIN_THEME').'.layouts.app';

        return view("apps.".$this->app.".".$this->module.".posts")
                ->with("app", $this)
                ->with("objs", $objs);    
    }

    public function upload_image(){

		$input = Input::all();
		$rules = array(
		    'file' => 'image|max:3000',
		);

		$validation = Validator::make($input, $rules);

		if ($validation->fails())
		{
			return Response::make($validation->errors->first(), 400);
		}

		$file = Input::file('file');

        $extension = File::extension($file['name']);
        // $directory = path('public').'uploads/'.sha1(time());
        $filename = sha1(time().time()).".{$extension}";

        // $upload_success = Input::upload('file', $directory, $filename);

        
        $upload_success = Storage::disk('local')->put('uploads'.$filename, $file);

        if( $upload_success ) {
        	return Response::json('success', 200);
        } else {
        	return Response::json('error', 400);
        }
	}

}
