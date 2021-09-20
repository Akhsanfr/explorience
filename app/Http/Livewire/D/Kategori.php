<?php

namespace App\Http\Livewire\D;
use Illuminate\Support\Facades\Storage;

use App\Models\Kategori as ModelsKategori;
use Livewire\Component;
use Livewire\WithFileUploads;

class Kategori extends Component
{
    use WithFileUploads;

    public $kategoris;

    public $data_modal;
    public $thumbnail;
    protected $mode;

    protected $rules = [
        'data_modal.nama' =>'required',
        'data_modal.nama_en' =>'required',
        'data_modal.desc' =>'required',
        'data_modal.desc_en' =>'required',
        'thumbnail' => 'required|file|max:512',
    ];

    protected $messages = [
        'data_modal.nama.required' => 'Nama kategori harus diisi',
        'data_modal.nama_en.required' => 'Nama (EN) kategori harus diisi',
        'data_modal.desc.required' => 'Deskripsi kategori harus diisi',
        'data_modal.desc_en.required' => 'Deskripsi (EN) kategori harus diisi',
        'thumbnail.required' => 'Thumbnail kategori harus diisi',
        'thumbnail.max' => 'Ukuran file thumbnail maksimal 512kb',
    ];

    public function open_modal($id = null){
        if(is_null($id)){
            $this->data_modal = new ModelsKategori();
            $this->mode = 'create';
        } else {
            $this->data_modal = ModelsKategori::find($id);
            $this->mode = 'update';
            // Isi data thumnail , jika tidak update masih tetap lolos validasi
            $this->thumbnail = $this->data_modal->thumbnail;
        }
    }

    public function save_modal(){
        $this->validate();
        if($this->mode == 'create'){
            // Mode create
            $path = $this->thumbnail->storeAs(
                'kategori', $this->data_modal->nama .'.'. $this->thumbnail->extension()
            );
            $this->data_modal->thumbnail = $path;
        } elseif($this->thumbnail != $this->data_modal->thumbnail) {
            // Mode update dan sedang mengupdate foto
            Storage::delete($this->data_modal->thumbnail);
            $path = $this->thumbnail->storeAs(
                'kategori', $this->data_modal->nama .'.'. $this->thumbnail->extension()
            );
            $this->data_modal->thumbnail = $path;
        }
        $this->data_modal->save();
        $this->data_modal = null;
    }

    public function close_modal(){
        $this->data_modal = null;
        $this->thumbnail =  null;
    }

    public function render()
    {
        $this->kategoris = ModelsKategori::all();
        session(['page_header' => 'dashboard']);
        session(['page_sidebar' => 'kategori']);
        return view('livewire.d.kategori');
    }
}
