<header
    class="md:hidden flex items-center justify-between p-4 bg-neutral-100 dark:bg-neutral-800 border-b border-neutral-200 dark:border-neutral-700">
    <a href="{{ route('dashboard') }}" wire:navigate class="flex items-center gap-x-3">
        <div
            class="h-8 w-8 shrink-0 rounded-tl-lg rounded-br-lg bg-gradient-to-br from-sky-500 to-red-600 flex items-center justify-center shadow-md">
            <span class="font-medium text-white">ZS</span>
        </div>
        <span class="font-bold text-lg text-neutral-800 dark:text-white">{{ config('app.name', 'Dashboard') }}</span>
    </a>
    <div class="flex items-center gap-x-2">
        <!-- Theme Toggle -->
        <button
            @click="isDarkMode = !isDarkMode; localStorage.setItem('theme', isDarkMode ? 'dark' : 'light'); $el.closest('body').classList.toggle('dark', isDarkMode)"
            class="h-10 w-10 flex items-center justify-center rounded-full hover:bg-neutral-200 dark:hover:bg-neutral-700 transition-colors duration-200">
            <svg x-show="!isDarkMode" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round"
                class="icon icon-tabler icons-tabler-outline icon-tabler-sun size-6 text-neutral-700">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                <path d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" />
            </svg>
            <svg x-show="isDarkMode" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round"
                class="icon icon-tabler icons-tabler-outline icon-tabler-moon size-6 text-neutral-200">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" />
            </svg>
        </button>
        <!-- Mobile Menu Button -->
        <button @click="mobileOpen = !mobileOpen"
            class="relative p-2 rounded-xl hover:bg-neutral-200/80 dark:hover:bg-neutral-700/80 transition-all duration-200 hover:scale-105 active:scale-95 group">
            <!-- Hamburger Icon -->
            <div class="w-6 h-6 flex flex-col justify-center items-center relative">
                <span :class="mobileOpen ? 'rotate-45 translate-y-0.5' : ''"
                    class="block h-0.5 w-6 bg-neutral-800 dark:bg-neutral-200 transition-all duration-300 origin-center"></span>
                <span :class="mobileOpen ? 'opacity-0' : 'opacity-100'"
                    class="block h-0.5 w-6 bg-neutral-800 dark:bg-neutral-200 transition-all duration-300 mt-1"></span>
                <span :class="mobileOpen ? '-rotate-45 -translate-y-2' : ''"
                    class="block h-0.5 w-6 bg-neutral-800 dark:bg-neutral-200 transition-all duration-300 mt-1 origin-center"></span>
            </div>
        </button>
    </div>
</header>
