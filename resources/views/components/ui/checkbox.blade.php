@props(['label' => null, 'name' => null, 'wireModel' => null])
<label for="{{ $name ?? 'checkbox' }}"
    class="flex items-center gap-2 text-sm font-medium text-neutral-700 dark:text-neutral-300 cursor-pointer">
    <span class="relative flex items-center">
        <input id="{{ $name ?? 'checkbox' }}" type="checkbox" name="{{ $name ?? 'checkbox' }}"
            wire:model.defer="{{ $wireModel ?? 'checkbox' }}"
            class="cursor-pointer before:content[''] peer relative size-4 appearance-none overflow-hidden rounded-sm border border-neutral-300 dark:border-neutral-600 bg-white dark:bg-neutral-800 before:absolute before:inset-0 before:scale-0 before:rounded-full before:transition before:duration-200 checked:border-blue-600 dark:checked:border-blue-500 checked:before:scale-125 checked:before:bg-blue-600 dark:checked:before:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-neutral-800 disabled:cursor-not-allowed" />
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" stroke="currentColor"
            fill="none" stroke-width="4"
            class="pointer-events-none invisible absolute left-1/2 top-1/2 size-3 -translate-x-1/2 -translate-y-1/2 scale-0 transition duration-200 delay-200 peer-checked:scale-100 text-white peer-checked:visible">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
        </svg>
    </span>
    <span>{{ $label ?? 'Checkbox' }}</span>
</label>
