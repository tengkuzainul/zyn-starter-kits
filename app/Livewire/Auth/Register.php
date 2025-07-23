<?php

namespace App\Livewire\Auth;

use App\Models\User;
use App\Traits\WithNotification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Register extends Component
{
    use WithNotification;

    public string $name = '';

    public string $email = '';

    public string $password = '';

    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email:dns', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'string', 'confirmed', Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered($user = User::create($validated)));

        $user->assignRole('user');

        $this->notifySuccess('Account created successfully! Welcome to '.config('app.name').'.');

        $this->redirect(route('login', absolute: false), navigate: true);
    }

    /**
     * If you need change layout style, change value in Layout()
     *
     * e.g. : components.layouts.auth.pages.form_register_card or components.layouts.auth.pages.form_register_card
     */
    #[
        Layout('components.layouts.auth.pages.form_register_card'),
        Title('Sign Up'),
    ]
    public function render()
    {
        return view('livewire.auth.register');
    }
}
