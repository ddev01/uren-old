<?php

use App\Http\Controllers\Auth\ConfirmPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\VerificationController;
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
Route::redirect('home', '/estimate');

Auth::routes(['verify' => true]);

Route::middleware(['guest'])->group(function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
    Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [RegisterController::class, 'register']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('estimate', App\Livewire\Pages\Estimate\Index::class)->name('estimate.index');
    Route::get('user/profile', App\Livewire\Pages\User\Profile\Index::class)->name('profile');
    Route::get('user/settings', App\Livewire\Pages\User\Settings\Index::class)->name('settings');
    Route::get('user/settings/general', App\Livewire\Pages\User\Settings\General\IndexGeneral::class)->name('settings.general');
    Route::get('user/settings/estimate', App\Livewire\Pages\User\Settings\Estimate\IndexEstimate::class)->name('settings.estimate');
    Route::get('user/contact', App\Livewire\Pages\User\Contact\IndexContact::class)->name('contact');
    Route::get('user/dashboard', App\Livewire\Pages\User\Dashboard\IndexDashboard::class)->name('dashboard');

    Route::get('email/verify', [VerificationController::class, 'show'])->name('verification.notice');
    Route::get('email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify')->middleware(['signed']);
    Route::post('email/resend', [VerificationController::class, 'resend'])->name('verification.resend')->middleware(['throttle:6,1']);

    Route::get('password/confirm', [ConfirmPasswordController::class, 'showConfirmForm'])->name('password.confirm');
    Route::post('password/confirm', [ConfirmPasswordController::class, 'confirm']);

    Route::get('email/verify', [VerificationController::class, 'show'])
        ->name('verification.notice');
    Route::get('email/verify/{id}/{hash}', [VerificationController::class, 'verify'])
        ->name('verification.verify')
        ->middleware('signed');
    Route::post('email/resend', [VerificationController::class, 'resend'])
        ->name('verification.resend')
        ->middleware('throttle:6,1');
});
Route::group(['middleware' => ['EstimatePermissions']], function () {
    Route::get('estimate/{estimate}', App\Livewire\Pages\Estimate\Edit::class)->name('estimate.edit');
});

Route::get('pdf/{estimate}', [EstimatePdfController::class, 'streamPdf'])->name('estimate.pdf');
