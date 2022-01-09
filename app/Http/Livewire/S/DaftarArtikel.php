<?php

namespace App\Http\Livewire\S;

use App\Models\Artikel;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class DaftarArtikel extends Component
{

    public $artikels;

    public function getData($nama){

        $this->artikels = Artikel::with('kategori')->whereHas('kategori', function(Builder $query) use ($nama){
            $query->where('nama', $nama);
        })->get();

    }

    public function mount($nama){

        $this->getData($nama);

    }

    public function render()
    {
        return view('livewire.s.daftar-artikel');
    }
}
