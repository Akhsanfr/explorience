<?php

namespace App\Http\Livewire\D;

use Livewire\Component;
use App\Models\User;

class Home extends Component
{
    public function mount(){
        // $cek = User::find(session('user')->id)->role('admin');
        // dd($cek);
        // // foreach($roles as $role){
        // //     dd($role->nama);
        // // }
    }

    public function render()
    {
        return view('livewire.d.home');
    }
}
