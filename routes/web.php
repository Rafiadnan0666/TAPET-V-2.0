<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasantriController;
use App\Http\Controllers\SetoranController;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

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

Route::get('/dash', function () {
    return view('master/dash');
})->middleware(['auth', 'verified'])->name('dash');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('/mahasantri', MahasantriController::class);
    Route::resource('/setoran', SetoranController::class);

    Route::get('/mentor', [MentorController::class, 'index'])->name('mentor.index');
    Route::get('/mentor/create', [MentorController::class, 'create'])->name('mentor.create');
    Route::get('/mentor/setoran', [MentorController::class, 'setoran'])->name('mentor.setoran');
});


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('/mahasantri', MahasantriController::class);
    Route::resource('/setoran', SetoranController::class);
});


require __DIR__ . '/auth.php';
