<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;


Route::get('/', function () {
    return view('index');
})->name('home');

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
Route::post('/iryna-login', [AuthController::class, 'Formlogin'])->name('auth.iryna-login');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});


Route::middleware(['role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function(){return view('dashboard');})->name('dashboard');
    Route::get('/organization', function(){return view('organization');})->name('organization');
    Route::get('/event', function () {return view('Events');})->name('event');
    Route::resource('users', AdminController::class);
    Route::get('demandes', [AdminController::class, 'showDemandes'])->name('demandes.index'); // liste des demandes
    Route::get('demandes/{demande}', [AdminController::class, 'showDemande'])->name('demandes.show'); // détail d'une demande
    Route::post('demandes/{demande}/accept', [AdminController::class, 'acceptDemande'])->name('demandes.accept');
    Route::post('demandes/{demande}/refuse', [AdminController::class, 'refuseDemande'])->name('demandes.refuse');

    Route::get('/transaction', function () {return view('Transaction');})->name('transaction');
    Route::get('/settings', function () {return view('settings');})->name('settings');


});

require __DIR__.'/auth.php';
