<?php

namespace App\Http\Livewire\D;

use App\Models\Kategori as ModelsKategori;
use Livewire\Component;

class Kategori extends Component
{
    public $kategoris;

    public $data_modal;

    protected $rules = [
        'data_modal.nama' =>'required',
        'data_modal.nama_en' =>'required',
        'data_modal.desc' =>'required',
        'data_modal.desc_en' =>'required',
    ];

    protected $messages = [
        'data_modal.nama.required' => 'Nama kategori harus diisi',
        'data_modal.nama_en.required' => 'Nama (EN) kategori harus diisi',
        'data_modal.desc.required' => 'Deskripsi kategori harus diisi',
        'data_modal.desc_en.required' => 'Deskripsi (EN) kategori harus diisi',
    ];

    public function open_modal($id = null){
        if(is_null($id)){
            $this->data_modal = new ModelsKategori();
        } else {
            $this->data_modal = ModelsKategori::find($id);
        }
    }

    public function save_modal(){
        $this->validate();
        $this->data_modal->save();
        $this->data_modal = null;
    }

    public function close_modal(){
        $this->data_modal = null;
    }

    public function render()
    {
        $this->kategoris = ModelsKategori::all();
        session(['page_header' => 'dashboard']);
        session(['page_sidebar' => 'kategori']);
        return view('livewire.d.kategori');
    }
}
