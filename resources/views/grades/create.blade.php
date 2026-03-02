@extends('layouts.app')

@section('title', 'Input Grade')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Input Grade</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('grades.index') }}">Grades</a></li>
            <li class="breadcrumb-item active">Input Grade</li>
        </ol>

        <div class="row">
            <div class="col-lg-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-star me-1"></i>
                        Grade Information
                    </div>
                    <div class="card-body">
                        <form action="{{ route('grades.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="student_id" class="form-label">Student</label>
                                <select class="form-select @error('student_id') is-invalid @enderror" id="student_id"
                                    name="student_id" required autofocus>
                                    <option value="">Select Student</option>
                                    @foreach ($students as $student)
                                        <option value="{{ $student->id }}"
                                            {{ old('student_id') == $student->id ? 'selected' : '' }}>
                                            {{ $student->name }} ({{ $student->classRoom->name }})
                                        </option>
                                    @endforeach
                                </select>
                                @error('student_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="subject_id" class="form-label">Subject</label>
                                <select class="form-select @error('subject_id') is-invalid @enderror" id="subject_id"
                                    name="subject_id" required>
                                    <option value="">Select Subject</option>
                                    @foreach ($subjects as $subject)
                                        <option value="{{ $subject->id }}"
                                            {{ old('subject_id') == $subject->id ? 'selected' : '' }}>
                                            {{ $subject->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('subject_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="type" class="form-label">Assessment Type</label>
                                <select class="form-select @error('type') is-invalid @enderror" id="type"
                                    name="type" required>
                                    <option value="">Select Type</option>
                                    <option value="Assignment" {{ old('type') == 'Assignment' ? 'selected' : '' }}>
                                        Assignment</option>
                                    <option value="Quiz" {{ old('type') == 'Quiz' ? 'selected' : '' }}>Quiz</option>
                                    <option value="Exam" {{ old('type') == 'Exam' ? 'selected' : '' }}>Exam</option>
                                </select>
                                @error('type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="score" class="form-label">Score</label>
                                <input type="number" step="0.01" min="0" max="100"
                                    class="form-control @error('score') is-invalid @enderror" id="score" name="score"
                                    value="{{ old('score') }}" required>
                                @error('score')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-4">
                                <a href="{{ route('grades.index') }}" class="btn btn-secondary">Cancel</a>
                                <button type="submit" class="btn btn-primary">Save Grade</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
