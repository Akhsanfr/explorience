<?php

namespace App\Http\Livewire\D\Writer;

use App\Models\Artikel;
use App\Models\Kategori;
use Livewire\Component;

class ArtikelEditor extends Component
{
    public $kategoris, $artikel;

    public function mount($id){
        if($id !== "new"){
            $this->artikel = Artikel::find($id);
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
