<?php

namespace App\Http\Livewire\D;

use Livewire\Component;
use App\Models\Artikel as ArtikelModels;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Artikel extends Component
{
    use AuthorizesRequests;
    protected $artikels = [];

    public function mount(){
        $artikels = ArtikelModels::with(['writer','kategori']);
        $user = Auth::user();
        if($user->role('writer')){
            $artikels->where('user_writer_id', $user->id);
        }
        $this->artikels = $artikels->orderBy('updated_at', "DESC")->paginate(10);
    }

    public function render()
    {
        session(['page_header' => 'dashboard']);
        session(['page_sidebar' => 'artikel']);
        return view('livewire.d.artikel', ['artikels' => $this->artikels]);
    }
}
