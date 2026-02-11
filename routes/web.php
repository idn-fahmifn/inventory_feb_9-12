<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});




Route::middleware(['auth', 'verified'])->group(function () {

    // route admin
    Route::prefix('admin')->middleware('admin')->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'admin'])->name('dashboard');

        // Room
        Route::get('rooms', [RoomController::class, 'index'])->name('room.index');


        // Item
        Route::get('items', [ItemController::class, 'index'])->name('item.index');

        Route::get('users', [ProfileController::class, 'index'])->name('user.index');
        Route::post('users', [ProfileController::class, 'store'])->name('user.store');
        Route::get('users/{paramm}', [ProfileController::class, 'show'])->name('user.show');
        Route::delete('users/{paramm}', [ProfileController::class, 'destroyUser'])->name('user.delete');

    });


    // Route petugas
    Route::prefix('petugas')->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'petugas'])->name('dashboard.petugas');

    });

});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
