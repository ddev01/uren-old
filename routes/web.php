<?php

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

Route::get('/', App\Livewire\Pages\Home\Index::class)->name('home');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => ['auth']], function () {
    Route::get('/estimate', App\Livewire\Pages\Estimate\Index::class)->name('estimate.index');
    Route::get('/estimate/{estimate}', App\Livewire\Pages\Estimate\Edit::class)->name('estimate.edit');
});
