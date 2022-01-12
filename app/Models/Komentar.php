<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function userTag(){
        return $this->belongsTo(User::class, 'user_tag_id');
    }

    public function likes(){
        return $this->belongsToMany(User::class);
    }

}