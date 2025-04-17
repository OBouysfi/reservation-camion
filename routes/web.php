<?php


use App\Http\Controllers\ReservationController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
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

Route::middleware(['auth'])->group(function () {
    Route::resource('reservations', ReservationController::class);
});

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::resource('/reservations', ReservationController::class);
    Route::get('/reservations/export-excel', [AdminController::class, 'exportExcel'])->name('reservations.excel');
    Route::get('/reservations/export-pdf', [AdminController::class, 'exportPdf'])->name('reservations.pdf');
    Route::get('/settings', [AdminController::class, 'settings'])->name('settings');
});



Route::middleware('auth')->group(function () {
    Route::get('admin/settings', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/reservations/export/pdf', [App\Http\Controllers\ReservationController::class, 'exportPdf'])->name('reservations.export.pdf');

Route::post('/reservations', [App\Http\Controllers\ReservationController::class, 'resnolog'])->name('reservations.reslog');

Route::get('/reservations/export/excel', [App\Http\Controllers\ReservationController::class, 'exportExcel'])->name('reservations.export.excel');

Route::post('/export-selected-pdf', [App\Http\Controllers\ReservationController::class, 'exportSelectedPdf'])
    ->name('reservations.export.selected.pdf');

require __DIR__ . '/auth.php';
