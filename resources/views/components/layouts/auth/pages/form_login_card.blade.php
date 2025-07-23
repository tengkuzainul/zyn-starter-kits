<!-- Example Login Page using Card Layout -->
<x-layouts.auth.app :title="$title ?? 'Page Title'">
    <x-layouts.auth.layout_card title="Sign In" subtitle="Welcome to our apps!" brandTitle="TALL Stack Starter Kit"
        brandDescription="A starter kit for building TALL stack applications with Laravel, Livewire, and Tailwind CSS.">
        <!-- Login Form -->
        {{ $slot }}

        <x-slot name="footer">
            <p class="text-sm text-neutral-600 dark:text-neutral-400">
                New to {{ config('app.name') }}?
                <a href="{{ route('register') }}" wire:navigate
                    class="font-medium text-blue-600 hover:text-blue-500 dark:text-white dark:hover:text-neutral-300 transition duration-200">
                    Create an account
                </a>
            </p>
            <p class="text-xs text-neutral-500 dark:text-neutral-500 mt-2">
                By signing in, you agree to our
                <a href="#"
                    class="text-blue-600 hover:text-blue-500 dark:text-white dark:hover:text-neutral-300">Terms
                    of
                    Service</a>
                and
                <a href="#"
                    class="text-blue-600 hover:text-blue-500 dark:text-white dark:hover:text-neutral-300">Privacy
                    Policy</a>
            </p>
        </x-slot>
    </x-layouts.auth.layout_card>
</x-layouts.auth.app>
