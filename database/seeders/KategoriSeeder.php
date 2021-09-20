<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategoris')->insert([
            'nama' => 'Matematika',
            'nama_en' => 'Math',
            'desc' => 'Disiplin ilmu yang paling banyak mendorong perusakan hutan',
            'desc_en' => 'Math is bla bla bla',
            'thumbnail' => '',
        ]);
        DB::table('kategoris')->insert([
            'nama' => 'Fisika',
            'nama_en' => 'Physics',
            'desc' => 'Disiplin ilmu yang penuh misteri rahasia',
            'desc_en' => 'physics is bla bla bla',
            'thumbnail' => '',
        ]);
    }
}
