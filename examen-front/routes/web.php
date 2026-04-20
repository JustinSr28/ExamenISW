<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\UserController;

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.store');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/dashboard', function () {
    $user = session('auth_user');

    if (! $user) {
        return redirect()->route('login');
    }

    return match ($user['role_id'] ?? null) {
        1 => redirect()->route('dashboard.admin'),
        2 => redirect()->route('dashboard.teacher'),
        3 => redirect()->route('dashboard.student'),
        default => redirect()->route('login'),
    };
})->name('dashboard');

Route::get('/dashboard/admin', function () {
    $user = session('auth_user');

    if (! $user || ($user['role_id'] ?? null) !== 1) {
        return redirect()->route('login');
    }

    return view('layouts.partials.dashboard-content');
})->name('dashboard.admin');

Route::get('/dashboard/teacher', function () {
    $user = session('auth_user');

    if (! $user || ($user['role_id'] ?? null) !== 2) {
        return redirect()->route('login');
    }

    return view('layouts.partials.dashboard-content-teacher');
})->name('dashboard.teacher');

Route::get('/dashboard/student', function () {
    $user = session('auth_user');

    if (! $user || ($user['role_id'] ?? null) !== 3) {
        return redirect()->route('login');
    }

    return view('layouts.partials.dashboard-content-student');
})->name('dashboard.student');

Route::get('/users/register', function () {
    return view('layouts.users.register');
})->name('users.register');

Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');
Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');
Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('/courses/{course}/edit', [CourseController::class, 'edit'])->name('courses.edit');
Route::put('/courses/{course}', [CourseController::class, 'update'])->name('courses.update');
Route::delete('/courses/{course}', [CourseController::class, 'destroy'])->name('courses.destroy');
Route::patch('/courses/{course}/restore', [CourseController::class, 'restore'])->name('courses.restore');

Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::get('/users/register', [UserController::class, 'create'])->name('users.register');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
Route::patch('/users/{user}/restore', [UserController::class, 'restore'])->name('users.restore');