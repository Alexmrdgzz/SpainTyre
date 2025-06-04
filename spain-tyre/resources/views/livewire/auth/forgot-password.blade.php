<?php

use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('components.layouts.auth')] class extends Component {
    public string $email = '';

    /**
     * Send a password reset link to the provided email address.
     */
    public function sendPasswordResetLink(): void
    {
        $this->validate([
            'email' => ['required', 'string', 'email'],
        ]);

        Password::sendResetLink($this->only('email'));

        session()->flash('status', __('Se enviará un enlace de restablecimiento si la cuenta existe.'));
    }
}; ?>

<div class="flex flex-col gap-6">
    <x-auth-header :title="__('¿Olvidaste tu contraseña?')" :description="__('Introduce tu correo electrónico para recibir un enlace de restablecimiento de contraseña.')" />

    <!-- Session Status -->
    <x-auth-session-status class="text-center" :status="session('status')" />

    <form wire:submit="sendPasswordResetLink" class="flex flex-col gap-6">
        <!-- Email Address -->
        <flux:input
            wire:model="email"
            :label="__('Correo Electrónico')"
            type="email"
            required
            autofocus
            placeholder="email@ejemplo.com"
            viewable
        />

        <flux:button variant="primary" type="submit" class="w-full">{{ __('Enviar enlace de restablecimiento') }}</flux:button>
    </form>

    <div class="space-x-1 rtl:space-x-reverse text-center text-sm text-zinc-400">
        {{ __('O bien, volver al…') }}
        <flux:link :href="route('login')" wire:navigate>{{ __('inicio de sesión') }}</flux:link>
    </div>
</div>
