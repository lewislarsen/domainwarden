<?php

use App\Http\Controllers\DomainController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'marketing');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::resource('domains', DomainController::class)
    ->middleware(['auth'])
    ->except(['view']);

require __DIR__ . '/auth.php';
require __DIR__ . '/billing.php'; // Billing routes
