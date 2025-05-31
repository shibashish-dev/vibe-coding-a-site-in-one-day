<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    @include('partials.head')
</head>

<body class="min-h-screen bg-white dark:bg-zinc-800">
    <flux:sidebar sticky stashable class="border-r border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
        <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

        <a href="{{ route('dashboard') }}" class="mr-5 flex items-center space-x-2" wire:navigate>
            <x-app-logo />
        </a>

        <flux:navlist variant="outline">
            <flux:navlist.group class="grid">

                <flux:navlist.item :href="route('dashboard')" :current="request()->routeIs('dashboard')" wire:navigate>
                    <i class="fas fa-tachometer-alt mr-2 text-gray-500"></i>
                    {{ __('Dashboard') }}
                </flux:navlist.item>

                <flux:navlist.item :href="route('circulars.index')" :current="request()->routeIs('circulars.*')"
                    wire:navigate>
                    <i class="fas fa-envelope-open-text mr-2 text-gray-500"></i>
                    {{ __('Circulars') }}
                </flux:navlist.item>

                <flux:navlist.item :href="route('quick_infos.index')" :current="request()->routeIs('quick_infos.*')"
                    wire:navigate>
                    <i class="fas fa-bolt mr-2 text-gray-500"></i>
                    {{ __('Quick Info') }}
                </flux:navlist.item>

                <flux:navlist.item :href="route('whats_new.index')" :current="request()->routeIs('whats_new.*')"
                    wire:navigate>
                    <i class="fas fa-star mr-2 text-gray-500"></i>
                    {{ __("What's New") }}
                </flux:navlist.item>

                <flux:navlist.item :href="route('form_pdfs.index')" :current="request()->routeIs('form_pdfs.*')"
                    wire:navigate>
                    <i class="fas fa-file-pdf mr-2 text-gray-500"></i>
                    {{ __('Form PDFs') }}
                </flux:navlist.item>

                <flux:navlist.item :href="route('image_galleries.index')"
                    :current="request()->routeIs('image_galleries.*')" wire:navigate>
                    <i class="fas fa-image mr-2 text-gray-500"></i>
                    {{ __('Image Gallery') }}
                </flux:navlist.item>

                <flux:navlist.item :href="route('canteen_info.index')"
                    :current="request()->routeIs('canteen_info.*')" wire:navigate>
                    <i class="fa-solid fa-utensils mr-2 text-gray-500"></i>
                    {{ __('Canteen Info') }}
                </flux:navlist.item>
                <flux:navlist.item :href="route('attendance.index')"
                    :current="request()->routeIs('attendance.*')" wire:navigate>
                    <i class="fa-solid fa-clipboard-user mr-2 text-gray-500"></i>
                    {{ __('Attendance') }}
                </flux:navlist.item>
                <flux:navlist.item :href="route('employee.index')"
                    :current="request()->routeIs('emplyee.*')" wire:navigate>
                    <i class="fa-solid fa-clipboard-user mr-2 text-gray-500"></i>
                    {{ __('Employees') }}
                </flux:navlist.item>

            </flux:navlist.group>
        </flux:navlist>


        <flux:spacer />

        <!-- Desktop User Menu -->
        <flux:dropdown position="bottom" align="start">
            <flux:profile :name="auth()->user()->name" :initials="auth()->user()->initials()"
                icon-trailing="chevrons-up-down" />

            <flux:menu class="w-[220px]">
                <flux:menu.radio.group>
                    <div class="p-0 text-sm font-normal">
                        <div class="flex items-center gap-2 px-1 py-1.5 text-left text-sm">
                            <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                <span
                                    class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white">
                                    {{ auth()->user()->initials() }}
                                </span>
                            </span>

                            <div class="grid flex-1 text-left text-sm leading-tight">
                                <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                            </div>
                        </div>
                    </div>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <flux:menu.radio.group>
                    <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>{{ __('Settings') }}
                    </flux:menu.item>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                        {{ __('Log Out') }}
                    </flux:menu.item>
                </form>
            </flux:menu>
        </flux:dropdown>
    </flux:sidebar>

    <!-- Mobile User Menu -->
    <flux:header class="lg:hidden">
        <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

        <flux:spacer />

        <flux:dropdown position="top" align="end">
            <flux:profile :initials="auth()->user()->initials()" icon-trailing="chevron-down" />

            <flux:menu>
                <flux:menu.radio.group>
                    <div class="p-0 text-sm font-normal">
                        <div class="flex items-center gap-2 px-1 py-1.5 text-left text-sm">
                            <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                <span
                                    class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white">
                                    {{ auth()->user()->initials() }}
                                </span>
                            </span>

                            <div class="grid flex-1 text-left text-sm leading-tight">
                                <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                            </div>
                        </div>
                    </div>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <flux:menu.radio.group>
                    <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>{{ __('Settings') }}
                    </flux:menu.item>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                        {{ __('Log Out') }}
                    </flux:menu.item>
                </form>
            </flux:menu>
        </flux:dropdown>
    </flux:header>

    {{ $slot }}

    @fluxScripts
</body>

</html>
