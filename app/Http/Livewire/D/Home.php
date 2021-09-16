<?php

namespace App\Http\Livewire\D;

use Livewire\Component;
use App\Models\User;

class Home extends Component
{

    public function render()
    {
        session(['page_header' => 'dashboard']);
        session(['page_sidebar' => 'home']);
        return view('livewire.d.home');
    }
}
