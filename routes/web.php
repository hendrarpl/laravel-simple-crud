<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NasabahController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [NasabahController::class, 'index'])->name('nasabah.index');
Route::get('/create', [NasabahController::class, 'create'])->name('nasabah.create');
Route::post('/create', [NasabahController::class, 'store'])->name('nasabah.store');
Route::get('/edit/{id}', [NasabahController::class, 'edit'])->name('nasabah.edit');
Route::put('/update/{id}', [NasabahController::class, 'update'])->name('nasabah.update');
Route::post('/hapus/{id}', [NasabahController::class, 'hapus'])->name('nasabah.hapus');
Route::get('/cari', [NasabahController::class, 'cari'])->name('nasabah.cari');
