@extends('layouts.app')

@section('title', '500 Error')

@section('content')
    <div class="container-fluid px-4">
        <div class="text-center mt-4">
            <h1 class="display-1">500</h1>
            <p class="lead">Internal Server Error</p>
            <a href="{{ route('dashboard') }}">
                <i class="fas fa-arrow-left me-1"></i>
                Return to Dashboard
            </a>
        </div>
    </div>
@endsection
