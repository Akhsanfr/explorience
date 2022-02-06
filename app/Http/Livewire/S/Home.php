<?php

namespace App\Http\Livewire\S;

use App\Models\Artikel;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class Home extends Component
{
    public $newRelease;
    public $trending;
    public $forYou;
    public $hayukSinau;
    public $dishes;


    // GET DATA BY LAST UPDATED AND AKTIF STATUS
    public function getDataNewRelease(){

        $this->newRelease = Artikel
            ::with('kategori')
            ->where('status_aktivasi', 'aktif')
            ->orderBy('updated_at', 'desc')
            ->limit(4)
            ->get();

    }

    public function getDataTrending(){

        $sekarang = date_timestamp_get(date_create());
        $sebulan = 60*60*24*30;
        $tanggal = date('Y-m-d H:i:s', ($sekarang - $sebulan));
        $this->trending = Artikel::where('updated_at', '>', $tanggal)
            ->withCount('likes')
            ->orderBy('likes_count', 'desc')->get();

    }

    protected function getHayukSinau(){
        $this->hayukSinau = Artikel::whereHas('kategori',function (Builder $query){
            $query->whereIn('nama', ['Akuntansi',
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
                            'Gizi',]);
        })
        ->orderBy('updated_at', "DESC")
        ->limit(4)
        ->get();
    }
    protected function getDishes(){
        $this->dishes = Artikel::whereHas('kategori',function (Builder $query){
            $query->whereIn('nama', ['Trivia',
                            'Indonesiaku',
                            'Lentera Islami',
                            'Ada Apa Dibalik Kata',
                            'Act Project',
                            'Expractixe']);
        })
        ->orderBy('updated_at', "DESC")
        ->limit(4)
        ->get();
    }

    public function mount(){

        $this->getDataNewRelease();
        $this->getDataTrending();
        $this->getHayukSinau();
        $this->getDishes();

    }

    public function render()
    {

        session(['page_header' => 'home']);
        return view('livewire.s.home');

    }
}
