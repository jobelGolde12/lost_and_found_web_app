<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/my-profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// user 
Route::get('/report-lost-item', [UserController::class, 'reportLostItem'])->name('reportLostItem');
Route::get('/report-found-item', [UserController::class, 'reportFoundItem'])->name('reportFoundItem');
Route::get('/settings', [UserController::class, 'goToSettings'])->middleware(['auth', 'verified'])->name('settings');
Route::get('/view-item/{item}', [ItemController::class, 'viewItem'])->name('viewItem');
Route::delete('delete-item/{id}', [ItemController::class, 'deleteItem'])->name('deleteItem');

// para sa report lost and report found item
Route::post('/add-item', [ItemController::class, 'store'])->name('addItem');
// na doble an view item info kay ini para sa dashboard while an saro na 'view-item' para sa profile 
Route::get('/view-item-info/{item}', [ItemController::class, 'viewItemInfo'])->name('viewItemInfo');
require __DIR__.'/auth.php';
