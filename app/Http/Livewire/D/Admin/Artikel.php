<?php

namespace App\Http\Livewire\D\Admin;

use Livewire\Component;
use App\Models\Artikel as ArtikelModels;
use Livewire\WithPagination;

class Artikel extends Component
{

    use WithPagination;
    protected $artikels;

    public function mount(){
        $this->artikels = ArtikelModels::with('supervisor', 'writer', 'kategori')->paginate(10);
    }

    public function render()
    {
        session(['page_header' => 'dashboard']);
        session(['page_sidebar' => 'artikel']);
        return view('livewire.d.admin.artikel', ['artikels'=>ArtikelModels::with('supervisor', 'writer', 'kategori')->paginate(10)]);
    }
}
