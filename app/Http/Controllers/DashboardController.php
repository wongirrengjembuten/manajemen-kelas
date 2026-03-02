<?php

namespace App\Http\Controllers;

use App\Models\ClassRoom;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Grade;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'classes' => ClassRoom::count(),
            'students' => Student::count(),
            'subjects' => Subject::count(),
            'grades' => Grade::count(),
        ];

        $recentGrades = Grade::with(['student', 'subject'])
            ->latest()
            ->take(10)
            ->get();

        return view('dashboard', compact('stats', 'recentGrades'));
    }
}
