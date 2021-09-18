<?php

namespace App\Http\Livewire\D;

use App\Models\Role;
use App\Models\User as ModelsUser;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class User extends Component
{
    public $users;
    public $roles;
    public $data_modal;
    public $edit_mode;

    public function open_modal($user_id){
        $this->data_modal = ModelsUser::with('roles')->where('id', $user_id)->first();
    }

    public function close_modal(){
        $this->data_modal = null;
    }

    public function pilih_role($role_id){
        $this->data_modal->roles()->toggle($role_id);
    }

    public function ubah_mode(){
        if($this->edit_mode){
            $this->users = ModelsUser::whereHas('roles', function (Builder $query){
                $query->where('nama', 'admin')
                        ->orWhere('nama', 'writer')
                        ->orWhere('nama', 'supervisor')
                        ->orWhere('nama', 'podcaster');
            })->get();
            $this->edit_mode = false;
        } else {
            $this->users = ModelsUser::whereDoesntHave('roles', function (Builder $query){
                $query->where('nama', 'admin')
                    ->orWhere('nama', 'writer')
                    ->orWhere('nama', 'supervisor')
                    ->orWhere('nama', 'podcaster');
            })->get();
            $this->edit_mode = true;
        }
    }

    public function mount(){
        $this->users = ModelsUser::whereHas('roles', function (Builder $query){
            $query->where('nama', 'admin')
                    ->orWhere('nama', 'writer')
                    ->orWhere('nama', 'supervisor')
                    ->orWhere('nama', 'podcaster');
        })->get();
        $this->roles = Role::all();
    }

    public function ubah_active($id){
        $user = ModelsUser::find($id);
        $user->is_active = !$user->is_active;
        $user->save();
    }

    public function render()
    {
        session(['page_header' => 'dashboard']);
        session(['page_sidebar' => 'user']);
        return view('livewire.d.user');
    }
}
