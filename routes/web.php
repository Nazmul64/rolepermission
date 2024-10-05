<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Permission\PermissionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/permissions/create', [PermissionController::class, 'create'])->name('permission.create');
    Route::post('/permissions/store', [PermissionController::class, 'store'])->name('permission.store');
    Route::get('/permissions/index', [PermissionController::class, 'index'])->name('permission.index');
    Route::get('/permissions/edit/{id}', [PermissionController::class, 'edit'])->name('permission.edit');
    Route::post('/permissions/update/{id}', [PermissionController::class, 'update'])->name('permission.update');
    Route::get('/permissions/delete/{id}', [PermissionController::class, 'delete'])->name('permission.delete');
});




require __DIR__.'/auth.php';
