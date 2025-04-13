<?php

namespace App\Livewire\Auth\Procurement;

use App\Models\ProcurementUser;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.auth')]
class Register extends Component
{
    public string $name = '';
    public string $email = '';
    public string $phone = '';
    public string $password = '';
    public string $password_confirmation = '';
    public string $role = 'procurement_user';

    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:procurement_users,email'],
            'phone' => ['required', 'string', 'max:13'],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', 'in:procurement_admin,procurement_user'],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        $user = ProcurementUser::create($validated);
        event(new Registered($user));

        Auth::guard('procurement')->login($user);

        $this->redirect(route('procurement.dashboard'), navigate: true);
    }

    public function render()
    {
        return view('procurement.register');
    }

}
