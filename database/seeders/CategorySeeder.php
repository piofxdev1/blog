<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("categories")->insert([
            'name' => 'Web Development',
            'slug' => 'web-development',
            'image' => 'https://source.unsplash.com/random/1920x1080',
            'description' => 'This is just some sample content'
        ]);

        DB::table("categories")->insert([
            'name' => 'Machine Learning',
            'slug' => 'machine-learning',
            'image' => 'https://source.unsplash.com/random/1920x1080',
            'description' => 'This is just some sample content'
        ]);

        DB::table("categories")->insert([
            'name' => 'Android Development',
            'slug' => 'android-development',
            'image' => 'https://source.unsplash.com/random/1920x1080',
            'description' => 'This is just some sample content'
        ]);

        DB::table("categories")->insert([
            'name' => 'Flutter Development',
            'slug' => 'flutter-development',
            'image' => 'https://source.unsplash.com/random/1920x1080',
            'description' => 'This is just some sample content'
        ]);

        DB::table("categories")->insert([
            'name' => 'Content Writing',
            'slug' => 'content-writing',
            'image' => 'https://source.unsplash.com/random/1920x1080',
            'description' => 'This is just some sample content'
        ]);

    }
}
