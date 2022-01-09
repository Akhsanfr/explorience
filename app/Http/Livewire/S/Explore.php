<?php

namespace App\Http\Livewire\S;

use App\Models\Kategori;
use Livewire\Component;

class Explore extends Component
{

    public $kategoris;

    public function getData(){

        $this->kategoris = Kategori::all();

    }

    public function mount(){
        $this->getData();
    }

    public function render()
    {
        session(['page_header' => 'explore']);
        return view('livewire.s.explore');
    }
}
