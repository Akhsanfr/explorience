<?php

namespace App\Http\Livewire\D;

use App\Models\Artikel;
use App\Models\Kategori;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ArtikelWriter extends Component
{
    public $artikels;

    public function edit($id){
        session(['artikel_id' => $id]);
        return redirect(route('d.artikel.writer.create'));
    }

    public function render()
    {
        $this->artikels = Artikel::with(['writer','kategori'])->where('user_writer_id', Auth::id())->get();

        session(['page_header' => 'dashboard']);
        session(['page_sidebar' => 'artikel']);
        return view('livewire.d.artikel-writer');
    }
}
