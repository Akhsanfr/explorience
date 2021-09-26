<?php

namespace App\Http\Livewire\D\Admin;

use Livewire\Component;
use App\Models\Artikel as ArtikelModels;

class Artikel extends Component
{

    public $artikels;

    public function mount(){
        $this->artikels = ArtikelModels::with('supervisor', 'writer', 'kategori')->get();
    }

    public function render()
    {
        session(['page_header' => 'dashboard']);
        session(['page_sidebar' => 'artikel']);
        return view('livewire.d.admin.artikel');
    }
}
