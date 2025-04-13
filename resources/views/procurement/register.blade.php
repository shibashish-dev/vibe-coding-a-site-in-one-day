@php
    $title = 'Create Procurement Account';
    $description = 'Enter your details below to register';
@endphp

<div class="flex flex-col gap-6 max-w-md w-full mx-auto mt-10 px-6">
    <div class="text-center">
        <h1 class="text-2xl font-semibold text-zinc-900 dark:text-zinc-100">{{ $title }}</h1>
        <p class="text-zinc-600 dark:text-zinc-400 mt-1">{{ $description }}</p>
    </div>

    <form wire:submit="register" class="flex flex-col gap-5">
        <!-- Name -->
        <div>
            <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-200">Full Name</label>
            <input type="text" wire:model.defer="name" required autofocus autocomplete="name"
                class="mt-1 w-full rounded-lg border border-zinc-300 dark:border-zinc-600 bg-white dark:bg-zinc-800 px-3 py-2 text-sm focus:ring-primary-500 focus:border-primary-500" />
            @error('name') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Email -->
        <div>
            <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-200">Email</label>
            <input type="email" wire:model.defer="email" required autocomplete="email"
                class="mt-1 w-full rounded-lg border border-zinc-300 dark:border-zinc-600 bg-white dark:bg-zinc-800 px-3 py-2 text-sm focus:ring-primary-500 focus:border-primary-500"
                placeholder="you@example.com" />
            @error('email') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-200">Phone</label>
            <input type="phone" wire:model.defer="phone" required autocomplete="phone"
                class="mt-1 w-full rounded-lg border border-zinc-300 dark:border-zinc-600 bg-white dark:bg-zinc-800 px-3 py-2 text-sm focus:ring-primary-500 focus:border-primary-500"
                placeholder="+919237785623" />
            @error('phone') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Password -->
        <div>
            <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-200">Password</label>
            <input type="password" wire:model.defer="password" required autocomplete="new-password"
                class="mt-1 w-full rounded-lg border border-zinc-300 dark:border-zinc-600 bg-white dark:bg-zinc-800 px-3 py-2 text-sm focus:ring-primary-500 focus:border-primary-500" />
            @error('password') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Confirm Password -->
        <div>
            <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-200">Confirm Password</label>
            <input type="password" wire:model.defer="password_confirmation" required autocomplete="new-password"
                class="mt-1 w-full rounded-lg border border-zinc-300 dark:border-zinc-600 bg-white dark:bg-zinc-800 px-3 py-2 text-sm focus:ring-primary-500 focus:border-primary-500" />
        </div>

        <!-- Role -->
        <div>
            <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-200">Select Role</label>
            <select wire:model.defer="role"
                class="mt-1 w-full rounded-lg border border-zinc-300 dark:border-zinc-600 bg-white dark:bg-zinc-800 px-3 py-2 text-sm focus:ring-primary-500 focus:border-primary-500">
                <option value="procurement_user">Procurement User</option>
                <option value="procurement_admin">Procurement Admin</option>
            </select>
            @error('role') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
        </div>


        <button type="submit"
            class="mt-4 w-full bg-zinc-600 hover:bg-zinc-700 text-white py-2 px-4 rounded-lg text-sm font-medium">
            Create Account
        </button>
    </form>

    <p class="text-center text-sm text-zinc-600 dark:text-zinc-400 mt-4">
        Already have a procurement account?
        <a href="{{ route('procurement.login') }}" class="text-primary-600 hover:underline">Log in</a>
    </p>
</div>