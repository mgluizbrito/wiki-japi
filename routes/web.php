<?php

use App\Http\Controllers\IdentificationController;
use App\Http\Controllers\ObservationController;
use App\Http\Controllers\PortalController;
use App\Http\Middleware\Authenticate;
use App\Models\User;
use App\Models\CommunityIdentification;
use App\Models\Observation;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('Home', [
        'colaborators' => User::count(),
        'posts' => Observation::count(),
        'species' => CommunityIdentification::count(),
    ]);
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

Route::get('/search', [ObservationController::class, 'search'])->name('search');

Route::middleware([Authenticate::class])->group(function () {

    Route::get('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');
    
    Route::get('/portal', [PortalController::class, 'index'])->name('portal');
    
    Route::get('/observacao/{id}', [ObservationController::class, 'show'])->name('observacao.show');
    Route::post('/observacao', [ObservationController::class, 'store'])->name('observacao.store');
    Route::post('/observacao/editar', [ObservationController::class, 'update'])->name('observacao.update');
    Route::get('/observacao/deletar/{id}', [ObservationController::class, 'destroy'])->name('observacao.destroy');

    Route::post('/identificacao', [IdentificationController::class, 'store'])->name('identificar');

    Route::get('/my-observacoes', [ObservationController::class, 'myObservations'])->name('my.observacoes');
    Route::get('/my-identificacoes', [ObservationController::class, 'myIdentifications'])->name('my.identificacoes');
});
