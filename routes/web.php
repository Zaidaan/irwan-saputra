<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\WorkController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\SkillController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/works', [HomeController::class, 'allWorks'])->name('works.all'); 

Route::middleware('auth')->group(function () {
    Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {

    // Admin Dashboard Route
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // Work Management Routes
    Route::resource('works', WorkController::class);
    Route::resource('blogs', BlogController::class);
    Route::resource('messages', ContactMessageController::class)->only(['index', 'show', 'destroy']);
    Route::resource('skills', SkillController::class); 

    // Profile route (Breeze sometimes adds this to authenticated group)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});
});

require __DIR__.'/auth.php';
