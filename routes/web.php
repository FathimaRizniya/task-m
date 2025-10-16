<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\AdminUserController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


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

    // Categories for admin routes
    Route::prefix('categories')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
        Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');
        Route::post('/', [CategoryController::class, 'store'])->name('categories.store');
        Route::get('/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
        Route::put('/{id}', [CategoryController::class, 'update'])->name('categories.update');
        Route::delete('/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    });

    
    //   Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::prefix('users')->group(function () {
        Route::get('/', [AdminUserController::class, 'index'])->name('admin.users.index');
        Route::get('/create', [AdminUserController::class, 'create'])->name('admin.users.create');
        Route::post('/', [AdminUserController::class, 'store'])->name('admin.users.store');
        Route::get('/{id}/edit', [AdminUserController::class, 'edit'])->name('admin.users.edit');
        Route::put('/{id}', [AdminUserController::class, 'update'])->name('admin.users.update');
        Route::delete('/{id}', [AdminUserController::class, 'destroy'])->name('admin.users.destroy');
    });
      





    // Tasks admin routes
    Route::prefix('tasks')->group(function () {
        Route::get('/', [TaskController::class, 'index'])->name('admin.tasks.index');
        Route::get('/create', [TaskController::class, 'create'])->name('admin.tasks.create');
        Route::post('/', [TaskController::class, 'store'])->name('admin.tasks.store');
        Route::get('/{id}/edit', [TaskController::class, 'edit'])->name('admin.tasks.edit');
        Route::put('/{id}', [TaskController::class, 'update'])->name('admin.tasks.update');
        Route::delete('/{id}', [TaskController::class, 'destroy'])->name('admin.tasks.destroy');

    });

    

Route::middleware(['auth'])->group(function () {

    // User dashboard
    Route::get('/user/dashboard', [UserController::class, 'index'])->name('user.dashboard');

    // View categories user
    Route::get('/user/categories', [CategoryController::class, 'viewForUser'])->name('user.categories');

    // For user tasks
Route::middleware(['auth'])->group(function () {
    Route::get('/user/tasks', [TaskController::class, 'userTasks'])->name('user.tasks');
    Route::get('/user/tasks/create', [TaskController::class, 'createOwn'])->name('user.tasks.create');
    Route::post('/user/tasks', [TaskController::class, 'storeOwn'])->name('user.tasks.store');
    Route::get('/user/tasks/{id}/edit', [TaskController::class, 'editOwn'])->name('user.tasks.edit');
    Route::put('/user/tasks/{id}', [TaskController::class, 'updateOwn'])->name('user.tasks.update');
});



});
