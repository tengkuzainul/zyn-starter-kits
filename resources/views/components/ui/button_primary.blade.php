@props(['label' => null, 'type' => null, 'name' => null, 'wireTarget' => null, 'wireModel' => null])
<button type="{{ $type ?? 'button' }}" name="{{ $name ?? '' }}" wire:loading.attr="disabled"
    class="cursor-pointer group relative w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 dark:bg-white dark:text-neutral-900 dark:hover:bg-neutral-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 dark:focus:ring-white transition duration-150 ease-in-out disabled:opacity-50 disabled:cursor-not-allowed disabled:hover:bg-blue-600 dark:disabled:hover:bg-white disabled:shadow-none">
    <span
        class="flex items-center translate-x-0 opacity-100 transition group-hover:-translate-x-[150%] group-hover:opacity-0 group-disabled:translate-x-0 group-disabled:opacity-100">
        @if (isset($icon))
            {{ $icon }}
        @endif
        <svg wire:loading wire:target='{{ $wireTarget ?? '' }}' xmlns="http://www.w3.org/2000/svg" width="24"
            height="24" viewBox="0 0 24 24" fill="currentColor"
            class="icon icon-tabler icons-tabler-filled icon-tabler-fidget-spinner size-4 mr-2 animate-spin">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path
                d="M12 0a5 5 0 0 1 3.584 8.488l-.012 .012a5 5 0 0 1 1.33 2.517l.018 .101l.251 -.048q .15 -.025 .3 -.041l.304 -.024l.225 -.005a5 5 0 1 1 -4.89 6.046l-.032 -.164l-.24 .048a5 5 0 0 1 -.556 .062l-.282 .008q -.427 0 -.84 -.07l-.239 -.048l-.004 .025a5 5 0 0 1 -3.331 3.834l-.22 .068a5 5 0 1 1 -.461 -9.728l.173 .036l.019 -.102c.19 -.95 .653 -1.824 1.331 -2.516l-.05 -.052a5.02 5.02 0 0 1 -1.355 -2.978l-.018 -.244l-.005 -.225a5 5 0 0 1 5 -5m6 15a1 1 0 0 0 -1 1v.01a1 1 0 0 0 2 0v-.01a1 1 0 0 0 -1 -1m-12 0a1 1 0 0 0 -1 1v.01a1 1 0 0 0 2 0v-.01a1 1 0 0 0 -1 -1m6 -4.995c-1.1 0 -1.99 .891 -1.99 1.99v.02a1.99 1.99 0 0 0 3.98 0v-.02a1.99 1.99 0 0 0 -1.99 -1.99m0 -6.005a1 1 0 0 0 -1 1v.01a1 1 0 0 0 2 0v-.01a1 1 0 0 0 -1 -1" />
        </svg>
        {{ $label ?? 'Submit' }}
    </span>
    <div
        class="absolute translate-x-[150%] opacity-0 transition group-hover:translate-x-0 group-hover:opacity-100 group-disabled:translate-x-[150%] group-disabled:opacity-0">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="lucide lucide-arrow-right-icon lucide-arrow-right size-5">
            <path d="M5 12h14" />
            <path d="m12 5 7 7-7 7" />
        </svg>
    </div>
</button>
