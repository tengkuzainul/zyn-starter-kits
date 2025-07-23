<!-- Login Box Layout - Centered login form with professional design -->
<div class="flex-1 flex items-center justify-center px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full py-8">
        <!-- background pattern -->
        <div class="absolute inset-0">
            <div class="absolute top-0 left-0 w-full h-full opacity-10">
                <svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg">
                    <defs>
                        <pattern id="grid-light" width="40" height="40" patternUnits="userSpaceOnUse">
                            <path d="M 40 0 L 0 0 0 40" fill="none" stroke="black" stroke-width="1" />
                        </pattern>
                        <pattern id="grid-dark" width="40" height="40" patternUnits="userSpaceOnUse">
                            <path d="M 40 0 L 0 0 0 40" fill="none" stroke="white" stroke-width="1" />
                        </pattern>
                    </defs>
                    <rect width="100%" height="100%" fill="url(#grid-light)" class="dark:hidden" />
                    <rect width="100%" height="100%" fill="url(#grid-dark)" class="hidden dark:block" />
                </svg>
            </div>
        </div>

        <!-- Header Section -->
        <div class="text-center my-8 space-y-4">
            <!-- Logo -->
            <div class="flex justify-center">
                <div class="bg-gradient-to-br from-sky-500 to-red-600 p-3 rounded-lg shadow-lg">
                    <a href="{{ route('welcome') }}" wire:navigate>
                        <span class="font-medium text-white">ZS</span>
                    </a>
                </div>
            </div>

            <!-- Title -->
            <h2 class="text-3xl font-bold text-neutral-900 dark:text-white mb-4">
                {{ $title ?? 'Welcome Back' }}
            </h2>
            <p class="text-sm text-neutral-600 dark:text-neutral-400 mb-2">
                {{ $subtitle ?? 'Sign in to your account to continue' }}
            </p>
        </div>

        <!-- Main Content Box -->
        <div
            class="bg-white dark:bg-neutral-800 py-10 px-8 shadow-xl rounded-lg border border-neutral-200 dark:border-neutral-700 relative z-[99999]">
            {{ $slot }}
        </div>

        <!-- Footer -->
        @if (isset($footer))
            <div class="text-center mt-8">
                {{ $footer }}
            </div>
        @endif
    </div>
</div>

<!-- Optional Background Pattern -->
<div class="hidden lg:block absolute inset-0 overflow-hidden pointer-events-none">
    <div class="absolute top-1/4 left-1/4 size-6 bg-sky-500/10 rounded-full animate-pulse" style="animation-delay: 0s;">
    </div>
    <div class="absolute top-3/4 right-1/4 size-12 bg-red-500/10 rounded-full animate-pulse"
        style="animation-delay: 1s;"></div>
    <div class="absolute bottom-1/4 left-1/3 size-4 bg-purple-500/10 rounded-full animate-pulse"
        style="animation-delay: 2s;"></div>
    <div class="absolute top-1/3 right-1/6 size-10 bg-blue-500/10 rounded-full animate-pulse"
        style="animation-delay: 1.5s;"></div>
    <div class="absolute top-1/2 left-1/6 size-6 bg-sky-500/10 rounded-full animate-pulse"
        style="animation-delay: 0.5s;"></div>
    <div class="absolute bottom-1/3 right-1/6 size-4 bg-red-500/10 rounded-full animate-pulse"
        style="animation-delay: 2.5s;"></div>
</div>
