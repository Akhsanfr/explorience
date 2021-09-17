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
            'nama' => 'matematika',
            'nama_en' => 'Math',
            'desc' => 'Matematika adalah ilmu yang paling banyak mendorong perusakan hutan',
            'desc_en' => 'Math is bla bla bla'
        ]);
    }
}
