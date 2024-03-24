<?php

use App\Http\Controllers\EstimatePdfController;
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

Route::redirect('/', '/estimate');
Route::redirect('/home', '/estimate');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => ['auth']], function () {
    Route::get('/estimate', App\Livewire\Pages\Estimate\Index::class)->name('estimate.index');
    Route::get('/user/profile', App\Livewire\Pages\User\Profile\Index::class)->name('profile');
    Route::get('/user/settings', App\Livewire\Pages\User\Settings\Index::class)->name('settings');
    Route::get('/user/settings/general', App\Livewire\Pages\User\Settings\General\IndexGeneral::class)->name('settings.general');
    Route::get('/user/settings/estimate', App\Livewire\Pages\User\Settings\Estimate\IndexEstimate::class)->name('settings.estimate');
    Route::get('/user/contact', App\Livewire\Pages\User\Contact\IndexContact::class)->name('contact');
    Route::get('/user/dashboard', App\Livewire\Pages\User\Dashboard\IndexDashboard::class)->name('dashboard');

    // Route::get('/estimate/{estimate}', App\Livewire\Pages\Estimate\Edit::class)->name('estimate.edit');
});
Route::group(['middleware' => ['EstimatePermissions']], function () {
    // Route::get('/estimate', App\Livewire\Pages\Estimate\Index::class)->name('estimate.index');
    Route::get('/estimate/{estimate}', App\Livewire\Pages\Estimate\Edit::class)->name('estimate.edit');
});

Route::get('/pdf/{estimate}', [EstimatePdfController::class, 'streamPdf'])->name('estimate.pdf');
