<?php

namespace App\Http\Livewire\S;

use App\Models\Artikel;
use Livewire\Component;

class Trending extends Component
{

    public $artikels;

    public function getData(){

        $sekarang = date_timestamp_get(date_create());
        $sebulan = 60*60*24*30;
        $tanggal = date('Y-m-d H:i:s', ($sekarang - $sebulan));
        $this->artikels = Artikel::where('updated_at', '>', $tanggal)
            ->withCount('likes')
            ->orderBy('likes_count', 'desc')->get();

    }

    public function mount(){

        $this->getData();

    }

    public function render()
    {
        session(['page_header' => '']);
        return view('livewire.s.trending');
    }
}
