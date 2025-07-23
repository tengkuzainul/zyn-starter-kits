<aside x-show="mobileOpen" x-transition:enter="transition-all ease-out duration-300"
    x-transition:enter-start="opacity-0 -translate-x-full scale-95"
    x-transition:enter-end="opacity-100 translate-x-0 scale-100" x-transition:leave="transition-all ease-in duration-200"
    x-transition:leave-start="opacity-100 translate-x-0 scale-100"
    x-transition:leave-end="opacity-0 -translate-x-full scale-95"
    class="fixed left-0 top-0 h-full w-72 bg-white/95 dark:bg-neutral-900/95 backdrop-blur-md z-50 flex flex-col md:hidden shadow-2xl border-r border-neutral-200/50 dark:border-neutral-700/50"
    x-cloak @click.away="mobileOpen = false">

    <!-- Mobile Menu Header -->
    <div class="flex items-center justify-between p-4 border-b border-neutral-200/70 dark:border-neutral-700/70 bg-gradient-to-r from-transparent to-neutral-50/30 dark:to-neutral-800/30"
        x-show="mobileOpen" x-transition:enter="transition-all ease-out duration-400 delay-100"
        x-transition:enter-start="opacity-0 -translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">
        <span
            class="font-bold text-lg bg-gradient-to-r from-neutral-800 to-neutral-600 dark:from-white dark:to-neutral-200 bg-clip-text text-transparent">
            {{ config('app.name', 'Dashboard') }}
        </span>
        <button @click="mobileOpen = false"
            class="p-2 rounded-xl hover:bg-neutral-200/80 dark:hover:bg-neutral-700/80 transition-all duration-200 hover:scale-105 active:scale-95 group">
            <svg class="h-6 w-6 text-neutral-800 dark:text-neutral-200 group-hover:rotate-90 transition-transform duration-200"
                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    <!-- Mobile Navigation -->
    <nav class="flex-1 px-4 py-6 space-y-4 overflow-y-auto">
        <!-- Dashboard Group -->
        <div class="space-y-1">
            <h3 class="px-4 text-xs font-semibold text-neutral-500 dark:text-neutral-400 uppercase tracking-wider">
                Main Menu
            </h3>
            <a href="{{ route('dashboard') }}" wire:navigate @click="mobileOpen = false" x-show="mobileOpen"
                x-transition:enter="transition-all ease-out duration-300 delay-150"
                x-transition:enter-start="opacity-0 translate-x-8 scale-95"
                x-transition:enter-end="opacity-100 translate-x-0 scale-100"
                class="group flex items-center gap-x-4 h-12 px-4 rounded-xl text-neutral-600 dark:text-neutral-300 hover:bg-gradient-to-r hover:from-neutral-200/80 hover:to-neutral-100/80 dark:hover:from-neutral-700/80 dark:hover:to-neutral-800/80 transition-all duration-200 hover:scale-[1.02] hover:shadow-md">
                <div
                    class="p-1 rounded-lg bg-gradient-to-br from-blue-500/20 to-purple-500/20 group-hover:from-blue-500/30 group-hover:to-purple-500/30 transition-all duration-200">
                    <svg class="h-5 w-5 text-blue-600 dark:text-blue-400" fill="none" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                        <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                        <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                    </svg>
                </div>
                <span class="font-medium group-hover:translate-x-1 transition-transform duration-200">Dashboard</span>
            </a>
        </div>
    </nav>
</aside>
