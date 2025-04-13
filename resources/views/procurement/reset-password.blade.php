<div class="max-w-lg mx-auto py-8">
    <h2 class="text-2xl font-semibold text-center text-zinc-900">Reset Your Password</h2>

    <form wire:submit.prevent="resetPassword" class="mt-6">
        <div>
            <label for="email" class="block text-sm text-zinc-700">Email Address</label>
            <input type="email" id="email" name="email"
                class="mt-1 w-full px-4 py-2 rounded-md border border-zinc-300 focus:ring-2 focus:ring-primary-500"
                value="{{ $email }}" readonly>
        </div>

        <div class="mt-4">
            <label for="password" class="block text-sm text-zinc-700">New Password</label>
            <input wire:model="password" type="password" id="password" name="password"
                class="mt-1 w-full px-4 py-2 rounded-md border border-zinc-300 focus:ring-2 focus:ring-primary-500"
                placeholder="Enter new password" required>
        </div>

        <div class="mt-4">
            <label for="password_confirmation" class="block text-sm text-zinc-700">Confirm Password</label>
            <input wire:model="password_confirmation" type="password" id="password_confirmation"
                name="password_confirmation"
                class="mt-1 w-full px-4 py-2 rounded-md border border-zinc-300 focus:ring-2 focus:ring-primary-500"
                placeholder="Confirm your password" required>
        </div>

        <div class="mt-6">
            <button type="submit"
                class="w-full bg-primary-600 hover:bg-primary-700 text-white py-2 px-4 rounded-md text-sm font-medium">Reset
                Password</button>
        </div>

        @if (session()->has('status'))
        <div class="mt-4 text-center text-sm text-green-600">
            {{ session('status') }}
        </div>
        @endif

        @if ($errors->any())
        <div class="mt-4 text-center text-sm text-red-600">
            {{ $errors->first() }}
        </div>
        @endif
    </form>
</div>