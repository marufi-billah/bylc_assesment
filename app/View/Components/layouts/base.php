<?php

namespace App\View\Components\layouts;

use Illuminate\View\Component;

class base extends Component
{
    //Named slots
    public $title;
    public $head;
    public $header;
    public $footer;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.layouts.base');
    }
}
