<?php

use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Passwords\Confirm;
use App\Http\Livewire\Auth\Passwords\Email;
use App\Http\Livewire\Auth\Passwords\Reset;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Auth\Verify;
use App\Http\Livewire\BookEdit;
use App\Http\Livewire\BookManagement;
use App\Http\Livewire\BorrowRequestManagement;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Home;
use App\Http\Livewire\MyBooks;
use App\Http\Livewire\Profile;
use App\Http\Livewire\UserEdit;
use App\Http\Livewire\UserManagement;

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

Route::redirect('/', '/login');

Route::middleware('guest')->group(function () {
    Route::get('login', Login::class)
        ->name('login');

    Route::get('register', Register::class)
        ->name('register');
});

Route::get('password/reset', Email::class)
    ->name('password.request');

Route::get('password/reset/{token}', Reset::class)
    ->name('password.reset');

Route::middleware('auth')->group(function () {
    Route::get('email/verify', Verify::class)
        ->middleware('throttle:6,1')
        ->name('verification.notice');

    Route::get('password/confirm', Confirm::class)
        ->name('password.confirm');

    Route::get('profile', Profile::class)
        ->name('profile');

    Route::get('management-studenti', UserManagement::class)
        ->name('management-studenti');

    Route::get('editare-utilizator/{user}', UserEdit::class)
        ->name('editare-utilizator');

    Route::get('management-carti', BookManagement::class)
        ->name('management-carti');

    Route::get('carte/{book}', BookEdit::class)
        ->name('carte');

    Route::get('home', Home::class)
        ->name('home');

    Route::get('imprumuturi', BorrowRequestManagement::class)
    ->name('imprumuturi');

    Route::get('cartile-mele', MyBooks::class)
    ->name('cartile-mele');
});

Route::middleware('auth')->group(function () {
    Route::get('email/verify/{id}/{hash}', EmailVerificationController::class)
        ->middleware('signed')
        ->name('verification.verify');

    Route::post('logout', LogoutController::class)
        ->name('logout');
});
