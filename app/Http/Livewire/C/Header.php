<?php

namespace App\Http\Livewire\C;

use Livewire\Component;

use Laravel\Socialite\Facades\Socialite;

class Header extends Component
{
    public function login($url){
        session(['page_login' => $url]);
        return redirect()->to(url('auth/login'));
    }

    public function render()
    {
        return view('livewire.c.header');
    }
}
