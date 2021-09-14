<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'nama',
        'email',
        'google_id',
        'avatar'
    ];

    public function roles(){
        return $this->belongsToMany(Role::class);
    }
    public function role($role_match){
        $roles = $this->roles;
        foreach($roles as $role){
            if($role->nama == $role_match){
                return true;
            }
        }
        return false;
    }
}
