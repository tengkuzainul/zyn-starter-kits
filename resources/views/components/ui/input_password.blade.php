@props([
    'label' => null,
    'name' => null,
    'data' => null,
    'placeholder' => null,
    'value' => null,
    'wireModel' => null,
])

<div>
    <label for="{{ $name ?? 'password' }}"
        class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-2 capitalize @error($wireModel ?? 'Input') text-red-500 dark:text-red-500 @enderror">
        {{ $label ?? 'Password' }}
    </label>
    <div x-data="{ {{ $data ?? 'showPassword' }}: false }">
        <div class="relative">
            <input id="{{ $name ?? 'password' }}" name="{{ $name ?? 'password' }}"
                :type="{{ $data ?? 'showPassword' }} ? 'text' : 'password'" wire:model="{{ $wireModel ?? 'password' }}"
                value="{{ $value ?? '' }}"
                class="w-full px-3 py-2 border border-neutral-300 dark:border-neutral-600 rounded-md shadow-sm placeholder-neutral-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-white dark:focus:border-white dark:bg-neutral-700 dark:text-white 
                @error($wireModel ?? 'Input') border-red-500 dark:border-red-500 bg-red-500/10 dark:bg-red-500/10 placeholder:text-red-400 placeholder:dark:text-red-400 @enderror"
                placeholder="{{ $placeholder ?? 'Enter your password' }}">
            <button type="button" @click="{{ $data ?? 'showPassword' }} = !{{ $data ?? 'showPassword' }}"
                class="absolute inset-y-0 right-0 pr-3 flex items-center text-neutral-500 focus:outline-none">
                <svg x-show="!{{ $data ?? 'showPassword' }}" class="h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>
                <svg x-show="{{ $data ?? 'showPassword' }}" class="h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                </svg>
            </button>
        </div>
        @error($wireModel ?? 'Input')
            <p class="mt-1 text-sm text-red-600 dark:text-red-500 capitalize">{{ $message }}</p>
        @enderror
    </div>
</div>
