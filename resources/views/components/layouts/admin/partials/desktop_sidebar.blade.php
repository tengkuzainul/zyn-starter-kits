<aside @mouseenter="if (!sidebarPinned) sidebarOpen = true" @mouseleave="if (!sidebarPinned) sidebarOpen = false"
    class="hidden md:flex flex-col bg-neutral-100 dark:bg-neutral-800 border-r border-neutral-200 dark:border-neutral-700 transition-all duration-300 ease-in-out"
    :class="sidebarOpen ? 'w-64' : 'w-20'">

    <div class="flex-1 flex flex-col justify-between overflow-y-auto sidebar-scroll">
        <!-- Logo dan Navigasi -->
        <div>
            <!-- Logo Header -->
            <div class="h-20 flex items-center px-6">
                <a href="{{ route('dashboard') }}" wire:navigate class="flex items-center gap-x-3">
                    <div
                        class="h-8 w-8 shrink-0 rounded-tl-lg rounded-br-lg bg-gradient-to-br from-sky-500 to-red-600 flex items-center justify-center shadow-md">
                        <span class="font-medium text-white">ZS</span>
                    </div>
                    <div x-show="sidebarOpen" x-transition:enter="transition-all ease-in-out duration-300"
                        x-transition:enter-start="opacity-0 -translate-x-4"
                        x-transition:enter-end="opacity-100 translate-x-0">
                        <span
                            class="font-bold text-lg text-neutral-800 dark:text-white whitespace-nowrap">{{ config('app.name', 'Dashboard') }}</span>
                    </div>

                </a>
            </div>

            <!-- Navigation Links -->
            <nav class="px-4 py-2 space-y-3">
                <!-- Category Header -->
                <h5 class="px-4 text-xs font-semibold text-neutral-500 dark:text-neutral-400 uppercase tracking-wider">
                    <span x-show="sidebarOpen" x-transition:enter="transition-all ease-out duration-300"
                        x-transition:enter-start="opacity-0 translate-x-4 scale-95"
                        x-transition:enter-end="opacity-100 translate-x-0 scale-100"
                        x-transition:leave="transition-all ease-in duration-200"
                        x-transition:leave-start="opacity-100 translate-x-0 scale-100"
                        x-transition:leave-end="opacity-0 translate-x-4 scale-95">
                        Main Menu
                    </span>
                    <span x-show="!sidebarOpen">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-ellipsis-icon size-5">
                            <circle cx="12" cy="12" r="1" />
                            <circle cx="19" cy="12" r="1" />
                            <circle cx="5" cy="12" r="1" />
                        </svg>
                    </span>
                </h5>

                <!-- Dashboard Link -->
                <a href="{{ route('dashboard') }}" wire:navigate @click="$event.stopPropagation()"
                    class="group relative flex items-center gap-x-4 h-12 px-4 rounded-xl text-neutral-600 dark:text-neutral-300 hover:bg-gradient-to-r hover:from-neutral-200/80 hover:to-neutral-100/80 dark:hover:from-neutral-700/80 dark:hover:to-neutral-800/80 transition-all duration-200 hover:scale-[1.02] hover:shadow-md">
                    <div
                        class="p-1 rounded-lg bg-gradient-to-br from-blue-500/20 to-purple-500/20 group-hover:from-blue-500/30 group-hover:to-purple-500/30 transition-all duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"
                            class="icon-tabler-home size-5 text-blue-600 dark:text-blue-400 shrink-0">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                            <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                            <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                        </svg>
                    </div>
                    <span x-show="sidebarOpen" x-transition:enter="transition-all ease-out duration-300"
                        x-transition:enter-start="opacity-0 translate-x-4 scale-95"
                        x-transition:enter-end="opacity-100 translate-x-0 scale-100"
                        x-transition:leave="transition-all ease-in duration-200"
                        x-transition:leave-start="opacity-100 translate-x-0 scale-100"
                        x-transition:leave-end="opacity-0 translate-x-4 scale-95"
                        class="font-medium whitespace-nowrap group-hover:translate-x-1 transition-transform duration-200">
                        Dashboard
                    </span>
                    <div x-show="!sidebarOpen" x-transition:enter="transition-all ease-out duration-200"
                        x-transition:enter-start="opacity-0 scale-95 translate-x-2"
                        x-transition:enter-end="opacity-100 scale-100 translate-x-0"
                        class="absolute left-full ml-4 px-3 py-2 bg-neutral-800/90 dark:bg-neutral-700/90 backdrop-blur-sm text-white text-xs rounded-lg shadow-xl border border-neutral-600/20 opacity-0 group-hover:opacity-100 transition-all duration-200 pointer-events-none whitespace-nowrap z-10">
                        <div class="font-semibold">Dashboard</div>
                        <div
                            class="absolute -left-1 top-1/2 transform -translate-y-1/2 w-2 h-2 bg-neutral-800/90 dark:bg-neutral-700/90 rotate-45">
                        </div>
                    </div>
                </a>

            </nav>
        </div>

        <!-- User Profile -->
        <div class="p-4">
            <a href="#" wire:navigate @click="$event.stopPropagation()"
                class="group relative flex items-center gap-x-3 p-3 rounded-xl hover:bg-gradient-to-r hover:from-neutral-200/80 hover:to-neutral-100/80 dark:hover:from-neutral-700/80 dark:hover:to-neutral-800/80 transition-all duration-200 hover:scale-[1.02] hover:shadow-md">
                <div class="relative">
                    <img src="https://ui-avatars.com/api/?name=User&background=6366f1&color=fff&size=40"
                        alt="User Avatar"
                        class="shrink-0 size-10 rounded-full ring-2 ring-indigo-500/20 group-hover:ring-indigo-500/40 transition-all duration-200">
                    <div
                        class="absolute -bottom-0.5 -right-0.5 w-3 h-3 bg-green-500 rounded-full border-2 border-white dark:border-neutral-800">
                    </div>
                </div>
                <div x-show="sidebarOpen" x-transition:enter="transition-all ease-out duration-300 delay-200"
                    x-transition:enter-start="opacity-0 translate-x-4 scale-95"
                    x-transition:enter-end="opacity-100 translate-x-0 scale-100"
                    x-transition:leave="transition-all ease-in duration-200"
                    x-transition:leave-start="opacity-100 translate-x-0 scale-100"
                    x-transition:leave-end="opacity-0 translate-x-4 scale-95"
                    class="flex-1 min-w-0 group-hover:translate-x-1 transition-transform duration-200">
                    <p class="text-sm font-semibold text-neutral-800 dark:text-white truncate">User Name</p>
                    <p class="text-xs text-neutral-500 dark:text-neutral-400 truncate">user@example.com</p>
                </div>
                <div x-show="!sidebarOpen" x-transition:enter="transition-all ease-out duration-200"
                    x-transition:enter-start="opacity-0 scale-95 translate-x-2"
                    x-transition:enter-end="opacity-100 scale-100 translate-x-0"
                    class="absolute left-full ml-4 px-3 py-2 bg-neutral-800/90 dark:bg-neutral-700/90 backdrop-blur-sm text-white text-xs rounded-lg shadow-xl border border-neutral-600/20 opacity-0 group-hover:opacity-100 transition-all duration-200 pointer-events-none whitespace-nowrap z-10">
                    <div class="font-semibold">User Name</div>
                    <div class="text-neutral-300">user@example.com</div>
                    <div
                        class="absolute -left-1 top-1/2 transform -translate-y-1/2 w-2 h-2 bg-neutral-800/90 dark:bg-neutral-700/90 rotate-45">
                    </div>
                </div>
            </a>
        </div>
    </div>
</aside>
