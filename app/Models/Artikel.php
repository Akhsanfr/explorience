<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;

    public function kategori(){
        return $this->belongsTo(Kategori::class);
    }

    public function writer(){
        return $this->belongsTo(User::class, 'user_writer_id');
    }

    public function supervisor(){
        return $this->belongsTo(User::class, 'user_supervisor_id');
    }

    public function likes(){
        return $this->belongsToMany(User::class);
    }

    public function komentars(){
        return $this->hasMany(Komentar::class);
    }
}
