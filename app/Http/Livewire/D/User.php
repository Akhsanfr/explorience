<?php

namespace App\Http\Livewire\D;

use App\Models\Role;
use App\Models\User as UserModel;
use Livewire\Component;

class User extends Component
{
    public $users;
    public $roles;
    public $user_modal;

    public function open_modal($user_id){
        $this->user_modal = UserModel::with('roles')->where('id', $user_id)->first();
    }

    public function close_modal(){
        $this->user_modal = null;
    }

    public function pilih_role($role_id){
        $this->user_modal->roles()->toggle($role_id);
    }

    public function render()
    {
        $this->users = UserModel::with('roles')->get();
        $this->roles = Role::all();
        session(['page_header' => 'dashboard']);
        session(['page_sidebar' => 'user']);
        return view('livewire.d.user');
    }
}
