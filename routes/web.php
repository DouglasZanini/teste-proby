<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('/auth/login');
});

Route::get('/login', function (){
    return view('/auth/login');
});

Route::get('/register', function (){
    return view('/auth/register');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function(){
    Route::resource('projects', ProjectController::class);
});

require __DIR__.'/auth.php';
