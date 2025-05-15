<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Home');
})->name('home');

Route::get('/explorar', function (){
    return view('explorar');
})->name('explore');

Route::get('/sobre', function (){
    return view('sobre');
})->name('about');

Route::get('/auth/entrar', function (){
    return view('Entrar');
})->name('auth');