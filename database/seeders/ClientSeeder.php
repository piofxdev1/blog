<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('clients')->insert([
            'name' => 'Piofx App',
            'domain' => 'piofxapp.test',
            'settings' => '{"theme":"default","themeview":"themes.default"}'
        ]);

        DB::table('clients')->insert([
            'name' => 'Piofx',
            'domain' => 'piofx.test',
            'settings' => '{"theme":"default","themeview":"themes.default"}'
        ]);

        DB::table('clients')->insert([
            'name' => 'PacketPrep',
            'domain' => 'techpp.test',
            'settings' => '{"theme":"pp","themeview":"themes.pp"}'
        ]);

        DB::table('clients')->insert([
            'name' => 'Skashi',
            'domain' => 'sakshi.test',
            'settings' => '{"theme":"sakshi","themeview":"themes.sakshi"}'
        ]);
    }
}
