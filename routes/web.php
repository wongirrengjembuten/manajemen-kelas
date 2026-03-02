<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('classes', \App\Http\Controllers\ClassRoomController::class);
    Route::resource('students', \App\Http\Controllers\StudentController::class);
    Route::resource('subjects', \App\Http\Controllers\SubjectController::class);
    Route::resource('grades', \App\Http\Controllers\GradeController::class);
    Route::get('recap/{classRoom}', [\App\Http\Controllers\GradeController::class, 'recap'])->name('grades.recap');
});
Route::fallback(function () {
    return view('errors.404');
});
require __DIR__.'/auth.php';
