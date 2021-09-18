<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArtikelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('artikels')->insert([
            'slug' => 'ini-judul-user-a',
            'judul' => 'Ini Judul - User A',
            'judul_en' => 'Ini judul - En',
            'isi' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Excepturi expedita optio fuga atque illo culpa. Sint itaque aperiam illum amet.',
            'isi_en' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Excepturi expedita optio fuga atque illo culpa. Sint itaque aperiam illum amet. -en ',
            'user_writer_id' => 2,
            'kategori_id' => 1
        ]);
        DB::table('artikels')->insert([
            'slug' => 'ini-judul-2-user-a',
            'judul' => 'Ini Judul 2 - User A',
            'judul_en' => 'Ini judul 2 - En',
            'isi' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Excepturi expedita optio fuga atque illo culpa. Sint itaque aperiam illum amet.',
            'isi_en' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Excepturi expedita optio fuga atque illo culpa. Sint itaque aperiam illum amet. -en ',
            'user_writer_id' => 2,
            'kategori_id' => 1
        ]);
        DB::table('artikels')->insert([
            'slug' => 'ini-judul-user-b',
            'judul' => 'Ini Judul - User B',
            'judul_en' => 'Ini judul - En',
            'isi' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Excepturi expedita optio fuga atque illo culpa. Sint itaque aperiam illum amet.',
            'isi_en' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Excepturi expedita optio fuga atque illo culpa. Sint itaque aperiam illum amet. -en ',
            'user_writer_id' => 3,
            'kategori_id' => 1
        ]);
    }
}
