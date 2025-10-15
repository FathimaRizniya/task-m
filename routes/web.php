<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

// Welcome page
Route::get('/', function () {
    return view('welcome');
});

// Profile routes (for all authenticated users)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function () {

    // Admin dashboard
    Route::get('/admin/dashboard', [AdminController::class, 'index'])
        ->name('admin.dashboard');
        // ->middleware(function ($request, $next) {
            
        //     return $next($request);
        });

        Route::prefix('users')->middleware(['auth'])->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('users');
});

    // Categories (admin only)
    Route::prefix('categories')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
        Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');
        Route::post('/', [CategoryController::class, 'store'])->name('categories.store');
        Route::get('/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
        Route::put('/{id}', [CategoryController::class, 'update'])->name('categories.update');
        Route::delete('/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    });

    // Tasks (admin only)
    Route::prefix('tasks')->group(function () {
        Route::get('/', [TaskController::class, 'index'])->name('admin.tasks.index');
        Route::get('/create', [TaskController::class, 'create'])->name('admin.tasks.create');
        Route::post('/', [TaskController::class, 'store'])->name('admin.tasks.store');
        Route::get('/{id}/edit', [TaskController::class, 'edit'])->name('admintasks.edit');
        Route::put('/{id}', [TaskController::class, 'update'])->name('admin.tasks.update');
        Route::delete('/{id}', [TaskController::class, 'destroy'])->name('admin.tasks.destroy');

    });



// ---------------------- USER ROUTES ----------------------
Route::middleware(['auth'])->group(function () {

    // User dashboard
    Route::get('/user/dashboard', [UserController::class, 'index'])->name('user.dashboard');

    // View categories (read-only)
    Route::get('/user/categories', [CategoryController::class, 'viewForUser'])->name('user.categories');

    // User tasks (own tasks only)
    Route::prefix('user/tasks')->group(function () {
        Route::get('/', [TaskController::class, 'userTasks'])->name('user.tasks');
        Route::get('/{id}/edit', [TaskController::class, 'editOwn'])->name('user.tasks.edit');
        Route::put('/{id}', [TaskController::class, 'updateOwn'])->name('user.tasks.update');
    });

});
