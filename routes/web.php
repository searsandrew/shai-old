<?php

use App\Http\Controllers\DoneeController;
use App\Http\Livewire\CreateDonee;
use App\Http\Livewire\EditDonee;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//Route::resource('donee', DoneeController::class);

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/donee', [DoneeController::class, 'index'])->name('donee.index');
    Route::get('/donee/create', CreateDonee::class)->name('donee.create');
    Route::get('/donee/{donee}/edit', EditDonee::class)->name('donee.edit');
});