<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/createevent', function () {
    return view('createevent');
})->name('createevent');


//  route du Dashboard admin
Route::middleware(['role:admin'])->prefix('admin')->name('admin.')->group(function () {
    // Tableau de bord
    Route::get('/admin-dashboard', function () {
        return view('admin.dashboard');
    })->name('admin-dashboard');

    // Organisations
    Route::get('/organizations', function () {
        return view('admin.organization');
    })->name('organization');

    // Événements
    Route::get('/events', function () {
        return view('admin.events');
    })->name('events');

    // Utilisateurs
    Route::get('/users', function () {
        return view('admin.users');
    })->name('users');

    // Transactions
    Route::get('/transactions', function () {
        return view('admin.transaction');
    })->name('transactions');

    // Paramètres
    Route::get('/settings', function () {
        return view('admin.settings');
    })->name('settings');
});



Route::get('/creator-dashboard', function () {
    return view('organizer_dashboard');
})->name('creator-dashboard');


Route::get('/iryna-register', [AuthController::class, 'Showregister'])->name('iryna-register');
Route::post('/register-customer', [AuthController::class, 'Formregistercustomer'])->name('register-customer');
Route::post('/register-creator', [AuthController::class, 'Formregistercreator'])->name('register-creator');

Route::get('/iryna-login', [AuthController::class, 'Showlogin'])->name('iryna-login');
Route::post('/iryna-login', [AuthController::class, 'Formlogin'])->name('iryna-login');


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
