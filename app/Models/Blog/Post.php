<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

use App\Models\User;
// use App\Models\Core\Client;
use App\Models\Blog\Category;
use App\Models\Blog\Tag;

class Post extends Model
{
    use HasFactory;

    // The attributes that are mass assignable
    protected $fillable = ["title", "slug", "category_id", "tag_id", "image", "excerpt", "content", "meta_title", "meta_description", "status", "published_at"];

    // Retrieve all posts
    public function getRecords($limit, $order){
        return $this->orderBy("id", $order)->simplePaginate($limit);
    }

    // Retrieve specific record based on slug
    public function getRecord($slug){
        return $this->where("slug", $slug)->first();
    }
    
    /**
	 * Get the user that owns the page.
	 *
	 */
	public function user()
	{
	    return $this->belongsTo(User::class);
	}

	//  /**
	//  * Get the client that owns the page.
	//  *
	//  */
	// public function client()
	// {
	//     return $this->belongsTo(Client::class);
    // }
    
    /**
	 * Get the client that owns the page.
	 *
	 */
	public function category()
	{
	    return $this->belongsTo(Category::class);
	}

	/**
     * The tags that belong to the particular post.
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
