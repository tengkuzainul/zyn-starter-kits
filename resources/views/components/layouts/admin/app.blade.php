<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

<!-- Tag Head : Start -->
<x-layouts.admin.partials.head :title="$title ?? 'Dashboard'" />
<!-- Tag Head : End -->

<body class="h-full bg-gray-100 dark:bg-neutral-800" x-data="{
    sidebarOpen: false,
    sidebarPinned: localStorage.getItem('sidebarPinned') === 'true',
    mobileOpen: false,
    isLoading: true,
    isDarkMode: localStorage.getItem('theme') === 'dark' || (!localStorage.getItem('theme') && window.matchMedia('(prefers-color-scheme: dark)').matches),
    toggleSidebar() {
        this.sidebarPinned = !this.sidebarPinned;
        this.sidebarOpen = this.sidebarPinned;
        localStorage.setItem('sidebarPinned', this.sidebarPinned);
    },
    init() {
        // Set initial sidebar state based on pinned status
        this.sidebarOpen = this.sidebarPinned;
    }
}" x-init="// Enhanced loading sequence
setTimeout(() => {
    isLoading = false;
}, 3000);
$el.classList.toggle('dark', isDarkMode);
init();
// Listen for Livewire navigation events
document.addEventListener('livewire:navigated', () => {
    // Restore sidebar state after navigation
    sidebarPinned = localStorage.getItem('sidebarPinned') === 'true';
    sidebarOpen = sidebarPinned;
});">

    <!-- Page Loader : Start -->
    <x-layouts.admin.partials.pageloader />
    <!-- Page Loader : End -->

    <!-- Main Dashboard Layout : Start -->
    <div class="flex h-screen w-full">

        <!-- Desktop Sidebar : Start -->
        <x-layouts.admin.partials.desktop_sidebar />
        <!-- Desktop Sidebar : End -->

        <!-- Main Content Area : Start -->
        <div class="flex-1 flex flex-col overflow-hidden relative">
            <!-- Mobile Header : Start -->
            <x-layouts.admin.partials.mobile_header />
            <!-- Mobile Header : End -->

            <!-- Overlay Mobile Menu Open : Start -->
            <x-layouts.admin.partials.overlay_mobile_menu />
            <!-- Overlay Mobile Menu Open : End -->

            <!-- Mobile Menu Sidebar : Start -->
            <x-layouts.admin.partials.mobile_menu_sidebar />
            <!-- Mobile Menu Sidebar : End -->

            <!-- Button Collapse/Expand sidebar : Start-->
            <x-layouts.admin.partials.sidebar_toggle_button />
            <!-- Button Collapse/Expand sidebar : End-->


            <!-- Theme Toogle Desktop : Start -->
            <x-layouts.admin.partials.desktop_theme_toggle>
                <x-slot name="slot">
                    <!-- Button Logout -->
                    <livewire:auth.actions.logout-button />
                </x-slot>
            </x-layouts.admin.partials.desktop_theme_toggle>
            <!-- Theme Toogle Desktop : Start -->


            <!-- MAIN CONTENT -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-white dark:bg-neutral-900 ">
                <div class="p-4 sm:p-6 md:p-8">
                    <x-ui.toast_notifications />
                    {{ $slot }}
                </div>
            </main>
        </div>
        <!-- Main Content Area : End-->
    </div>
    <!-- Main Dashboard Layout : End -->

    <!-- Scripts -->
    @livewireScripts
</body>

</html>
