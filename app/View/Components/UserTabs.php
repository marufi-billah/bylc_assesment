<?php

namespace App\View\Components;

use Illuminate\View\Component;

class UserTabs extends Component
{

    public $active;
    public $user;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($active, $user)
    {
        $this->active = $active;
        $this->user = $user;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.user-tabs');
    }
}
