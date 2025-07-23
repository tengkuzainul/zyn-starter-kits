<div x-data="navbar()" class="relative w-full">
    <!-- Desktop Navigation -->
    <nav class="sticky inset-x-0 top-5 z-[9999999] w-full">
        <div class="relative z-60 mx-auto hidden w-full max-w-7xl flex-row items-center justify-between self-start rounded-full bg-transparent px-4 py-2 lg:flex transition-all duration-300"
            :class="{ 'bg-white/90 dark:bg-neutral-950/90 backdrop-blur-xl shadow-2xl border border-white/20 dark:border-neutral-800/30 w-4/5 transform translate-y-5': isScrolled }"
            :style="{ minWidth: '800px' }" style="backdrop-filter: blur(20px) saturate(1.8);">

            <!-- Logo -->
            <a href="{{ route('welcome') }}" wire:navigate
                class="relative z-20 mr-4 flex items-center space-x-2 px-2 py-1 text-sm font-normal">
                <div
                    class="w-8 h-8 bg-blue-600 dark:bg-neutral-800 rounded-lg flex items-center justify-center shadow-lg">
                    <span class="text-white font-bold text-sm">ZS</span>
                </div>
                <span class="font-medium text-black dark:text-white">Zyn Starter</span>
            </a>

            <!-- Navigation Items -->
            <div class="absolute inset-0 hidden flex-1 flex-row items-center justify-center space-x-2 text-sm font-medium text-zinc-600 transition duration-200 lg:flex pointer-events-none"
                @mouseleave="hoveredItem = null">
                <template x-for="(item, index) in navItems" :key="index">
                    <a :href="item.link"
                        class="relative px-4 py-2 text-neutral-600 dark:text-neutral-300 transition-colors duration-200 hover:text-blue-600 dark:hover:text-blue-400 pointer-events-auto"
                        @mouseenter="hoveredItem = index">
                        <div x-show="hoveredItem === index"
                            class="absolute inset-0 h-full w-full rounded-full bg-blue-50 dark:bg-neutral-800/60 backdrop-blur-sm"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 scale-95"
                            x-transition:enter-end="opacity-100 scale-100"></div>
                        <span class="relative z-20" x-text="item.name"></span>
                    </a>
                </template>
            </div>

            <!-- Action Buttons -->
            <div class="flex items-center gap-4 relative z-30">
                @guest
                    <a href="{{ route('login') }}" wire:navigate
                        class="px-4 py-2 rounded-md bg-blue-600 dark:bg-neutral-800 text-white text-sm font-medium hover:-translate-y-0.5 transition duration-200 shadow-lg hover:shadow-xl hover:bg-blue-700 dark:hover:bg-neutral-700">
                        Sign In
                    </a>
                @endguest

                @auth
                    <livewire:auth.actions.logout-button />
                @endauth
            </div>
        </div>

        <!-- Mobile Navigation -->
        <div class="relative z-50 mx-auto flex w-full max-w-[calc(100vw-2rem)] flex-col items-center justify-between bg-transparent px-0 py-2 lg:hidden transition-all duration-300"
            :class="{ 'bg-white/90 dark:bg-neutral-950/90 backdrop-blur-xl shadow-2xl border border-white/20 dark:border-neutral-800/30 rounded-lg px-3 w-11/12 transform translate-y-5': isScrolled }"
            style="backdrop-filter: blur(20px) saturate(1.8);">

            <!-- Mobile Header -->
            <div class="flex w-full flex-row items-center justify-between">
                <!-- Mobile Logo -->
                <a href="{{ route('welcome') }}" wire:navigate
                    class="relative z-20 mr-4 flex items-center space-x-2 px-2 py-1 text-sm font-normal">
                    <div
                        class="w-8 h-8 bg-blue-600 dark:bg-neutral-800 rounded-lg flex items-center justify-center shadow-lg">
                        <span class="text-white font-bold text-sm">ZS</span>
                    </div>
                    <span class="font-medium text-black dark:text-white">Zyn Starter</span>
                </a>

                <!-- Mobile Menu Toggle -->
                <button @click="isMobileMenuOpen = !isMobileMenuOpen"
                    class="p-2 hover:bg-gray-100 dark:hover:bg-neutral-800 rounded-lg transition-colors">
                    <svg x-show="!isMobileMenuOpen" class="w-6 h-6 text-black dark:text-white" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                    <svg x-show="isMobileMenuOpen" class="w-6 h-6 text-black dark:text-white" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>

            <!-- Mobile Menu -->
            <div x-show="isMobileMenuOpen" x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-95"
                class="absolute inset-x-0 top-16 z-50 flex w-full flex-col items-start justify-start gap-4 rounded-lg bg-white/95 dark:bg-neutral-950/95 backdrop-blur-xl px-4 py-8 shadow-2xl border border-white/20 dark:border-neutral-800/30">
                <template x-for="(item, index) in navItems" :key="index">
                    <a :href="item.link" @click="isMobileMenuOpen = false"
                        class="relative text-neutral-600 dark:text-neutral-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors">
                        <span x-text="item.name"></span>
                    </a>
                </template>
                <div class="flex w-full flex-col gap-4 mt-4">
                    <a href="{{ route('login') }}" @click="isMobileMenuOpen = false"
                        class="w-full px-4 py-2 rounded-md bg-blue-600 dark:bg-neutral-800 text-white text-sm font-medium text-center hover:bg-blue-700 dark:hover:bg-neutral-700 transition-colors">
                        Sign In
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="flex flex-col items-center justify-center min-h-[calc(100vh-120px)] px-4 py-12">
        <!-- Subtitle -->
        <p class="text-neutral-600 dark:text-neutral-200 text-sm sm:text-base mb-8 text-center max-w-md">
            The road to freedom starts from here
        </p>

        <!-- Typewriter Effect -->
        <div class="flex space-x-2 my-8" x-data="typewriter()">
            <div class="overflow-hidden pb-2">
                <div class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-6xl font-bold text-center"
                    x-ref="typewriterText">
                    <template x-for="(word, wordIndex) in words" :key="wordIndex">
                        <span class="inline-block" x-show="wordIndex <= currentWordIndex">
                            <template x-for="(char, charIndex) in word.text.split('')" :key="charIndex">
                                <span :class="word.className || 'dark:text-white text-black'" x-text="char"
                                    x-show="currentCharIndex >= getCharPosition(wordIndex, charIndex)"
                                    x-transition:enter="transition-opacity duration-100"></span>
                            </template>
                            <span
                                x-show="wordIndex < currentWordIndex || (wordIndex === currentWordIndex && currentCharIndex >= getCharPosition(wordIndex, word.text.length))">&nbsp;</span>
                        </span>
                    </template>
                </div>
            </div>

            <!-- Cursor -->
            <span
                class="block rounded-sm w-1 h-8 sm:h-10 md:h-12 lg:h-16 xl:h-20 bg-blue-600 dark:bg-blue-400 animate-pulse"></span>
        </div>

        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row gap-4 mt-12">
            <a href="https://github.com/tengkuzainul/zyn-starter-kit" target="_blank"
                class="flex items-center justify-center px-8 py-3 rounded-xl bg-blue-600 dark:bg-blue-500 text-white text-sm font-medium hover:-translate-y-1 transition-all duration-200 shadow-lg hover:shadow-xl hover:bg-blue-700 dark:hover:bg-blue-600 min-w-[180px]">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M12 0C5.374 0 0 5.373 0 12 0 17.302 3.438 21.8 8.207 23.387c.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23A11.509 11.509 0 0112 5.803c1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576C20.566 21.797 24 17.3 24 12c0-6.627-5.373-12-12-12z" />
                </svg>
                Join Contributors
            </a>
            <a href="{{ route('register') }}" wire:navigate
                class="flex items-center justify-center px-8 py-3 rounded-xl bg-white dark:bg-neutral-900 text-black dark:text-white border-2 border-blue-600 dark:border-blue-400 text-sm font-medium hover:-translate-y-1 transition-all duration-200 shadow-lg hover:shadow-xl hover:bg-blue-50 dark:hover:bg-neutral-800 min-w-[180px]">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                </svg>
                Get Started
            </a>
        </div>

        <!-- Stats or Features (Optional) -->
        <div class="mt-16 grid grid-cols-1 sm:grid-cols-3 gap-8 text-center max-w-2xl">
            <div class="space-y-2">
                <div class="text-2xl font-bold text-blue-600 dark:text-blue-400">TALL</div>
                <div class="text-sm text-neutral-600 dark:text-neutral-400">Stack Ready</div>
            </div>
            <div class="space-y-2">
                <div class="text-2xl font-bold text-blue-600 dark:text-blue-400">Modern</div>
                <div class="text-sm text-neutral-600 dark:text-neutral-400">UI Components</div>
            </div>
            <div class="space-y-2">
                <div class="text-2xl font-bold text-blue-600 dark:text-blue-400">Open</div>
                <div class="text-sm text-neutral-600 dark:text-neutral-400">Source</div>
            </div>
        </div>
    </div>

    <!-- Professional Footer -->
    <div x-data="footerAnimation()" class="relative mt-20 mb-16" id="about">
        <!-- Footer Content -->
        <div class="mx-auto max-w-7xl px-4 py-8">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0"
                x-ref="footerContent"
                :class="{ 'opacity-100 translate-y-0': isVisible, 'opacity-0 translate-y-8': !isVisible }"
                class="transition-all duration-700 ease-out">

                <!-- Left Side - Developer Info -->
                <div class="flex flex-col items-center md:items-start space-y-2">
                    <a href="https://github.com/tengkuzainul" target="_blank"
                        class="group flex items-center space-x-3 text-neutral-700 dark:text-neutral-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors duration-300">
                        <div
                            class="w-10 h-10 bg-gradient-to-br from-blue-600 to-purple-600 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                            <span class="text-white font-bold text-sm">ZS</span>
                        </div>
                        <div>
                            <h3 class="font-semibold text-lg">Tengku Muhammad Zainul Aprilizar</h3>
                            <p class="text-sm text-neutral-500 dark:text-neutral-400">
                                TALL Stack Starter Kit For Developer
                            </p>
                        </div>
                    </a>
                    <p class="text-xs text-neutral-400 dark:text-neutral-500 text-center md:text-left max-w-xs">
                        Passionate about creating modern, efficient starter kits for developers
                    </p>
                </div>

                <!-- Right Side - Social Icons -->
                <div class="flex items-center space-x-4">
                    <!-- Gmail -->
                    <a href="mailto:tengkuzainula04@gmail.com"
                        class="group relative w-12 h-12 flex items-center justify-center rounded-full bg-white dark:bg-neutral-800 border border-neutral-200 dark:border-neutral-700 hover:border-red-500 dark:hover:border-red-400 transition-all duration-300 hover:scale-110 hover:shadow-lg">
                        <svg class="w-5 h-5 text-neutral-600 dark:text-neutral-400 group-hover:text-red-500 transition-colors duration-300"
                            fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M24 5.457v13.909c0 .904-.732 1.636-1.636 1.636h-3.819V11.73L12 16.64l-6.545-4.91v9.273H1.636A1.636 1.636 0 0 1 0 19.366V5.457c0-.904.732-1.636 1.636-1.636h3.819l6.545 4.91 6.545-4.91h3.819A1.636 1.636 0 0 1 24 5.457z" />
                        </svg>
                        <span
                            class="absolute -top-8 left-1/2 transform -translate-x-1/2 bg-black dark:bg-white text-white dark:text-black text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity duration-300">Gmail</span>
                    </a>

                    <!-- GitHub -->
                    <a href="https://github.com/tengkuzainul" target="_blank"
                        class="group relative w-12 h-12 flex items-center justify-center rounded-full bg-white dark:bg-neutral-800 border border-neutral-200 dark:border-neutral-700 hover:border-gray-900 dark:hover:border-gray-300 transition-all duration-300 hover:scale-110 hover:shadow-lg">
                        <svg class="w-5 h-5 text-neutral-600 dark:text-neutral-400 group-hover:text-gray-900 dark:group-hover:text-gray-100 transition-colors duration-300"
                            fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M12 0C5.374 0 0 5.373 0 12 0 17.302 3.438 21.8 8.207 23.387c.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23A11.509 11.509 0 0112 5.803c1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576C20.566 21.797 24 17.3 24 12c0-6.627-5.373-12-12-12z" />
                        </svg>
                        <span
                            class="absolute -top-8 left-1/2 transform -translate-x-1/2 bg-black dark:bg-white text-white dark:text-black text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity duration-300">GitHub</span>
                    </a>

                    <!-- LinkedIn -->
                    <a href="https://linkedin.com/in/tengkuzainull" target="_blank"
                        class="group relative w-12 h-12 flex items-center justify-center rounded-full bg-white dark:bg-neutral-800 border border-neutral-200 dark:border-neutral-700 hover:border-blue-700 dark:hover:border-blue-400 transition-all duration-300 hover:scale-110 hover:shadow-lg">
                        <svg class="w-5 h-5 text-neutral-600 dark:text-neutral-400 group-hover:text-blue-700 dark:group-hover:text-blue-400 transition-colors duration-300"
                            fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                        </svg>
                        <span
                            class="absolute -top-8 left-1/2 transform -translate-x-1/2 bg-black dark:bg-white text-white dark:text-black text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity duration-300">LinkedIn</span>
                    </a>

                    <!-- Instagram -->
                    <a href="https://instagram.com/tengkumz_" target="_blank"
                        class="group relative w-12 h-12 flex items-center justify-center rounded-full bg-white dark:bg-neutral-800 border border-neutral-200 dark:border-neutral-700 hover:border-pink-500 dark:hover:border-pink-400 transition-all duration-300 hover:scale-110 hover:shadow-lg">
                        <svg class="w-5 h-5 text-neutral-600 dark:text-neutral-400 group-hover:text-pink-500 transition-colors duration-300"
                            fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                        </svg>
                        <span
                            class="absolute -top-8 left-1/2 transform -translate-x-1/2 bg-black dark:bg-white text-white dark:text-black text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity duration-300">Instagram</span>
                    </a>
                </div>
            </div>

            <!-- Bottom Line -->
            <div class="mt-8 pt-6 border-t border-neutral-200 dark:border-neutral-800" x-ref="bottomLine"
                :class="{ 'opacity-100 translate-y-0': isVisible, 'opacity-0 translate-y-4': !isVisible }"
                class="transition-all duration-700 ease-out delay-300">
                <p class="text-center text-xs text-neutral-400 dark:text-neutral-500">
                    © {{ date('Y') }} Zyn Starter Kit. Built with ❤️ using Laravel & Alpine.js
                </p>
            </div>
        </div>
    </div>
</div>
