<?php

namespace App\Http\Livewire\C;

use Livewire\Component;

use Laravel\Socialite\Facades\Socialite;

class Header extends Component
{

    public function render()
    {
        return view('livewire.c.header');
    }
}
