<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\SuperAdminLoginController;
use App\Http\Controllers\Auth\TenantLoginController;

Route::get('/', function () {
    return view('welcome');
});




Route::prefix('super-admin')->group(function () {
    Route::get('/login', [SuperAdminLoginController::class, 'showLoginForm'])->name('super_admin.login');
    Route::post('/login', [SuperAdminLoginController::class, 'login'])->name('super_admin.login.submit');
    Route::post('/logout', [SuperAdminLoginController::class, 'logout'])->name('super_admin.logout');
});

Route::prefix('tenant')->group(function () {
    Route::get('/login', [TenantLoginController::class, 'showLoginForm'])->name('tenant.login');
    Route::post('/login', [TenantLoginController::class, 'login']);
    Route::post('/logout', [TenantLoginController::class, 'logout'])->name('tenant.logout');
});
