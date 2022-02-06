<?php

namespace App\Http\Livewire\C;

use App\Models\Artikel;
use Livewire\Component;

use App\Models\Komentar as ModelKomentar;

class Komentar extends Component
{
    public $artikel_id;
    public $auth_user_id;

    // === KOMENTAR === //
    public $komentars;
    protected function getKomentars(){
        $this->komentars = ModelKomentar
            ::with(['user', 'likes', 'parent.user'])
            ->withCount('likes')
            ->where('artikel_id', $this->artikel_id)
            ->get();
    }

    // === STORE NEW PARENT KOMENTAR === ///

    public $komentar;
    public function storeKomentar(){
        $this->validate([
            'komentar.isi' => 'required',
        ]);
        $komentar = new ModelKomentar();
        $komentar->artikel_id = $this->artikel_id;
        $komentar->user_id = auth()->id();
        $komentar->isi = $this->komentar['isi'];
        $komentar->save();
        $this->komentar = null;
        $this->getKomentars();
    }

    // === STORE NEW CHILD KOMENTAR === //

    public $child_komentar;
    public function storeChildKomentar($parentId, $replyId){
        $this->validate([
            'child_komentar.isi' => 'required',
        ]);
        $komentar = new ModelKomentar();
        $komentar->artikel_id = $this->artikel_id;
        $komentar->user_id = auth()->id();
        $komentar->parent_id = $parentId;
        // $komentar->user_tag_id = $userTagId;
        $komentar->reply_id = $replyId;
        $komentar->isi = $this->child_komentar['isi'];
        $komentar->save();
        $this->child_komentar = null;
        $this->dispatchBrowserEvent('close-form-child-komentar');
        $this->getKomentars();
    }

    // === LIKE KOMENTAR === //
    public function likes(ModelKomentar $komentar){
        $komentar->likes()->toggle(auth()->id());
         $this->getKomentars();
    }

    public function mount($artikelId, $authUserId){
        $this->artikel_id = $artikelId;
        $this->auth_user_id = $authUserId;
        $this->getKomentars();
    }

    public function render()
    {
        // @dd(auth()->user());
        return view('livewire.c.komentar');
    }
}
