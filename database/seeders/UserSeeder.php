<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'google_id' => '116245708681271289429',
            'nama' => 'Fernanda Akhsanuddin',
            'email' => 'akhsan.fr@gmail.com',
            'avatar' => 'https://lh3.googleusercontent.com/a-/AOh14GgMA4LyPjGaigd6vah1AooX-072ZN61BqO6qwpi=s96-c',
        ]);
        DB::table('users')->insert([
            'google_id' => '112380795769928941547',
            'nama' => '10 Fernanda Akhsanuddin Almas',
            'email' => '4302180033.fernandaakhsanuddin@gmail.com',
            'avatar' => 'https://lh3.googleusercontent.com/a-/AOh14Gj-1swTsmaPJo0_RRbdYhZGmXxY2uuYk3r5cuE-=s96-c',
        ]);
        DB::table('users')->insert([
            'google_id' => '112380795769928941547',
            'nama' => 'Writer B',
            'email' => 'writerB@gmail.com',
            'avatar' => 'https://lh3.googleusercontent.com/a-/AOh14Gj-1swTsmaPJo0_RRbdYhZGmXxY2uuYk3r5cuE-=s96-c',
        ]);
    }
}
