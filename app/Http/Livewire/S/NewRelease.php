<?php

namespace App\Http\Livewire\S;

use App\Models\Artikel;
use Livewire\Component;

class NewRelease extends Component
{

    public $artikels;

    public function getData(){

        $this->artikels = Artikel::orderBy('updated_at', 'desc')->get();

    }

    public function mount(){

        $this->getData();

    }

    public function render()
    {
        session(['page_header' => '']);
        return view('livewire.s.new-release');
    }
}
