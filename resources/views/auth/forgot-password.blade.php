<x-guest-layout>
    <x-slot name="title">Password Reset - SB Admin</x-slot>
    <x-slot name="header">Password Recovery</x-slot>

    <div class="small mb-3 text-muted">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div class="form-floating mb-3">
            <input class="form-control @error('email') is-invalid @enderror" id="email" type="email" name="email"
                value="{{ old('email') }}" placeholder="name@example.com" required autofocus />
            <label for="email">Email address</label>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
            <a class="small" href="{{ route('login') }}">Return to login</a>
            <button type="submit" class="btn btn-primary">
                {{ __('Email Password Reset Link') }}
            </button>
        </div>
    </form>

    <x-slot name="footer">
        <div class="small"><a href="{{ route('register') }}">Need an account? Sign up!</a></div>
    </x-slot>
</x-guest-layout>
