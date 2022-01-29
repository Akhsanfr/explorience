<?php

namespace App\Http\Livewire\D\Writer;

use App\Models\Artikel as ArtikelModels;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Artikel extends Component
{
    public function render()
    {
        session(['page_header' => 'dashboard']);
        session(['page_sidebar' => 'artikel']);
        return view('livewire.d.writer.artikel', ['artikels' => ArtikelModels::with(['writer','kategori'])->where('user_writer_id', Auth::id())->paginate(10)]);
    }
}
