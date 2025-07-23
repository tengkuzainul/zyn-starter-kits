<div id="page-loader" x-show="isLoading" class="fixed inset-0 z-50 flex items-center justify-center"
    x-transition:leave="transition-all duration-700 ease-[cubic-bezier(0.4,0,0.2,1)]"
    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">

    <!-- Background with gradient and particles -->
    <div class="absolute inset-0 bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900">
        <!-- Include particles component -->
        <!-- Animated Background Particles -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <!-- Large floating particles -->
            <div class="absolute top-1/4 left-1/4 w-2 h-2 bg-blue-500/20 rounded-full animate-particle-float"></div>
            <div class="absolute top-3/4 left-3/4 w-3 h-3 bg-purple-500/20 rounded-full animate-particle-float"
                style="animation-delay: 1s;"></div>
            <div class="absolute top-1/2 left-1/6 w-1 h-1 bg-blue-400/30 rounded-full animate-particle-float"
                style="animation-delay: 2s;"></div>
            <div class="absolute top-1/6 right-1/4 w-2 h-2 bg-indigo-500/25 rounded-full animate-particle-float"
                style="animation-delay: 1.5s;"></div>
            <div class="absolute bottom-1/4 right-1/6 w-1 h-1 bg-purple-400/30 rounded-full animate-particle-float"
                style="animation-delay: 0.5s;"></div>
            <div class="absolute top-3/5 left-3/5 w-2 h-2 bg-blue-300/20 rounded-full animate-particle-float"
                style="animation-delay: 2.5s;"></div>

            <!-- Medium particles -->
            <div class="absolute top-1/3 right-1/3 w-1 h-1 bg-blue-600/40 rounded-full animate-particle-float"
                style="animation-delay: 3s;"></div>
            <div class="absolute bottom-1/3 left-1/2 w-1 h-1 bg-indigo-400/35 rounded-full animate-particle-float"
                style="animation-delay: 1.8s;"></div>
            <div class="absolute top-4/5 left-1/5 w-2 h-2 bg-purple-300/25 rounded-full animate-particle-float"
                style="animation-delay: 0.8s;"></div>

            <!-- Small accent particles -->
            <div class="absolute top-2/5 right-2/5 w-0.5 h-0.5 bg-blue-400/50 rounded-full animate-particle-float"
                style="animation-delay: 2.2s;"></div>
            <div class="absolute bottom-2/5 left-4/5 w-0.5 h-0.5 bg-purple-500/40 rounded-full animate-particle-float"
                style="animation-delay: 1.2s;"></div>
            <div class="absolute top-1/5 left-3/4 w-1 h-1 bg-indigo-300/30 rounded-full animate-particle-float"
                style="animation-delay: 3.5s;"></div>
        </div>


        <!-- Overlay gradient -->
        <div class="absolute inset-0 bg-gradient-to-t from-black/20 via-transparent to-black/10"></div>
    </div>

    <!-- Central Content Container -->
    <div class="relative z-10 flex flex-col items-center" x-transition:leave="transition-all duration-500 ease-out"
        x-transition:leave-start="opacity-100 scale-100 rotate-0"
        x-transition:leave-end="opacity-0 scale-125 rotate-12">

        <!-- Rotating Ring Background -->
        <div class="absolute inset-0 -m-8">
            <div class="w-32 h-32 border-2 border-sky-500/20 rounded-full animate-spin" style="animation-duration: 3s;">
            </div>
            <div class="absolute inset-2 w-28 h-28 border border-red-500/20 rounded-full animate-spin"
                style="animation-duration: 4s; animation-direction: reverse;"></div>
            <div class="absolute inset-4 w-24 h-24 border border-purple-500/15 rounded-full animate-pulse-ring">
            </div>
        </div>

        <!-- Main Logo Container -->
        <div
            class="relative bg-gradient-to-br from-sky-500 via-blue-600 to-red-600 p-4 rounded-2xl shadow-2xl ring-4 ring-white/10 backdrop-blur-sm animate-float animate-glow">

            <!-- Logo Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="text-white">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M15 5l0 2" />
                <path d="M15 11l0 2" />
                <path d="M15 17l0 2" />
                <path
                    d="M5 5h14a2 2 0 0 1 2 2v3a2 2 0 0 0 0 4v3a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-3a2 2 0 0 0 0 -4v-3a2 2 0 0 1 2 -2" />
            </svg>

            <!-- Shimmer Effect Overlay -->
            <div
                class="absolute inset-0 bg-gradient-to-r from-transparent via-white/30 to-transparent rounded-2xl animate-shimmer">
            </div>
        </div>

        <!-- Loading Text -->
        <div class="mt-8 text-center">
            <div class="text-white font-semibold text-xl tracking-wide mb-2" x-show="true"
                x-transition:enter="transition-all duration-700 delay-300"
                x-transition:enter-start="opacity-0 translate-y-6" x-transition:enter-end="opacity-100 translate-y-0">
                {{ config('app.name', 'Dashboard') }}
            </div>
            <div class="text-white/70 text-sm" x-show="true" x-transition:enter="transition-all duration-700 delay-500"
                x-transition:enter-start="opacity-0 translate-y-6" x-transition:enter-end="opacity-100 translate-y-0">
                Preparing your workspace...
            </div>
        </div>

        <!-- Enhanced Progress Bar -->
        <div class="mt-8 w-72 bg-neutral-800/60 rounded-full h-2 overflow-hidden backdrop-blur-sm ring-1 ring-white/10"
            x-data="{ progress: 0 }" x-init="let interval = setInterval(() => {
                progress += Math.random() * 12 + 3;
                if (progress >= 100) {
                    progress = 100;
                    clearInterval(interval);
                }
            }, 150);" x-show="true"
            x-transition:enter="transition-all duration-700 delay-700"
            x-transition:enter-start="opacity-0 translate-y-6 scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 scale-100">

            <div class="h-full bg-gradient-to-r from-sky-500 via-blue-500 to-purple-500 rounded-full transition-all duration-300 ease-out relative overflow-hidden"
                :style="`width: ${progress}%`">
                <!-- Progress shimmer effect -->
                <div
                    class="absolute inset-0 bg-gradient-to-r from-transparent via-white/30 to-transparent animate-shimmer">
                </div>
            </div>
        </div>

        <!-- Loading percentage -->
        <div class="mt-3 text-white/50 text-xs font-medium" x-show="true"
            x-transition:enter="transition-all duration-700 delay-900" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-text="`${Math.round(progress)}%`">
        </div>
    </div>
</div>
