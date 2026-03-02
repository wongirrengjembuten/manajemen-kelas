<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grades = \App\Models\Grade::with(['student.classRoom', 'subject'])->get();
        return view('grades.index', compact('grades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = \App\Models\Student::with('classRoom')->get();
        $subjects = \App\Models\Subject::all();
        return view('grades.create', compact('students', 'subjects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(\Illuminate\Http\Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'subject_id' => 'required|exists:subjects,id',
            'score' => 'required|numeric|min:0|max:100',
            'type' => 'required|string|max:255',
        ]);

        \App\Models\Grade::create($request->all());

        return redirect()->route('grades.index')->with('success', 'Grade recorded successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Grade $grade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(\App\Models\Grade $grade)
    {
        $students = \App\Models\Student::with('classRoom')->get();
        $subjects = \App\Models\Subject::all();
        return view('grades.edit', compact('grade', 'students', 'subjects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(\Illuminate\Http\Request $request, \App\Models\Grade $grade)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'subject_id' => 'required|exists:subjects,id',
            'score' => 'required|numeric|min:0|max:100',
            'type' => 'required|string|max:255',
        ]);

        $grade->update($request->all());

        return redirect()->route('grades.index')->with('success', 'Grade updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(\App\Models\Grade $grade)
    {
        $grade->delete();
        return redirect()->route('grades.index')->with('success', 'Grade deleted successfully.');
    }

    public function recap(\App\Models\ClassRoom $classRoom)
    {
        $subjects = \App\Models\Subject::all();
        $students = \App\Models\Student::where('class_room_id', $classRoom->id)
            ->with(['grades' => function($query) {
                $query->select('student_id', 'subject_id', \Illuminate\Support\Facades\DB::raw('AVG(score) as average_score'))
                    ->groupBy('student_id', 'subject_id');
            }])
            ->get();

        return view('grades.recap', compact('classRoom', 'subjects', 'students'));
    }
}
