<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
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
Route::get('/user/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::put('/user/{user}', [UserController::class, 'update'])->name('user.update');

    
Route::prefix('settings')->name('settings.')->group(function () {
    Route::get('/trash', [SettingsController::class, 'trash'])->name('trash');
    Route::get('/notifications', [SettingsController::class, 'notifications'])->name('notifications');
    Route::get('/privacy', [SettingsController::class, 'privacy'])->name('privacy');
});


// para sa report lost and report found item
Route::post('/add-item', [ItemController::class, 'store'])->name('addItem');
// na doble an view item info kay ini para sa dashboard while an saro na 'view-item' para sa profile 
Route::get('/view-item-info/{item}', [ItemController::class, 'viewItemInfo'])->name('viewItemInfo');
Route::get('/visit-user/{id}', [ItemController::class, 'visitUser'])->name('visitUser');

// para sa email verification 
Route::get('/email/verify', function () {
    return Inertia::render('Auth/VerifyEmail');
})->middleware(['auth'])->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/dashboard'); // Change to your desired page after verification
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/resend', function (Illuminate\Http\Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('status', 'verification-link-sent');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

require __DIR__.'/auth.php';
