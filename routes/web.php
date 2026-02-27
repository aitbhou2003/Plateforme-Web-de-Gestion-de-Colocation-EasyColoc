<?php

use App\Http\Controllers\CategorieController;
use App\Http\Controllers\CollocationController;
use App\Http\Controllers\ProfileController;
use App\Models\Collocation;
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
});

require __DIR__ . '/auth.php';

Route::resource('collocation', CollocationController::class);

Route::get('/categories', [CategorieController::class, 'index'])
    ->name('categories.index');
Route::get('/categories/create', [CategorieController::class, 'create'])
    ->name('categories.create');

Route::post('categories', [CategorieController::class, 'store'])
->name('categories.store');
Route::delete('categories/{categorie}',[CategorieController::class,'destroy'])
->name('categories.destroy');
