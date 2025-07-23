<?php

namespace App\Livewire\Pages\Admin;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Dashboard extends Component
{
    #[Layout('components.layouts.admin.app'), Title('Dashboard')]
    public function render()
    {
        return view('livewire.pages.admin.dashboard');
    }
}
