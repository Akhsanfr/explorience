<?php

namespace App\Http\Livewire\C;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

use Laravel\Socialite\Facades\Socialite;

class GoogleLogin extends Component
{
    public function mount(){
        $user = Socialite::driver('google')->user();
        $user_lama = User::where('google_id', $user->getId())->first();
        if($user_lama){
            $user_lama->google_id = $user->getId();
            $user_lama->nama = $user->getName();
            $user_lama->email = $user->getEmail();
            $user_lama->avatar = $user->getAvatar();
            $user_lama->save();
            Auth::login($user_lama);
        } else {
            $user_baru = new User();
            $user_baru->google_id = $user->getId();
            $user_baru->nama = $user->getName();
            $user_baru->email = $user->getEmail();
            $user_baru->avatar = $user->getAvatar();
            $user_baru->save();
            $user_baru->roles()->attach(5);
            Auth::login($user_baru);
        }
        return redirect(session('page_login'));
    }

    public function render()
    {
        return view('livewire.c.google-login');
    }
}
