<div class="max-w-lg mx-auto py-8">
    <h2 class="text-2xl font-semibold text-center text-zinc-900">Forgot Your Password?</h2>
    <p class="text-center text-sm text-zinc-600 mt-2">Enter your email address and we'll send you a link to reset your
        password.</p>

    <form wire:submit.prevent="sendPasswordResetLink" class="mt-6">
        <div>
            <label for="email" class="block text-sm text-zinc-700">Email Address</label>
            <input wire:model="email" type="email" id="email" name="email"
                class="mt-1 w-full px-4 py-2 rounded-md border border-zinc-300 focus:ring-2 focus:ring-primary-500"
                placeholder="you@example.com" required autofocus>
        </div>

        <div class="mt-4">
            <button type="submit"
                class="w-full bg-primary-600 hover:bg-primary-700 text-white py-2 px-4 rounded-md text-sm font-medium">Send
                Reset Link</button>
        </div>

        @if (session()->has('status'))
            <div class="mt-4 text-center text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        @if (session()->has('error'))
            <div class="mt-4 text-center text-sm text-red-600">
                {{ session('error') }}
            </div>
        @endif
    </form>
</div>