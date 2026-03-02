@extends('layouts.app')

@section('title', '404 Error')

@section('content')
    <div class="container-fluid px-4">
        <div class="text-center mt-4">
            <img class="mb-4 img-error" src="{{ asset('assets/img/error-404-monochrome.svg') }}" style="max-width: 30rem;" />
            <p class="lead">This requested URL was not found on this server.</p>
            <a href="{{ route('dashboard') }}">
                <i class="fas fa-arrow-left me-1"></i>
                Return to Dashboard
            </a>
        </div>
    </div>
@endsection
