<?php

namespace App\Http\Livewire\S;

use App\Models\Artikel;
use Livewire\Component;

class Home extends Component
{

    public $newRelease;
    public $trending;
    public $forYou;

    public function getDataNewRelease(){

        $this->newRelease = Artikel
            ::with('kategori')
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

    public function mount(){

        $this->getDataNewRelease();
        $this->getDataTrending();

    }

    public function render()
    {

        session(['page_header' => 'home']);
        return view('livewire.s.home');

    }
}
