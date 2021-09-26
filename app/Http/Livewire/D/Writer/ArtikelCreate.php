<?php

namespace App\Http\Livewire\D\Writer;

use App\Models\Artikel;
use App\Models\Kategori;
use Livewire\Component;

class ArtikelCreate extends Component
{
    public $kategoris, $artikel;

    public function mount(){
        // ambil id artikel yang akan d edit, jika ada
        if(session('artikel_id')){
            $this->artikel = Artikel::find(session('artikel_id'));
            session()->forget('artikel_id');
        } ;
        $this->kategoris = Kategori::all();
    }

    public function render()
    {

        session(['page_header' => 'dashboard']);
        session(['page_sidebar' => 'artikel']);
        return view('livewire.d.writer.artikel-create');
    }
}
