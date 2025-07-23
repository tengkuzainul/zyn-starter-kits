<?php

namespace App\Livewire\Auth\Actions;

use App\Traits\WithNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class LogoutButton extends Component
{
    use WithNotification;

    public function logout(): void
    {
        Auth::guard('web')->logout();

        Session::invalidate();
        Session::regenerateToken();

        $this->notifySuccess('You have successfully logout.');

        $this->redirect('/', navigate: true);
    }

    public function render()
    {
        return view('livewire.auth.actions.logout-button');
    }
}
