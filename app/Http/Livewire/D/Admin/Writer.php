<?php

namespace App\Http\Livewire\D\Admin;

use App\Models\Kategori;
use App\Models\User;
use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;

class Writer extends Component
{
    public $writers;
    public $data_modal;
    public $kategoris;

    public function mount(){
        $this->writers = User::with(['roles', 'kategoris'])->whereHas('roles', function (Builder $query){
            $query->where('nama', 'writer');
        })->get();
        $this->kategoris = Kategori::all();
    }

    public function open_modal($id){
        $this->data_modal = User::find($id);
    }

    public function close_modal(){
        $this->data_modal = null;
    }

    public function pilih_kategori($kategoriId){
        // If detach
        $cek_kategori_dipilih = $this->data_modal->kategoris->where('id', $kategoriId)->first();
        if(!is_null($cek_kategori_dipilih)){
            $this->pilih_status($kategoriId, 'nonaktifkan');
        }
        $this->data_modal->kategoris()->toggle($kategoriId);
        $this->mount();
        $this->data_modal = User::find($this->data_modal->id);
    }

    public function pilih_status($kategoriId, $mode="aktifkan"){
        if($mode == 'aktifkan'){
            // Kebalikan dari status sebelumnya
            $status = !$this->data_modal->kategoris->where('id', $kategoriId)->first()->pivot->is_active;
        } else {
            $status = false;
        }
        $this->data_modal->kategoris()->updateExistingPivot($kategoriId, [
            'is_active' => $status,
        ]);
    }

    public function render()
    {
        session(['page_header' => 'dashboard']);
        session(['page_sidebar' => 'admin-writer']);
        return view('livewire.d.admin.writer');
    }
}
