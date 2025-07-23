<!-- Register Page using Card Layout -->
<x-layouts.auth.app :title="$title ?? 'Register'">
    <x-layouts.auth.layout_card title="Create Account" subtitle="Join us today!" brandTitle="TALL Stack Starter Kit"
        brandDescription="A starter kit for building TALL stack applications with Laravel, Livewire, and Tailwind CSS.">

        <!-- Register Form -->
        {{ $slot }}

        <x-slot name="footer">
            <p class="text-sm text-neutral-600 dark:text-neutral-400">
                Already have an account?
                <a href="{{ route('login') }}" wire:navigate
                    class="font-medium text-blue-600 hover:text-blue-500 dark:text-white dark:hover:text-neutral-300 transition duration-200">
                    Sign in here
                </a>
            </p>
            <p class="text-xs text-neutral-500 dark:text-neutral-500 mt-2">
                By creating an account, you agree to our
                <a href="#"
                    class="text-blue-600 hover:text-blue-500 dark:text-white dark:hover:text-neutral-300">Terms
                    of Service</a>
                and
                <a href="#"
                    class="text-blue-600 hover:text-blue-500 dark:text-white dark:hover:text-neutral-300">Privacy
                    Policy</a>
            </p>
        </x-slot>
    </x-layouts.auth.layout_card>
</x-layouts.auth.app>
