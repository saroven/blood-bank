<?php

namespace App\View\Components;

use Illuminate\View\Component;

class successMessage extends Component
{
    public $message;
    /**
     * @var string
     */
    public $m1;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($m1 = 'Success!', $message)
    {
        $this->message = $message;
        $this->m1 = $m1;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.success-message');
    }
}
