<?php

namespace App\Http\Livewire\S;

use Livewire\Component;
use App\Models\Artikel as ModelsArtikel;

class Artikel extends Component
{
    public $artikel;

    public function mount($slug){
        $this->artikel = ModelsArtikel::where('slug', $slug)->first();
    }

    public function edit($id){
        session(['artikel_id' => $id]);
        return redirect(route('d.artikel.writer.create'));
    }

    public function render()
    {
        session(['page_header' => '']);
        return view('livewire.s.artikel');
    }
}
