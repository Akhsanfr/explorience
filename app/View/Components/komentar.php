<?php

namespace App\View\Components;

use Illuminate\View\Component;

class komentar extends Component
{

    public $margin, $user, $avatar, $isi, $time, $like;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($margin, $avatar, $user, $isi, $time, $like)
    {
        $this->margin = $margin;
        $this->user = $user;
        $this->avatar = $avatar;
        $this->isi = $isi;
        $this->time = $time;
        $this->like = $like;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.komentar');
    }
}
