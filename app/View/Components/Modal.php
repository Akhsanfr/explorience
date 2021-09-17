<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Modal extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $close_modal, $data_modal;

    public function __construct($close_modal = 'close_modal', $data_modal = 'data_modal')
    {
        $this->close_modal = $close_modal;
        $this->data_modal = $data_modal;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.modal');
    }
}
