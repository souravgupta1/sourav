<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class title extends Component
{
    /**
     * Create a new component instance.
     */
     public $title ='';
    public function __construct($name)
    {
        $this->title = $name;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.title');
    }
}
