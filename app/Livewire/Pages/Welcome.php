<?php

namespace App\Livewire\Pages;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Welcome extends Component
{
    #[
        Layout('components.layouts.guest'),
        Title('Welcome')
    ]
    public function render()
    {
        return view('livewire.pages.welcome');
    }
}
