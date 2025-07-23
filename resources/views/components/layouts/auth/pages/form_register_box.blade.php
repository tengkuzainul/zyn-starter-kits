<!-- Register Page using Box Layout -->
<x-layouts.auth.app title="Register">
    <x-layouts.auth.layout_box title="Create Account" subtitle="Join TicketIn and start managing your events">
        <!-- Register Form -->
        {{ $slot }}

        <x-slot name="footer">
            <p class="text-sm text-neutral-600 dark:text-neutral-400">
                Already have an account?
                <a href="{{ route('login') }}" wire:navigate
                    class="font-medium text-blue-600 hover:text-blue-500 dark:text-white dark:hover:text-neutral-300">
                    Sign in here
                </a>
            </p>
        </x-slot>
    </x-layouts.auth.layout_box>
</x-layouts.auth.app>
