<!-- Example Login Page using Box Layout -->
<x-layouts.auth.app title="Login">
    <x-layouts.auth.layout_box title="Welcome Back" subtitle="Sign in to your TicketIn account">
        <!-- Login Form -->
        {{ $slot }}

        <x-slot name="footer">
            <p class="text-sm text-neutral-600 dark:text-neutral-400">
                Don't have an account?
                <a href="{{ route('register') }}" wire:navigate
                    class="font-medium text-blue-600 hover:text-blue-500 dark:text-white dark:hover:text-neutral-300">
                    Sign up here
                </a>
            </p>
        </x-slot>
    </x-layouts.auth.layout_box>
</x-layouts.auth.app>
