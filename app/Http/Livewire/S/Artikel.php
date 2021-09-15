<?php

namespace App\Http\Livewire\S;

use Livewire\Component;

class Artikel extends Component
{
    public function render()
    {
        session(['page_header' => '']);
        return view('livewire.s.artikel');
    }
}
