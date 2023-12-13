<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/laporan', [TransactionController::class, 'index'])->middleware(['auth', 'verified'])->name('laporan');
Route::get('/dashboard', [TransactionController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');
Route::post('/laporan', [TransactionController::class, 'store'])->middleware(['auth', 'verified']);
Route::get('/users', [TransactionController::class, 'users'])->middleware(['auth', 'verified'])->name('users');
Route::post('/users', [TransactionController::class, 'create_user'])->middleware(['auth', 'verified'])->name('users');
Route::get('/laporan/export/', [TransactionController::class, 'export']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__ . '/auth.php';
