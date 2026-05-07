<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MedicineController;
use App\Models\Medicine;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard', [
        'medicineCount' => Medicine::count(),
        'totalStock' => Medicine::sum('stock'),
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/switch-user', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/login');
    })->name('switch.user');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('medicines', MedicineController::class);
});

Route::get('/force-logout', function () {
    Auth::logout();
    return redirect('/login');
});

require __DIR__.'/auth.php';
