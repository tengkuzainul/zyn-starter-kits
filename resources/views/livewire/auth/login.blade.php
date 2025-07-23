<form class="space-y-6" wire:submit.prevent="login">
    <!-- Email Field -->
    <x-ui.input label='Email Address' name='email' type='email' placeholder='Input your email address'
        wireModel='email' />

    <!-- Password Field -->
    <x-ui.input_password label='Password' name='password' data='showPassword' placeholder='Enter your password'
        wireModel='password' />

    <!-- Remember Me & Forgot Password -->
    <div class="flex items-center justify-between">
        <div class="flex items-center">
            <x-ui.checkbox label='Remember me' name='remember' wireModel='remember' />
        </div>

        <div class="text-sm">
            <a href="#"
                class="font-medium text-neutral-700 hover:text-neutral-900 dark:text-neutral-300 dark:hover:text-white">
                Forgot password?
            </a>
        </div>
    </div>

    <!-- Submit Button -->
    <div>
        <x-ui.button_primary :label="'Sign in to ' . config('app.name')" type='submit' wireTarget='login'>
            <x-slot name="icon">
                <svg wire:loading.remove wire:target='login' class="w-5 h-5 mr-2" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1">
                    </path>
                </svg>
            </x-slot>
        </x-ui.button_primary>
    </div>

    <div class="relative">
        <div class="absolute inset-0 flex items-center">
            <div class="w-full border-t border-neutral-300 dark:border-neutral-600"></div>
        </div>
        <div class="relative flex justify-center text-sm">
            <span class="px-2 bg-white dark:bg-neutral-800 text-neutral-500">Or continue with</span>
        </div>
    </div>

    <!-- Social Login Buttons -->
    <div class="grid grid-cols-1 gap-3">
        <button type="button"
            class="cursor-pointer group relative inline-flex h-10 items-center justify-center overflow-hidden rounded-md bg-blue-600 dark:bg-white px-6 font-medium text-white dark:text-neutral-900 duration-500">
            <div class="relative inline-flex -translate-x-0 items-center transition group-hover:-translate-x-6">
                <div
                    class="absolute translate-x-0 opacity-100 transition group-hover:-translate-x-6 group-hover:opacity-0">
                    <svg class="h-5 w-5" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" />
                        <path fill="currentColor"
                            d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" />
                        <path fill="currentColor"
                            d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" />
                        <path fill="currentColor"
                            d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" />
                    </svg>
                </div>
                <span class="pl-6">Google</span>
                <div
                    class="absolute right-0 translate-x-12 opacity-0 transition group-hover:translate-x-6 group-hover:opacity-100">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-arrow-right-icon lucide-arrow-right size-5">
                        <path d="M5 12h14" />
                        <path d="m12 5 7 7-7 7" />
                    </svg>
                </div>
            </div>
        </button>
    </div>
</form>
