@php
    $title = 'Procurement Login';
    $description = 'Login with your procurement credentials';
@endphp

<div class="flex flex-col gap-6 max-w-md w-full mx-auto mt-10 px-6">
    <div class="text-center">
        <h1 class="text-2xl font-semibold text-zinc-900 dark:text-zinc-100">{{ $title }}</h1>
        <p class="text-zinc-600 dark:text-zinc-400 mt-1">{{ $description }}</p>
    </div>

    <form wire:submit="login" class="flex flex-col gap-5">
        <!-- Email -->
        <div>
            <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-200">Email</label>
            <input type="email" wire:model.defer="email" required autofocus autocomplete="email"
                class="mt-1 w-full rounded-lg border border-zinc-300 dark:border-zinc-600 bg-white dark:bg-zinc-800 px-3 py-2 text-sm focus:ring-primary-500 focus:border-primary-500"
                placeholder="you@example.com" />
            @error('email') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Password -->
        <div>
            <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-200">Password</label>
            <input type="password" wire:model.defer="password" required autocomplete="current-password"
                class="mt-1 w-full rounded-lg border border-zinc-300 dark:border-zinc-600 bg-white dark:bg-zinc-800 px-3 py-2 text-sm focus:ring-primary-500 focus:border-primary-500" />
            @error('password') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="flex items-center justify-between text-sm">
            <label class="inline-flex items-center space-x-2">
                <input type="checkbox" wire:model="remember" class="rounded text-primary-600 border-zinc-300">
                <span class="text-zinc-700 dark:text-zinc-300">Remember me</span>
            </label>

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-primary-600 hover:underline">Forgot password?</a>
            @endif
        </div>

        <button type="submit"
            class="mt-4 w-full bg-zinc-600 hover:bg-zinc-700 text-white py-2 px-4 rounded-lg text-sm font-medium">
            Log in
        </button>
    </form>

    <p class="text-center text-sm text-zinc-600 dark:text-zinc-400 mt-4">
        Don't have a procurement account?
        <a href="{{ route('procurement.register') }}" class="text-primary-600 hover:underline">Sign up</a>
    </p>
</div>