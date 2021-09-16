<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'nama' => 'admin',
        ]);
        DB::table('roles')->insert([
            'nama' => 'supervisor',
        ]);
        DB::table('roles')->insert([
            'nama' => 'writer',
        ]);
        DB::table('roles')->insert([
            'nama' => 'podcaster',
        ]);
        DB::table('roles')->insert([
            'nama' => 'guest',
        ]);
    }
}
