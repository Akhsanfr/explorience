<?php

namespace App\Http\Livewire\D\Writer;

use App\Models\Artikel as ArtikelModels;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Artikel extends Component
{
    public $artikels;

    public function edit($id){
        session(['artikel_id' => $id]);
        return redirect(route('d.writer.artikel.create'));
    }

    public function render()
    {
        $this->artikels = ArtikelModels::with(['writer','kategori'])->where('user_writer_id', Auth::id())->get();

        session(['page_header' => 'dashboard']);
        session(['page_sidebar' => 'artikel']);
        return view('livewire.d.writer.artikel');
    }
}
