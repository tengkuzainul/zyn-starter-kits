@props([
    'label' => null,
    'name' => null,
    'type' => null,
    'placeholder' => null,
    'value' => null,
    'wireModel' => null,
])

<div>
    <label for="name"
        class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-2 capitalize @error($wireModel ?? 'Input') text-red-500 dark:text-red-500 @enderror">
        {{ $label ?? 'Input' }}
    </label>
    <input id="{{ $name ?? 'Input' }}" name="{{ $name ?? 'Input' }}" type="{{ $text ?? 'text' }}"
        wire:model="{{ $wireModel ?? 'Input' }}" value="{{ $value ?? '' }}"
        class="w-full px-3 py-2 border border-neutral-300 dark:border-neutral-600 rounded-md shadow-sm placeholder-neutral-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-white dark:focus:border-white dark:bg-neutral-700 dark:text-white
            @error($wireModel ?? 'Input') border-red-500 dark:border-red-500 bg-red-500/10 dark:bg-red-500/10 placeholder:text-red-400 placeholder:dark:text-red-400 @enderror"
        placeholder="{{ $placeholder ?? 'Enter your input' }}">
    @error($wireModel ?? 'Input')
        <p class="mt-1 text-sm text-red-600 dark:text-red-500 capitalize">{{ $message }}</p>
    @enderror
</div>
