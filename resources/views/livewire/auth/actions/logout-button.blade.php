<button wire:click.prevent="logout" wire:loading.attr="disabled"
    class="group cursor-pointer relative inline-flex h-10 w-10 items-center justify-center overflow-hidden rounded-full bg-white/60 dark:bg-neutral-800/60 backdrop-blur-sm border border-neutral-200 dark:border-neutral-700 hover:bg-neutral-200 dark:hover:bg-neutral-700 transition-all duration-300 hover:w-32 disabled:opacity-80 disabled:pointer-events-none text-neutral-700 dark:text-neutral-200">
    <div
        class="inline-flex whitespace-nowrap opacity-0 transition-all duration-200 group-hover:-translate-x-3 group-hover:opacity-100 text-neutral-700 dark:text-neutral-200">
        Sign Out</div>
    <div class="absolute right-2.5 text-neutral-700 dark:text-neutral-200">
        <svg wire:loading.remove wire:target="logout" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
            stroke-linejoin="round" class="lucide lucide-log-out-icon lucide-log-out size-4.5">
            <path d="m16 17 5-5-5-5" />
            <path d="M21 12H9" />
            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
        </svg>
        <svg wire:loading wire:target="logout" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
            viewBox="0 0 24 24" fill="currentColor"
            class="icon icon-tabler icons-tabler-filled icon-tabler-fidget-spinner size-4.5 animate-spin">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path
                d="M12 0a5 5 0 0 1 3.584 8.488l-.012 .012a5 5 0 0 1 1.33 2.517l.018 .101l.251 -.048q .15 -.025 .3 -.041l.304 -.024l.225 -.005a5 5 0 1 1 -4.89 6.046l-.032 -.164l-.24 .048a5 5 0 0 1 -.556 .062l-.282 .008q -.427 0 -.84 -.07l-.239 -.048l-.004 .025a5 5 0 0 1 -3.331 3.834l-.22 .068a5 5 0 1 1 -.461 -9.728l.173 .036l.019 -.102c.19 -.95 .653 -1.824 1.331 -2.516l-.05 -.052a5.02 5.02 0 0 1 -1.355 -2.978l-.018 -.244l-.005 -.225a5 5 0 0 1 5 -5m6 15a1 1 0 0 0 -1 1v.01a1 1 0 0 0 2 0v-.01a1 1 0 0 0 -1 -1m-12 0a1 1 0 0 0 -1 1v.01a1 1 0 0 0 2 0v-.01a1 1 0 0 0 -1 -1m6 -4.995c-1.1 0 -1.99 .891 -1.99 1.99v.02a1.99 1.99 0 0 0 3.98 0v-.02a1.99 1.99 0 0 0 -1.99 -1.99m0 -6.005a1 1 0 0 0 -1 1v.01a1 1 0 0 0 2 0v-.01a1 1 0 0 0 -1 -1" />
        </svg>
    </div>
</button>
