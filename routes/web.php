<?php

use App\Models\ClockController;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return view('auth.login');
})->name('home');

Route::get('/dashboard', function(){
    return view('dashboard');
})->name('logged.dashboard');

Route::get('/today/me', [ClockController::class, "getClock"])->name('pointed');

Route::get('/kpi', function(){
    return view('kpi.index');
})->name('kpi.index');