<!-- Notification -->
<!-- An Alpine.js and Tailwind CSS component by https://pinemix.com -->
<div x-data="{
    // Options
    position: 'top-start', // 'top-start', 'top-end', 'bottom-start', 'bottom-end'
    autoClose: true,
    autoCloseDelay: 5000,

    // Helpers
    notifications: [],
    nextId: 1,

    // Set transition classes based on position
    transitionClasses: {
        'x-transition:enter-start'() {
            if (this.position === 'top-start' || this.position === 'bottom-start') {
                return 'opacity-0 -translate-x-12 rtl:translate-x-12';
            } else if (this.position === 'top-end' || this.position === 'bottom-end') {
                return 'opacity-0 translate-x-12 rtl:-translate-x-12';
            }
        },
        'x-transition:leave-end'() {
            if (this.position === 'top-start' || this.position === 'bottom-start') {
                return 'opacity-0 -translate-x-12 rtl:translate-x-12';
            } else if (this.position === 'top-end' || this.position === 'bottom-end') {
                return 'opacity-0 translate-x-12 rtl:-translate-x-12';
            }
        },
    },

    // Trigger a notification
    triggerNotification(message, type, link) {
        const id = this.nextId++;

        this.notifications.push({ id, message, type, link, visible: false });

        setTimeout(() => {
            const index = this.notifications.findIndex(n => n.id === id);

            if (index > -1) {
                this.notifications[index].visible = true;
            }
        }, 30);

        if (this.autoClose) {
            setTimeout(() => this.dismissNotification(id), this.autoCloseDelay);
        }
    },

    // Dismiss a notification
    dismissNotification(id) {
        const index = this.notifications.findIndex(n => n.id === id);

        if (index > -1) {
            this.notifications[index].visible = false;

            setTimeout(() => {
                this.notifications.splice(index, 1);
            }, 300);
        }
    }
}"
    @notify.window="triggerNotification($event.detail.message, $event.detail.type, $event.detail.link)">
    <!-- Notifications Container -->
    <div x-cloak x-show="notifications.length > 0" role="region" aria-label="Notifications"
        class="fixed z-[999999999] flex w-80 gap-2"
        :class="{
            'flex-col-reverse': position === 'top-start' || position === 'top-end',
            'flex-col': position === 'bottom-start' || position === 'bottom-end',
            'top-4': position === 'top-end' || position === 'top-start',
            'bottom-4': position === 'bottom-end' || position === 'bottom-start',
            'end-4': position === 'top-end' || position === 'bottom-end',
            'start-4': position === 'top-start' || position === 'bottom-start',
        }">
        <template x-for="notification in notifications" :key="notification.id">
            <div x-show="notification.visible" x-bind="transitionClasses"
                x-transition:enter="transition ease-out duration-300" x-transition:enter-end="opacity-100 translate-x-0"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-x-0"
                class="flex items-center justify-between gap-4 rounded-lg border p-4 text-sm shadow-xs "
                :class="{
                    'bg-green-600 text-white dark:bg-green-700 dark:text-white border-green-500 dark:border-green-600': notification
                        .type === 'success',
                    'bg-rose-700 text-white dark:bg-rose-800 dark:text-white border-rose-600 dark:border-rose-700': notification
                        .type === 'error',
                    'bg-blue-600 text-white dark:bg-blue-700 dark:text-white border-blue-500 dark:border-blue-600': notification
                        .type === 'info',
                    'bg-amber-600 text-white dark:bg-amber-700 dark:text-white border-amber-500 dark:border-amber-600': notification
                        .type === 'warning',
                    'bg-zinc-100 text-zinc-800 border-zinc-200 dark:bg-zinc-800 dark:text-zinc-100 dark:border-zinc-700': notification
                        .type === 'neutral'
                }"
                role="alert" :aria-live="notification.type === 'error' ? 'assertive' : 'polite'">
                <template x-if="notification.type !== 'neutral'">
                    <div class="flex size-8 flex-none items-center justify-center rounded-full"
                        :class="{
                            'bg-green-500 text-white dark:bg-green-600 dark:text-white': notification
                                .type === 'success',
                            'bg-rose-600 text-white dark:bg-rose-700 dark:text-white': notification.type === 'error',
                            'bg-blue-500 text-white dark:bg-blue-600 dark:text-white': notification.type === 'info',
                            'bg-amber-500 text-white dark:bg-amber-600 dark:text-white': notification
                                .type === 'warning'
                        }">
                        <!-- Success Icon -->
                        <template x-if="notification.type === 'success'">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                                class="hi-micro hi-check inline-block size-4">
                                <path fill-rule="evenodd"
                                    d="M12.416 3.376a.75.75 0 0 1 .208 1.04l-5 7.5a.75.75 0 0 1-1.154.114l-3-3a.75.75 0 0 1 1.06-1.06l2.353 2.353 4.493-6.74a.75.75 0 0 1 1.04-.207Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </template>
                        <!-- END Success Icon -->

                        <!-- Error Icon -->
                        <template x-if="notification.type === 'error'">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                                class="hi-micro hi-x-mark inline-block size-4">
                                <path
                                    d="M5.28 4.22a.75.75 0 0 0-1.06 1.06L6.94 8l-2.72 2.72a.75.75 0 1 0 1.06 1.06L8 9.06l2.72 2.72a.75.75 0 1 0 1.06-1.06L9.06 8l2.72-2.72a.75.75 0 0 0-1.06-1.06L8 6.94 5.28 4.22Z" />
                            </svg>
                        </template>
                        <!-- END Error Icon -->

                        <!-- Warning Icon -->
                        <template x-if="notification.type === 'warning'">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                                class="hi-micro hi-shield-exclamation inline-block size-4">
                                <path fill-rule="evenodd"
                                    d="M7.5 1.709a.75.75 0 0 1 1 0 8.963 8.963 0 0 0 4.84 2.217.75.75 0 0 1 .654.72 10.499 10.499 0 0 1-5.647 9.672.75.75 0 0 1-.694-.001 10.499 10.499 0 0 1-5.647-9.672.75.75 0 0 1 .654-.719A8.963 8.963 0 0 0 7.5 1.71ZM8 5a.75.75 0 0 1 .75.75v2a.75.75 0 0 1-1.5 0v-2A.75.75 0 0 1 8 5Zm0 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </template>
                        <!-- END Warning Icon -->

                        <!-- Info Icon -->
                        <template x-if="notification.type === 'info'">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                                class="hi-micro hi-information-circle inline-block size-4">
                                <path fill-rule="evenodd"
                                    d="M15 8A7 7 0 1 1 1 8a7 7 0 0 1 14 0ZM9 5a1 1 0 1 1-2 0 1 1 0 0 1 2 0ZM6.75 8a.75.75 0 0 0 0 1.5h.75v1.75a.75.75 0 0 0 1.5 0v-2.5A.75.75 0 0 0 8.25 8h-1.5Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </template>
                        <!-- END Info Icon -->
                    </div>
                </template>
                <div class="grow">
                    <div x-text="notification.message"></div>
                    <template x-if="notification.link">
                        <a @click="notification.link === '#' ? $event.preventDefault() : null" :href="notification.link"
                            class="group mt-2 inline-flex items-center gap-1 rounded-lg bg-zinc-100 px-2 py-0.5 text-xs font-medium text-blue-600 hover:bg-zinc-200/75 hover:text-blue-700 dark:bg-zinc-700 dark:text-neutral-100 dark:hover:bg-zinc-600/50 dark:hover:text-neutral-50">
                            <span>Check it out</span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                                class="hi-micro hi-arrow-right inline-block size-3 opacity-50 transition ease-out group-hover:translate-x-0.5">
                                <path fill-rule="evenodd"
                                    d="M2 8a.75.75 0 0 1 .75-.75h8.69L8.22 4.03a.75.75 0 0 1 1.06-1.06l4.5 4.5a.75.75 0 0 1 0 1.06l-4.5 4.5a.75.75 0 0 1-1.06-1.06l3.22-3.22H2.75A.75.75 0 0 1 2 8Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    </template>
                </div>
                <button @click="dismissNotification(notification.id)" type="button"
                    class="flex-none text-neutral-300 hover:text-neutral-100 active:text-blue-500 dark:text-neutral-300 dark:hover:text-white dark:active:text-neutral-50">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                        class="hi-mini hi-x-mark inline-block size-5" aria-hidden="true">
                        <path
                            d="M6.28 5.22a.75.75 0 0 0-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 1 0 1.06 1.06L10 11.06l3.72 3.72a.75.75 0 1 0 1.06-1.06L11.06 10l3.72-3.72a.75.75 0 0 0-1.06-1.06L10 8.94 6.28 5.22Z" />
                    </svg>
                    <span class="sr-only">Close Notification</span>
                </button>
            </div>
        </template>
    </div>
    <!-- END Notifications Container -->
</div>
<!-- END Notification -->
