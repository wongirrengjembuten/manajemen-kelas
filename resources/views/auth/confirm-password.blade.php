<x-guest-layout>
    <x-slot name="title">Confirm Password - SB Admin</x-slot>
    <x-slot name="header">Confirm Password</x-slot>

    <div class="mb-4 text-sm text-gray-600">
        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Password -->
        <div class="form-floating mb-3">
            <input class="form-control @error('password') is-invalid @enderror" id="password" type="password"
                name="password" placeholder="Password" required autocomplete="current-password" />
            <label for="password">Password</label>
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex justify-content-end mt-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Confirm') }}
            </button>
        </div>
    </form>
</x-guest-layout>
