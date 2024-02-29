<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class DepaanLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */

     public $isOpen = false;

     public function toggleDropdown()
{
    $this->isOpen = !$this->isOpen;
}

    public function render(): View
    {
        return view('components.layouts.depan');
    }
}
