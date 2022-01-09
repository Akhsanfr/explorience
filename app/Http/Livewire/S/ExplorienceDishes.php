<?php

namespace App\Http\Livewire\S;

use App\Models\Artikel;
use Livewire\Component;

class ExplorienceDishes extends Component
{
    public $trivias;
    public $indonesiakus;
    public $lenteraIslamis;
    public $hayukSinaus;

    public function getData(){

        $this->trivias = Artikel::with('kategori')->where('kategori_id', 13)->orderBy('updated_at', 'desc')->get();
        $this->indonesiakus = Artikel::with('kategori')->where('kategori_id', 14)->orderBy('updated_at', 'desc')->get();
        $this->lenteraIslamis = Artikel::with('kategori')->where('kategori_id', 15)->orderBy('updated_at', 'desc')->get();
        $this->hayukSinaus = Artikel::with('kategori')->whereNotIn('kategori_id', [13,14,15])->orderBy('updated_at', 'desc')->get();

    }

    public function mount(){
        $this->getData();
    }

    public function render()
    {
        session(['page_header' => 'explorience-dishes']);
        return view('livewire.s.explorience-dishes');
    }
}
