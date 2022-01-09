<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KomentarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('komentars')->insert([
            'artikel_id' => 1,
            'user_id' => 2,
            'parent_id' => 0,
            'user_tag_id' => 0,
            'isi' => 'Ini komentar dari user 1',
            'likes' => 2,
            'updated_at' => '2021-12-10 07:23:50'
        ]);
            DB::table('komentars')->insert([
                'artikel_id' => 1,
                'user_id' => 3,
                'parent_id' => 1,
                'user_tag_id' => 2,
                'isi' => 'Ini komentar Balasan User 1 ',
                'likes' => 5,
                'updated_at' => '2021-12-10 07:23:50'
            ]);
        DB::table('komentars')->insert([
            'artikel_id' => 1,
            'user_id' => 3,
            'parent_id' => 0,
            'user_tag_id' => 0,
            'isi' => 'Ini komentar TK 1 ',
            'likes' => 5,
            'updated_at' => '2021-12-10 07:23:50'
        ]);
    }
}
