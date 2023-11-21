<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class alertBox extends Component
{
    /**
     * Create a new component instance.
     */
     public $message = '';
     public $status = '';
    public function __construct($message,$status)
    {
        $this->message = $message;
        $this->status = $status;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.alert-box');
    }
}
