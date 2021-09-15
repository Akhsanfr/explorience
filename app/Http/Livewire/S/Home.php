<?php

namespace App\Http\Livewire\S;

use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        // session()->forget('user');
        session(['page_header' => 'home']);
        return view('livewire.s.home');
    }
}
