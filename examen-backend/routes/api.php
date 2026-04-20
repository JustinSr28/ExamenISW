<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\AuthController;


Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

// Route::patch('users/{id}/restore', [UserController::class, 'restore']);

Route::get('/teachers', [UserController::class, 'teachers']);
Route::patch('users/{user}/restore', [UserController::class, 'restore'])
    ->withTrashed()
    ->middleware(['auth:sanctum', 'can:restore,user']);



Route::get('courses/inactive', [CourseController::class, 'inactive'])
    ->middleware(['auth:sanctum', 'can:viewInactive,App\Models\Course']);

Route::patch('courses/{course}/restore', [CourseController::class, 'restore'])
    ->withTrashed()
    ->middleware(['auth:sanctum', 'can:restore,course']);

/* Route::apiResource('users', UserController::class)
    ->missing(function (Request $request) {
        return response()->json([
            'message' => 'Usuario no encontrado.',
        ], 404);
    }); */

Route::middleware('auth:sanctum')->group(function () {

    Route::get('/users/inactive', [UserController::class, 'inactive']);

    Route::apiResource('users', UserController::class)
        ->middlewareFor('index', 'can:viewAny,App\Models\User')
        ->middlewareFor('show', 'can:view,user')
        ->middlewareFor('store', 'can:create,App\Models\User')
        ->middlewareFor('update', 'can:update,user')
        ->middlewareFor('destroy', 'can:delete,user')
        ->missing(function (Request $request) {
            return response()->json([
                'message' => 'Usuario no encontrado.',
            ], 404);
        });

});


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/roles', [RoleController::class, 'index']);
});


Route::apiResource('courses', CourseController::class)
    ->middleware('auth:sanctum')
    ->middlewareFor('index', 'can:viewAny,App\Models\Course')
    ->middlewareFor('show', 'can:view,course')
    ->middlewareFor('store', 'can:create,App\Models\Course')
    ->middlewareFor('update', 'can:update,course')
    ->middlewareFor('destroy', 'can:delete,course')
    ->missing(function (Request $request) {
        return response()->json([
            'message' => 'Curso no encontrado.',
        ], 404);
    });

Route::apiResource('enrollments', EnrollmentController::class)
    ->missing(function (Request $request) {
        return response()->json([
            'message' => 'Matrícula no encontrada.',
        ], 404);
    });



