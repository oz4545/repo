<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::middleware('web')->group(function () {

    Route::middleware('guest')->group(function () {
        Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
        Route::post('/register', [AuthController::class, 'register'])->name('register');
        Route::get('/', [AuthController::class, 'showLoginForm'])->name('login.form');
        Route::post('/', [AuthController::class, 'login'])->name('login');
    });

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware('auth')->name('dashboard');

    
    // Rutas para los menus con autenticación
    Route::middleware(['auth'])->group(function () {
        Route::get('/menu/create', [MenuController::class, 'create'])->name('menu.create');
        Route::post('/menu', [MenuController::class, 'store'])->name('menu.store');
        Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
        Route::get('/menu/{menu}', [MenuController::class, 'show'])->name('menu.show');
        Route::get('/menu/{menu}/edit', [MenuController::class, 'edit'])->name('menu.edit');
        Route::put('/menu/{menu}', [MenuController::class, 'update'])->name('menu.update');
        Route::delete('/menu/{menu}', [MenuController::class, 'destroy'])->name('menu.destroy');
    });

    // Rutas para los menus con autenticación
    Route::middleware(['auth'])->group(function () {
        Route::get('/categories/create', [CategoryController::class, 'create'])->name('menu.create');
        Route::post('/categories', [CategoryController::class, 'store'])->name('menu.store');
        Route::get('/categories', [CategoryController::class, 'index'])->name('menu.index');
        Route::get('/categories/{categories}', [CategoryController::class, 'show'])->name('menu.show');
        Route::get('/categories/{categories}/edit', [CategoryController::class, 'edit'])->name('menu.edit');
        Route::put('/categories/{categories}', [CategoryController::class, 'update'])->name('menu.update');
        Route::delete('/categories/{categories}', [CategoryController::class, 'destroy'])->name('menu.destroy');
    });


});
