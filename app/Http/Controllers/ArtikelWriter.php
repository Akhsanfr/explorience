<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ArtikelWriter extends Controller
{
    public function store(Request $request){
        $request->validate([
            'kategori_id'=> 'required',
            'judul'=> 'required',
            'isi'=> 'required'
        ]);

        if($request->edit_id){
            $artikel = Artikel::find($request->edit_id); // Update
            if($request->gambar){
                Storage::delete($artikel->gambar);
                $path = Storage::putFile('artikel', $request->file('gambar'));
                $artikel->gambar = $path;
            }
        } else {
            $request->validate([
                'gambar' => 'required'
            ]);
            $artikel = new Artikel(); // Create
            $path = Storage::putFile('artikel', $request->file('gambar'));
            $artikel->gambar = $path;
        }

        $artikel->slug = Str::slug($request->judul);
        $artikel->kategori_id = $request->kategori_id;
        $artikel->judul = $request->judul;
        $artikel->isi = $request->isi;
        $artikel->user_writer_id = Auth::id();
        $artikel->save();
        return redirect(route('d.artikel'));
    }
}
