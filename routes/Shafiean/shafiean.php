<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminHistoryController;
use App\Http\Controllers\Admin\AyatController;
use App\Http\Controllers\Admin\CurriculumController;
use App\Http\Controllers\Admin\DisabilityTypeController;
use App\Http\Controllers\Admin\QuraanController;
use App\Http\Controllers\Organization\OrganizationController;
use Illuminate\Support\Facades\Route;


Route::post('admin/login', [AdminAuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('admin/logout' , [AdminAuthController::class, 'logout']);
    // Admin Routes
    Route::prefix('admins')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('admins.index');
        Route::post('/', [AdminController::class, 'store'])->name('admins.store');
        Route::get('/{id}', [AdminController::class, 'show'])->name('admins.show');
        Route::put('/{id}', [AdminController::class, 'update'])->name('admins.update');
        Route::delete('/{id}', [AdminController::class, 'destroy'])->name('admins.destroy');
    });

    // Admin History Routes
    Route::prefix('admin_histories')->group(function () {
        Route::get('/', [AdminHistoryController::class, 'index'])->name('admin_histories.index');
        Route::post('/', [AdminHistoryController::class, 'store'])->name('admin_histories.store');
        Route::get('/{id}', [AdminHistoryController::class, 'show'])->name('admin_histories.show');
        Route::put('/{id}', [AdminHistoryController::class, 'update'])->name('admin_histories.update');
        Route::delete('/{id}', [AdminHistoryController::class, 'destroy'])->name('admin_histories.destroy');
    });

// Disability_types Routes
    Route::prefix('disability_types')->group(function () {
        Route::get('/', [DisabilityTypeController::class, 'index'])->name('disability_types.index');
        Route::post('/', [DisabilityTypeController::class, 'store'])->name('disability_types.store');
        Route::get('/{id}', [DisabilityTypeController::class, 'show'])->name('disability_types.show');
        Route::put('/{id}', [DisabilityTypeController::class, 'update'])->name('disability_types.update');
        Route::delete('/{id}', [DisabilityTypeController::class, 'destroy'])->name('disability_types.destroy');
    });



// Curriculum Routes
    Route::prefix('curriculums')->group(function () {
        Route::get('/', [CurriculumController::class, 'index'])->name('curriculums.index');
        Route::post('/', [CurriculumController::class, 'store'])->name('curriculums.store');
        Route::get('/{id}', [CurriculumController::class, 'show'])->name('curriculums.show');
        Route::put('/{id}', [CurriculumController::class, 'update'])->name('curriculums.update');
        Route::delete('/{id}', [CurriculumController::class, 'destroy'])->name('curriculums.destroy');
    });

    Route::resource('ayat', AyatController::class);
    Route::resource('quraan', QuraanController::class);
});

