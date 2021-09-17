<?php

namespace App\Http\Livewire\D;

use App\Models\Role;
use App\Models\User as ModelsUser;
use Livewire\Component;

class User extends Component
{
    public $users;
    public $roles;
    public $data_modal;

    public function open_modal($user_id){
        $this->data_modal = ModelsUser::with('roles')->where('id', $user_id)->first();
    }

    public function close_modal(){
        $this->data_modal = null;
    }

    public function pilih_role($role_id){
        $this->data_modal->roles()->toggle($role_id);
    }

    public function render()
    {
        $this->users = ModelsUser::with('roles')->get();
        $this->roles = Role::all();
        session(['page_header' => 'dashboard']);
        session(['page_sidebar' => 'user']);
        return view('livewire.d.user');
    }
}
