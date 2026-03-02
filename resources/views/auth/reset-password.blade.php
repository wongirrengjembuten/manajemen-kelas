<x-guest-layout>
    <x-slot name="title">Reset Password - SB Admin</x-slot>
    <x-slot name="header">Reset Password</x-slot>

    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div class="form-floating mb-3">
            <input class="form-control @error('email') is-invalid @enderror" id="email" type="email" name="email"
                value="{{ old('email', $request->email) }}" placeholder="name@example.com" required autofocus
                autocomplete="username" />
            <label for="email">Email address</label>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Password -->
        <div class="form-floating mb-3">
            <input class="form-control @error('password') is-invalid @enderror" id="password" type="password"
                name="password" placeholder="Password" required autocomplete="new-password" />
            <label for="password">Password</label>
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div class="form-floating mb-3">
            <input class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation"
                type="password" name="password_confirmation" placeholder="Confirm Password" required
                autocomplete="new-password" />
            <label for="password_confirmation">Confirm Password</label>
            @error('password_confirmation')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mt-4 mb-0">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-block">
                    {{ __('Reset Password') }}
                </button>
            </div>
        </div>
    </form>
</x-guest-layout>
