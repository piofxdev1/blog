<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
// use App\Models\Core\Client;
use App\Models\Blog\Post;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ["name"];

    // retrieve all records
    public function getRecords(){
        return Tag::all();
    }

    // Retrieve specific record based on slug
    public function getRecord($slug){
        return $this->where("slug", $slug)->first();
    }

    /**
     * The posts that belong to the particular tag.
     */
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
