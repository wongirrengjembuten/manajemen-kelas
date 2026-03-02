@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard Overview</li>
        </ol>
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4 shadow">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                            <div class="small text-white-50">Total Classes</div>
                            <div class="h3 mb-0 fw-bold">{{ $stats['classes'] }}</div>
                        </div>
                        <i class="fas fa-school fa-2x text-white-50"></i>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between small">
                        <a class="text-white stretched-link" href="{{ route('classes.index') }}">View Classes</a>
                        <div class="text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-warning text-white mb-4 shadow">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                            <div class="small text-white-50">Total Students</div>
                            <div class="h3 mb-0 fw-bold">{{ $stats['students'] }}</div>
                        </div>
                        <i class="fas fa-user-graduate fa-2x text-white-50"></i>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between small">
                        <a class="text-white stretched-link" href="{{ route('students.index') }}">View Students</a>
                        <div class="text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4 shadow">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                            <div class="small text-white-50">Total Subjects</div>
                            <div class="h3 mb-0 fw-bold">{{ $stats['subjects'] }}</div>
                        </div>
                        <i class="fas fa-book fa-2x text-white-50"></i>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between small">
                        <a class="text-white stretched-link" href="{{ route('subjects.index') }}">View Subjects</a>
                        <div class="text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-danger text-white mb-4 shadow">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                            <div class="small text-white-50">Total Grades</div>
                            <div class="h3 mb-0 fw-bold">{{ $stats['grades'] }}</div>
                        </div>
                        <i class="fas fa-star fa-2x text-white-50"></i>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between small">
                        <a class="text-white stretched-link" href="{{ route('grades.index') }}">View Grades</a>
                        <div class="text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-white py-3">
                <i class="fas fa-table me-1 text-primary"></i>
                <span class="fw-bold">Recent Grades</span>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Student</th>
                                <th>Subject</th>
                                <th>Type</th>
                                <th>Score</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($recentGrades as $grade)
                                <tr>
                                    <td>{{ $grade->student->name }}</td>
                                    <td>{{ $grade->subject->name }}</td>
                                    <td><span class="badge bg-secondary">{{ $grade->type }}</span></td>
                                    <td>
                                        <span class="fw-bold {{ $grade->score >= 75 ? 'text-success' : 'text-danger' }}">
                                            {{ number_format($grade->score, 2) }}
                                        </span>
                                    </td>
                                    <td class="small">{{ $grade->created_at->format('d M Y H:i') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-4 text-muted">No grades recorded yet.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
