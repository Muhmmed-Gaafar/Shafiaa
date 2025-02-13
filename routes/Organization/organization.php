<?php

use App\Http\Controllers\Global\StageController;
use App\Http\Controllers\Organization\OrganizationController;
use App\Http\Controllers\Organization\TeacherAuthController;
use App\Http\Controllers\Organization\TeacherController;
use App\Http\Controllers\Organization\TermController;
use Illuminate\Support\Facades\Route;

Route::post('teacher/login', [TeacherAuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function (){
    Route::post('teacher/logout', [TeacherAuthController::class, 'logout']);
});

// Organization Routes
Route::prefix('organizations')->group(function () {
    Route::get('/', [OrganizationController::class, 'index'])->name('organizations.index');
    Route::post('/', [OrganizationController::class, 'store'])->name('organizations.store');
    Route::get('/{id}', [OrganizationController::class, 'show'])->name('organizations.show');
    Route::put('/{id}', [OrganizationController::class, 'update'])->name('organizations.update');
    Route::delete('/{id}', [OrganizationController::class, 'destroy'])->name('organizations.destroy');
});

// Teacher Routes
Route::prefix('teachers')->group(function () {
    Route::get('/', [TeacherController::class, 'index'])->name('teachers.index');
    Route::post('/', [TeacherController::class, 'store'])->name('teachers.store');
    Route::get('/{id}', [TeacherController::class, 'show'])->name('teachers.show');
    Route::put('/{id}', [TeacherController::class, 'update'])->name('teachers.update');
    Route::delete('/{id}', [TeacherController::class, 'destroy'])->name('teachers.destroy');
});

// Stage Routes
Route::prefix('stages')->group(function () {
    Route::get('/', [StageController::class, 'index'])->name('stages.index');
    Route::post('/', [StageController::class, 'store'])->name('stages.store');
    Route::get('/{id}', [StageController::class, 'show'])->name('stages.show');
    Route::put('/{id}', [StageController::class, 'update'])->name('stages.update');
    Route::delete('/{id}', [StageController::class, 'destroy'])->name('stages.destroy');
});

// Term Routes
Route::prefix('terms')->group(function () {
    Route::get('/', [TermController::class, 'index'])->name('terms.index');
    Route::post('/', [TermController::class, 'store'])->name('terms.store');
    Route::get('/{id}', [TermController::class, 'show'])->name('terms.show');
    Route::put('/{id}', [TermController::class, 'update'])->name('terms.update');
    Route::delete('/{id}', [TermController::class, 'destroy'])->name('terms.destroy');
});
