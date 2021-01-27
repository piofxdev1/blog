<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("tags")->insert([
            'name' => "Python",
            'slug' => "python"
        ]);

        DB::table("tags")->insert([
            'name' => "PHP",
            'slug' => "php"
        ]);

        DB::table("tags")->insert([
            'name' => "Javascript",
            'slug' => "javascript"
        ]);

        DB::table("tags")->insert([
            'name' => "HTML",
            'slug' => "html"
        ]);

        DB::table("tags")->insert([
            'name' => "Laravel",
            'slug' => "laravel"
        ]);
    }
}
