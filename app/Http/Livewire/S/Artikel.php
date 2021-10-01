<?php

namespace App\Http\Livewire\S;

use Livewire\Component;
use App\Models\Artikel as ModelsArtikel;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class Artikel extends Component
{
    use AuthorizesRequests;

    public $artikel;

    public function mount($slug){
        $this->artikel = ModelsArtikel::where('slug', $slug)->first();
    }

    public function edit($id){
        session(['artikel_id' => $id]);
        return redirect(route('d.writer.artikel.create'));
    }

    public function verif(){
        $this->authorize('supervisor');
        $this->artikel->is_active = !$this->artikel->is_active;
        if($this->artikel->is_active){
            $this->artikel->user_supervisor_id = Auth::id();
        } else {
            $this->artikel->user_supervisor_id = null;
        }
        $this->artikel->save();
    }

    public function render()
    {
        session(['page_header' => '']);
        return view('livewire.s.artikel');
    }
}
