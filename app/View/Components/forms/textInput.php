<?php

namespace App\View\Components\forms;

use Illuminate\View\Component;

class textInput extends Component
{
    public $label;
    public $id;
    public $name;
    public $type;
    public $placeholder;
    public $value;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label, $id, $type="text", $placeholder=null, $value=null)
    {
        $this->label = $label;
        $this->id = $id;
        $this->name = $id;
        $this->type = $type;
        $this->placeholder = $placeholder;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.text-input');
    }
}
