<?php

namespace App\Http\Livewire\D;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Artikel extends Component
{
    public $artikels;

    public function mount(){

    }

    public function render()
    {
        session(['page_header' => 'dashboard']);
        session(['page_sidebar' => 'artikel']);

        return view('livewire.d.artikel');
    }
}
