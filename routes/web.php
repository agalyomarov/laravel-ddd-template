<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Presentation\Controllers\HomeController::class, 'index'])->name('home');
