@extends('layouts.app')

@section('title', 'Class Recap - ' . $classRoom->name)

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Grade Recap: {{ $classRoom->name }}</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('classes.index') }}">Classes</a></li>
            <li class="breadcrumb-item active">Recap</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Student Performance Summary
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Student Name</th>
                                @foreach ($subjects as $subject)
                                    <th>{{ $subject->name }}</th>
                                @endforeach
                                <th class="bg-primary text-white">Average</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                                <tr>
                                    <td>{{ $student->name }}</td>
                                    @php
                                        $totalScore = 0;
                                        $subjectCount = 0;
                                    @endphp
                                    @foreach ($subjects as $subject)
                                        @php
                                            $grade = $student->grades->where('subject_id', $subject->id)->first();
                                            $score = $grade ? $grade->average_score : null;
                                            if ($score !== null) {
                                                $totalScore += $score;
                                                $subjectCount++;
                                            }
                                        @endphp
                                        <td>{{ $score !== null ? number_format($score, 2) : '-' }}</td>
                                    @endforeach
                                    <td class="fw-bold">
                                        {{ $subjectCount > 0 ? number_format($totalScore / $subjectCount, 2) : '-' }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
