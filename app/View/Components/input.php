<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class input extends Component
{
    /**
     * Create a new component instance.
     */
    public $name;
    public $label;
    public $type;
    public $value;
    public $readonly;
    public $class;
    public $style;
    public $options;
    public $required;

    public function __construct($type,$name,$label,$value='',$readonly='',$class='',$style='',$option='',$required='')
    {
        $this->type = $type;
        $this->name = $name;
        $this->label = $label;
        $this->value = $value;
        $this->readonly = $readonly;
        $this->class = $class;
        $this->style = $style;
        $this->required = $required;
        $this->options = explode('|', $option);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input');
    }
}
