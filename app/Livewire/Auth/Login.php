<?php

namespace App\Livewire\Auth;

use App\Traits\WithNotification;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Illuminate\Support\Str;

class Login extends Component
{
    use WithNotification;
    #[Validate('required|string|email')]
    public string $email = '';

    #[Validate('required|string')]
    public string $password = '';

    #[Validate('boolean')]
    public bool $remember = false;

    public function mount()
    {
        if (Auth::check()) {
            $this->redirectRoute(route('admin.dashboard'), navigate: true);
        }
    }

    /**
     * Handle an incoming authentication request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(): void
    {
        $this->validate();

        $this->authenticate();

        Session::regenerate();

        $this->notifySuccess('You have successfully logged in.');

        $user = Auth::user();

        if ($user->hasRole('super-admin')) {
            $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
        } else {
            $this->redirectIntended(default: route('welcome', absolute: false), navigate: true);
        }
    }

    /**
     * Attempt to authenticate the request's credentials.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function authenticate(): void
    {
        $this->ensureIsNotRateLimited();

        if (!Auth::attempt($this->only(['email', 'password']), $this->remember)) {
            RateLimiter::hit($this->throttleKey());

            $this->notifyError('The provided credentials do not match our records.');

            throw ValidationException::withMessages([
                'email' => trans('auth.failed'),
            ]);
        }

        RateLimiter::clear($this->throttleKey());
    }

    /**
     * Ensure the authentication request is not rate limited.
     */
    protected function ensureIsNotRateLimited(): void
    {
        if (!RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout(request()));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        $this->notifyWarning('Too many login attempts. Please try again in ' . ceil($seconds / 60) . ' minutes.');

        throw ValidationException::withMessages([
            'email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the authentication rate limiting throttle key.
     */
    protected function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->email) . '|' . request()->ip());
    }

    /**
     * If you need change layout style, change value in Layout()
     * 
     * e.g. : components.layouts.auth.pages.form_login_card or components.layouts.auth.pages.form_login_box
     */
    #[
        Layout('components.layouts.auth.pages.form_login_card'),
        Title('Sign In'),
    ]
    public function render()
    {
        return view('livewire.auth.login', [
            'title' => 'Sign In',
            'description' => 'Please enter your credentials to sign in.',
        ]);
    }
}
