<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class dropdown extends Component
{
    /**
     * Create a new component instance.
     */
     public $label;
     public $options;
     public $name;
    public function __construct($label,$option,$name)
    {
        $this->label= $label;
        $this->name= $name;
       $this->options = explode(':', $option);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dropdown');
    }
}
