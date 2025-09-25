<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PaymentController;


Route::get('/', function () {
    return view('index');
})->name('home');


Route::get('/eventshop', function () {
    return view('event');
})->name('eventshop');

Route::get('/test', function () {
    return view('view_test');
})->name('test');

Route::get('/createevent', function () {
    return view('createevent');
})->name('createevent');

Route::get('/admin-dashboard', function () {
    return view('dashboard');
})->name('admin-dashboard');

Route::get('/creator-dashboard', function () {
    return view('organizer_dashboard');
})->name('creator-dashboard');


Route::get('/iryna-register', [AuthController::class, 'Showregister'])->name('iryna-register');
Route::post('/register-customer', [AuthController::class, 'Formregistercustomer'])->name('register-customer');
Route::post('/register-creator', [AuthController::class, 'Formregistercreator'])->name('register-creator');

Route::get('/iryna-login', [AuthController::class, 'Showlogin'])->name('iryna-login');
Route::post('/iryna-login', [AuthController::class, 'Formlogin'])->name('iryna-login');

Route::post('/checkout', [PaymentController::class, 'checkout'])->name('checkout');
Route::post('/notchpay/callback', [CheckoutController::class, 'callback'])->name('payment.callback');


Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

require __DIR__.'/auth.php';
