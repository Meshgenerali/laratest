<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\WebAuthn\WebAuthnLoginController;

use App\Http\Controllers\WebAuthn\WebAuthnRegisterController;

use App\Http\Controllers\WebAuthnController;

use Laragear\WebAuthn\Http\Routes as WebAuthnRoutes;

use Laragear\WebAuthn\Contracts\WebAuthnAuthenticatable;

use Laragear\WebAuthn\WebAuthnAuthentication;



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

Route::get('/', [HomeController::class, 'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/redirect', [HomeController::class, 'redirect'])->middleware('auth', 'verified');
Route::get('/redirection', [HomeController::class, 'redirection']);




Route::middleware('auth')->group(function () {
    Route::post('/webauthn/attest/options', [WebAuthnRegisterController::class, 'options']);
    Route::post('/webauthn/attest', [WebAuthnRegisterController::class, 'register']);
    Route::post('/webauthn/login/options', [WebAuthnLoginController::class, 'options']);
    Route::post('/webauthn/login', [WebAuthnLoginController::class, 'login']);
   
});




