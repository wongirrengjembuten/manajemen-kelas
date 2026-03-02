@extends('layouts.app')

@section('title', 'Classes')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Classes</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Classes</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>
                    <i class="fas fa-school me-1"></i>
                    Class List
                </div>
                <a href="{{ route('classes.create') }}" class="btn btn-primary btn-sm">Add Class</a>
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Total Students</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($classes as $class)
                            <tr>
                                <td>{{ $class->name }}</td>
                                <td>{{ $class->students_count }}</td>
                                <td>
                                    <a href="{{ route('grades.recap', $class) }}"
                                        class="btn btn-info btn-sm text-white">Recap</a>
                                    <a href="{{ route('classes.edit', $class) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('classes.destroy', $class) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
