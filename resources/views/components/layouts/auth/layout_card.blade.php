<!-- Login Card Layout - Split screen design with left side branding and right side form -->
<div class="flex-1 flex">

    <!-- Left Side - Branding Section -->
    <div
        class="hidden lg:flex lg:flex-1 bg-gradient-to-br from-sky-600 via-blue-700 to-red-800 dark:from-neutral-200 dark:via-stone-200 dark:to-zinc-200 relative overflow-hidden transition-transform">
        <!-- Background Pattern -->
        <div class="absolute inset-0">
            <div class="absolute top-0 left-0 w-full h-full opacity-10">
                <svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg">
                    <defs>
                        <pattern id="grid-light" width="40" height="40" patternUnits="userSpaceOnUse">
                            <path d="M 40 0 L 0 0 0 40" fill="none" stroke="white" stroke-width="1" />
                        </pattern>
                        <pattern id="grid-dark" width="40" height="40" patternUnits="userSpaceOnUse">
                            <path d="M 40 0 L 0 0 0 40" fill="none" stroke="black" stroke-width="1" />
                        </pattern>
                    </defs>
                    <rect width="100%" height="100%" fill="url(#grid-light)" class="dark:hidden" />
                    <rect width="100%" height="100%" fill="url(#grid-dark)" class="hidden dark:block" />
                </svg>
            </div>
        </div>

        <!-- Content -->
        <div class="relative z-10 flex flex-col justify-center px-12 py-12">
            <div class="max-w-md">
                <!-- Brand Logo -->
                <div class="flex items-center mb-8">
                    <div class="bg-gradient-to-br from-sky-500 to-red-600 p-3 rounded-lg backdrop-blur-sm">
                        <a href="{{ route('welcome') }}" wire:navigate>
                            <span class="font-medium text-white">ZS</span>
                        </a>
                    </div>
                    <span
                        class="ml-3 text-2xl font-bold text-white dark:text-black">{{ config('app.name', 'TicketIn') }}</span>
                </div>

                <!-- Branding Content -->
                <h1 class="text-4xl font-bold text-white dark:text-black mb-6">
                    {{ $brandTitle ?? 'Your Event Management Solution' }}
                </h1>
                <p class="text-neutral-100/90 dark:text-neutral-700 text-lg leading-relaxed mb-8">
                    {{ $brandDescription ?? '' }}
                </p>

                <!-- Features List -->
                <div class="space-y-4">
                    <div class="flex items-center text-neutral-100/90 dark:text-neutral-700">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"
                            class="lucide lucide-badge-check-icon lucide-badge-check size-5 mr-3 text-neutral-200 dark:text-sky-400">
                            <path
                                d="M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z" />
                            <path d="m9 12 2 2 4-4" />
                        </svg>
                        <span>Multi Authentication</span>
                    </div>
                    <div class="flex items-center text-neutral-100/90 dark:text-neutral-700">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"
                            class="lucide lucide-badge-check-icon lucide-badge-check size-5 mr-3 text-neutral-200 dark:text-sky-400">
                            <path
                                d="M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z" />
                            <path d="m9 12 2 2 4-4" />
                        </svg>
                        <span>Modern UI Concept</span>
                    </div>
                    <div class="flex items-center text-neutral-100/90 dark:text-neutral-700">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"
                            class="lucide lucide-badge-check-icon lucide-badge-check size-5 mr-3 text-neutral-200 dark:text-sky-400">
                            <path
                                d="M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z" />
                            <path d="m9 12 2 2 4-4" />
                        </svg>
                        <span>Easy Customization</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Decorative Elements -->
        <div class="absolute bottom-0 right-0 w-64 h-64 bg-white/5 rounded-full -mr-32 -mb-32"></div>
        <div class="absolute top-1/4 right-1/4 w-32 h-32 bg-white/5 rounded-full"></div>
    </div>

    <!-- Right Side - Form Section -->
    <div class="flex-1 flex items-center justify-center px-4 sm:px-6 lg:px-8 bg-neutral-50 dark:bg-neutral-900">
        <div class="max-w-md w-full py-8">

            <!-- Mobile Logo (visible only on mobile) -->
            <div class="flex justify-center mb-10 lg:hidden">
                <div class="bg-gradient-to-r from-sky-500 to-red-600 p-3 rounded-lg shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="text-white">
                        <path
                            d="M2 9a3 3 0 0 1 0 6v2a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-2a3 3 0 0 1 0-6V7a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v2Z" />
                        <path d="M13 5v2" />
                        <path d="M13 17v2" />
                        <path d="M13 11v2" />
                    </svg>
                </div>
            </div>

            <!-- Form Header -->
            <div class="text-center mb-10">
                <h2 class="text-3xl font-bold text-neutral-900 dark:text-white mb-4">
                    {{ $title ?? 'Welcome Back' }}
                </h2>
                <p class="text-sm text-neutral-600 dark:text-neutral-400">
                    {{ $subtitle ?? 'Please sign in to your account' }}
                </p>
            </div>

            <!-- Form Card -->
            <div
                class="bg-white dark:bg-neutral-800 py-10 px-8 shadow-xl rounded-xl border border-neutral-200 dark:border-neutral-700">
                {{ $slot }}
            </div>

            <!-- Footer -->
            @if (isset($footer))
                <div class="mt-10 text-center">
                    {{ $footer }}
                </div>
            @endif
        </div>
    </div>
</div>
