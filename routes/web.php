<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasantriController;
use App\Http\Controllers\SetoranController;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Models\Mahasantri;
use App\Models\User;
use App\Models\Setoran;

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

    Route::middleware('role:a')->group(function () {
        Route::resource('/mahasantri', MahasantriController::class);
        Route::resource('/setoran', SetoranController::class);
    });


    Route::middleware('role:a,m')->group(function () {
        Route::get('/mentor', [MentorController::class, 'index'])->name('mentor.index');
        Route::get('/mentor/createmhs', [MentorController::class, 'createmhs'])->name('mentor.createmhs');
        Route::post('/mentor/storemhs', [MentorController::class, 'storemhs'])->name('mentor.storemhs');
        Route::get('/mentor/setoran/{id}', [MentorController::class, 'setoran'])->name('mentor.setoran');
    });

    Route::get('/mentor', [MentorController::class, 'index'])->name('mentor.index');
    Route::get('/mentor/createmhs', [MentorController::class, 'createmhs'])->name('mentor.createmhs');
    Route::get('/mentor/createstr/{id}', [MentorController::class, 'createstr'])->name('mentor.createstr');
    Route::post('/mentor/storemhs', [MentorController::class, 'storemhs'])->name('mentor.storemhs');
    Route::post('/mentor/storestr', [MentorController::class, 'storestr'])->name('mentor.storestr');
    Route::get('/mentor/setoran/{id}', [MentorController::class, 'setoran'])->name('mentor.setoran');

});


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        $setoran = Setoran::all();
        $mahasantri = Mahasantri::all();

        $user = User::all()->where("role", "=", "m");
        return view('dashboard', compact('user', 'setoran', 'mahasantri'));

       
    })->name('dashboard');
});

Route::middleware(['auth', 'role:a'])->group(function () {
    Route::resource('/mahasantri', MahasantriController::class);
    Route::resource('/setoran', SetoranController::class);
    Route::resource('/user', UserController::class);
});



require __DIR__ . '/auth.php';
