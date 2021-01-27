<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Post 1
        DB::table("post_tag")->insert([
            'post_id' => "1",
            'tag_id' => "1"
        ]);
        DB::table("post_tag")->insert([
            'post_id' => "1",
            'tag_id' => "2"
        ]);
        DB::table("post_tag")->insert([
            'post_id' => "1",
            'tag_id' => "3"
        ]);

        // Post 2
        DB::table("post_tag")->insert([
            'post_id' => "2",
            'tag_id' => "2"
        ]);
        DB::table("post_tag")->insert([
            'post_id' => "2",
            'tag_id' => "3"
        ]);
        DB::table("post_tag")->insert([
            'post_id' => "2",
            'tag_id' => "4"
        ]);

        // Post 3
        DB::table("post_tag")->insert([
            'post_id' => "3",
            'tag_id' => "1"
        ]);
        DB::table("post_tag")->insert([
            'post_id' => "3",
            'tag_id' => "3"
        ]);
        DB::table("post_tag")->insert([
            'post_id' => "3",
            'tag_id' => "5"
        ]);

        // Post 4
        DB::table("post_tag")->insert([
            'post_id' => "4",
            'tag_id' => "2"
        ]);
        DB::table("post_tag")->insert([
            'post_id' => "4",
            'tag_id' => "5"
        ]);

        // Post 5
        DB::table("post_tag")->insert([
            'post_id' => "5",
            'tag_id' => "1"
        ]);
        DB::table("post_tag")->insert([
            'post_id' => "5",
            'tag_id' => "2"
        ]);

        // Post 6
        DB::table("post_tag")->insert([
            'post_id' => "6",
            'tag_id' => "1"
        ]);
        DB::table("post_tag")->insert([
            'post_id' => "6",
            'tag_id' => "2"
        ]);
        DB::table("post_tag")->insert([
            'post_id' => "6",
            'tag_id' => "3"
        ]);
        DB::table("post_tag")->insert([
            'post_id' => "6",
            'tag_id' => "4"
        ]);
        DB::table("post_tag")->insert([
            'post_id' => "6",
            'tag_id' => "5"
        ]);

        // Post 7
        DB::table("post_tag")->insert([
            'post_id' => "7",
            'tag_id' => "1"
        ]);
        DB::table("post_tag")->insert([
            'post_id' => "7",
            'tag_id' => "2"
        ]);
        DB::table("post_tag")->insert([
            'post_id' => "7",
            'tag_id' => "3"
        ]);
        DB::table("post_tag")->insert([
            'post_id' => "7",
            'tag_id' => "4"
        ]);
        DB::table("post_tag")->insert([
            'post_id' => "7",
            'tag_id' => "5"
        ]);

        // Post 8
        DB::table("post_tag")->insert([
            'post_id' => "8",
            'tag_id' => "1"
        ]);
        DB::table("post_tag")->insert([
            'post_id' => "8",
            'tag_id' => "3"
        ]);
        DB::table("post_tag")->insert([
            'post_id' => "8",
            'tag_id' => "5"
        ]);

        // Post 9
        DB::table("post_tag")->insert([
            'post_id' => "9",
            'tag_id' => "4"
        ]);

        // Post 10
        DB::table("post_tag")->insert([
            'post_id' => "10",
            'tag_id' => "1"
        ]);
        DB::table("post_tag")->insert([
            'post_id' => "10",
            'tag_id' => "2"
        ]);
        DB::table("post_tag")->insert([
            'post_id' => "10",
            'tag_id' => "4"
        ]);
    }
}
