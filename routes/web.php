<?php

use App\Http\Controllers\ObservationController;
use App\Http\Controllers\PortalController;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('Home');
})->name('home');

Route::get('/explorar', function (){
    return view('explorar');
})->name('explore');

Route::get('/sobre', function (){
    return view('sobre');
})->name('about');

Route::get('/auth', [AuthController::class, 'loginAuth'])->name('auth');
Route::get('/auth/entrar', [AuthController::class, 'index'])->name('auth.entrar');
Route::post('/auth/signup', [AuthController::class, 'store'])->name('auth.store');


Route::middleware([Authenticate::class])->group(function () {

    Route::get('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');
    
    Route::get('/portal', [PortalController::class, 'index'])->name('portal');
    Route::post('/observacao', [ObservationController::class, 'store'])->name('observacao.store');
    
    Route::get('/obs/{id}', [ObservationController::class, 'show'])->name('observacao.show');
});
