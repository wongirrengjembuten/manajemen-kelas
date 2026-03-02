<x-guest-layout>
    <x-slot name="title">Login - SB Admin</x-slot>
    <x-slot name="header">Login</x-slot>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="form-floating mb-3">
            <input class="form-control @error('email') is-invalid @enderror" id="email" type="email" name="email"
                value="{{ old('email') }}" placeholder="name@example.com" required autofocus autocomplete="username" />
            <label for="email">Email address</label>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Password -->
        <div class="form-floating mb-3">
            <input class="form-control @error('password') is-invalid @enderror" id="password" type="password"
                name="password" placeholder="Password" required autocomplete="current-password" />
            <label for="password">Password</label>
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Remember Me -->
        <div class="form-check mb-3">
            <input class="form-check-input" id="remember_me" type="checkbox" name="remember" />
            <label class="form-check-label" for="remember_me">Remember Password</label>
        </div>

        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
            @if (Route::has('password.request'))
                <a class="small" href="{{ route('password.request') }}">Forgot Password?</a>
            @endif
            <button type="submit" class="btn btn-primary">Login</button>
        </div>
    </form>

    <x-slot name="footer">
        <div class="small"><a href="{{ route('register') }}">Need an account? Sign up!</a></div>
    </x-slot>
</x-guest-layout>
