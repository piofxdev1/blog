<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Super Admin',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('superadmin@123'),
            'role'=>'superadmin'
        ]);

        DB::table('users')->insert([
            'name' => 'Super Editor',
            'email' => 'supereditor@gmail.com',
            'password' => Hash::make('supereditor@123'),
            'role'=>'supereditor'
        ]);

		DB::table('users')->insert([
            'name' => 'Piofx Admin',
            'email' => 'piofxadmin@gmail.com',
            'password' => Hash::make('piofxadmin@123'),
            'client_id'=>2,
            'role'=>'siteadmin'
        ]);

		DB::table('users')->insert([
            'name' => 'Piofx Editor',
            'email' => 'piofxeditor@gmail.com',
            'password' => Hash::make('piofxeditor@123'),
            'client_id'=>2,
            'role'=>'siteeditor'
        ]);

		DB::table('users')->insert([
            'name' => 'PP Admin',
            'email' => 'ppadmin@gmail.com',
            'password' => Hash::make('ppadmin@123'),
            'client_id'=>3,
            'role'=>'siteadmin'
        ]);

		DB::table('users')->insert([
            'name' => 'PP Editor',
            'email' => 'ppeditor@gmail.com',
            'password' => Hash::make('ppeditor@123'),
            'client_id'=>3,
            'role'=>'siteeditor'
        ]);

		DB::table('users')->insert([
            'name' => 'Generic User',
            'email' => 'user@gmail.com',
            'password' => Hash::make('user@123'),
            'role'=>'user'
        ]);
    }
}
