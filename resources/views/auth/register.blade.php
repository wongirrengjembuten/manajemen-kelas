<x-guest-layout>
    <x-slot name="title">Register - SB Admin</x-slot>
    <x-slot name="columnClass">col-lg-7</x-slot>
    <x-slot name="header">Create Account</x-slot>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div class="form-floating mb-3">
            <input class="form-control @error('name') is-invalid @enderror" id="name" type="text" name="name"
                value="{{ old('name') }}" placeholder="Enter your name" required autofocus autocomplete="name" />
            <label for="name">Full name</label>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Email Address -->
        <div class="form-floating mb-3">
            <input class="form-control @error('email') is-invalid @enderror" id="email" type="email"
                name="email" value="{{ old('email') }}" placeholder="name@example.com" required
                autocomplete="username" />
            <label for="email">Email address</label>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Password -->
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-floating mb-3 mb-md-0">
                    <input class="form-control @error('password') is-invalid @enderror" id="password" type="password"
                        name="password" placeholder="Create a password" required autocomplete="new-password" />
                    <label for="password">Password</label>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating mb-3 mb-md-0">
                    <input class="form-control @error('password_confirmation') is-invalid @enderror"
                        id="password_confirmation" type="password" name="password_confirmation"
                        placeholder="Confirm password" required autocomplete="new-password" />
                    <label for="password_confirmation">Confirm Password</label>
                    @error('password_confirmation')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="mt-4 mb-0">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-block">Create Account</button>
            </div>
        </div>
    </form>

    <x-slot name="footer">
        <div class="small"><a href="{{ route('login') }}">Have an account? Go to login</a></div>
    </x-slot>
</x-guest-layout>
