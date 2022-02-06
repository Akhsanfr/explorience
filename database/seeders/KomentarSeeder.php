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
            'parent_id' => null,
            // 'user_tag_id' => 0,
            'isi' => 'Ini komentar dari user 2',
            'reply_id' => null,
            // 'likes' => 2,
            'created_at' => '2021-12-10 07:23:50',
            'updated_at' => '2021-12-10 07:23:50'
        ]);
            DB::table('komentars')->insert([
                'artikel_id' => 1,
                'user_id' => 3,
                'parent_id' => 1,
                // 'user_tag_id' => 2,
                'isi' => 'Ini komentar Balasan User 3',
                'reply_id' => 1,
                // 'likes' => 5,
                'created_at' => '2021-12-10 07:23:50',
                'updated_at' => '2021-12-10 07:23:50'
            ]);
            DB::table('komentars')->insert([
                'artikel_id' => 1,
                'user_id' => 3,
                'parent_id' => 1,
                // 'user_tag_id' => 2,
                'isi' => 'Ini komentar Balasan User 2 reply user 3',
                'reply_id' => 2,
                // 'likes' => 5,
                'created_at' => '2021-12-10 07:23:50',
                'updated_at' => '2021-12-10 07:23:50'
            ]);
        DB::table('komentars')->insert([
            'artikel_id' => 1,
            'user_id' => 3,
            'parent_id' => null,
            // 'user_tag_id' => 0,
            'reply_id' => null,
            'isi' => 'Ini komentar TK 1 user 3',

            // 'likes' => 5,
            'created_at' => '2021-12-10 07:23:50',
            'updated_at' => '2021-12-10 07:23:50'
        ]);
    }
}
