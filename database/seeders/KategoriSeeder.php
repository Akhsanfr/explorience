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

        $kategories =   [
                            'Akuntansi',
                            'Aset Negara',
                            'Hukum',
                            'Fisika',
                            'B. Inggris',
                            'Psikologi',
                            'Kesehatan',
                            'Hukum',
                            'Manajemen',
                            'Statistika',
                            'Geografi',
                            'Sosiologi',
                            'Trivia',
                            'Indonesiaku',
                        'Lentera Islami'];

        foreach( $kategories as $key => $kategori ){

            DB::table('kategoris')->insert([
                'nama' => "$kategori",
                'nama_en' => "En Version of $kategori",
                'desc' => "Desc nya $kategori",
                'desc_en' => "Desc En nya $kategori",
                'thumbnail' => ($key + 1).".png",
            ]);

        }
    }
}
