<?php

namespace App\Http\Livewire\S;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\Artikel as ModelsArtikel;
use App\Models\Komentar;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class Artikel extends Component
{
    use AuthorizesRequests;

    public $artikel;
    public $warnaColorLikes;

    public function mount($slug){
        $this->getArtikel($slug);
    }

    public function getArtikel($slug){
        $this->artikel = ModelsArtikel::where('slug', $slug)->first();
    }

    public function getKomentar(){
        $komentars = [];
        foreach(Komentar::where('artikel_id', $this->artikel->id)->get() as $k){
            $komentar = $k->toArray();
            $komentar['user'] = $k->user->nama;
            $komentar['avatar'] = $k->user->avatar;
            // if have tag, get name the user
            if($komentar['user_tag_id'] != 0){
                $komentar['userTagNama'] = $k->userTag->nama;
            }
            array_push($komentars, $komentar);
        }
        return json_encode($komentars);
    }

    public function addKomentar($parent_id, $isi, $user_tag_id){
        if(is_null(Auth::id())){
            return 'Silakan Anda login terlebih dahulu';
        }
        $komentar = new Komentar();
        $komentar->artikel_id = $this->artikel->id;
        $komentar->user_id = Auth::id();
        $komentar->parent_id = $parent_id;
        $komentar->user_tag_id = $user_tag_id;
        $komentar->isi = $isi;
        $komentar->likes = 0;
        if($komentar->save()){
            return 'sukses';
        } else {
            return 'gagal';
        }
    }

    public function likes(){
        if(is_null(Auth::user())){
            return json_encode([
                "status" => "failed",
                "message" => "Silakan Anda login terlebih dahulu!"
            ]);
        } else {
            $this->artikel->likes()->toggle([Auth::id()]);
            return json_encode([
                "status" => "OK",
                "warna" => $this->setColorLikes()
            ]);
        }
    }

    public function setColorLikes(){
        $isUserLike = DB::table('artikel_user')->where('artikel_id', $this->artikel->id)->where('user_id', Auth::id())->first();
        if(is_null($isUserLike)){
            return "text-primary-content";
        } else {
            return "text-primary";
        }
    }

    public function likesKomentar($komentar_id){
        if(is_null(Auth::user())){
            return json_encode([
                "status" => "failed",
                "message" => "Silakan Anda login terlebih dahulu!"
            ]);
        } else {
            $komentar = Komentar::find($komentar_id);
            $komentar->likes()->toggle([Auth::id()]);
            return json_encode([
                "status" => "OK",
                "pesan" => 'Sukses',
            ]);
        }
    }

    public function getLikesKomentar(){
        return json_encode(DB::table('komentar_user')->where('user_id', Auth::id())->get());

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
        if(is_null($this->artikel)){
            return view('pages.404');
        } else {
            return view('livewire.s.artikel');
        }
    }
}
