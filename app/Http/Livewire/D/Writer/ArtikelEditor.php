<?php

namespace App\Http\Livewire\D\Writer;

use App\Models\Artikel;
use App\Models\Kategori;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ArtikelEditor extends Component
{
    public $kategoris, $artikel;

    protected $rules = [

        'artikel.gambar' => 'required',

    ];

    public function mount($id){
        if($id !== "new"){
            $this->artikel = Artikel::find($id);
        } ;
        $this->kategoris = Kategori::all();
    }

    // public function save(){
    //     $this->artikel->slug = Str::slug($this->artikel->judul);
    //     return $this->artikel->save();
    // }

    public function render()
    {

        session(['page_header' => 'dashboard']);
        session(['page_sidebar' => 'artikel']);
        return view('livewire.d.writer.artikel-editor');
    }
}
