<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use Livewire\WithFileUploads;

class CaroserlForm extends Form
{
    use WithFileUploads;
 
    #[Validate('image|max:1024')] // 1MB Max
    public $carosel;
 
    public function save()
    {
        $this->carosel->store(path: 'carosels');
    }
}
