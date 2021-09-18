<?php

namespace App\Http\Livewire\D;

use Livewire\Component;
use App\Models\Artikel;

class ArtikelSupervisor extends Component
{
    public $artikels;

    public function mount(){
        $this->artikels = Artikel::with('supervisor', 'writer', 'kategori')->get();
    }

    public function render()
    {
        session(['page_header' => 'dashboard']);
        session(['page_sidebar' => 'artikel']);
        return view('livewire.d.artikel-supervisor');
    }
}
