@extends('layouts.app')

@section('title', '401 Error')

@section('content')
    <div class="container-fluid px-4">
        <div class="text-center mt-4">
            <h1 class="display-1">401</h1>
            <p class="lead">Unauthorized</p>
            <p>Access to this resource is denied.</p>
            <a href="{{ route('dashboard') }}">
                <i class="fas fa-arrow-left me-1"></i>
                Return to Dashboard
            </a>
        </div>
    </div>
@endsection
