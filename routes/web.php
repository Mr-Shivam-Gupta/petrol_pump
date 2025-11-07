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
    Route::any('/logout', [SuperAdminLoginController::class, 'logout'])->name('super_admin.logout');
    Route::get('/dashboard', [SuperAdminLoginController::class, 'dashboard'])->name('super_admin.dashboard');
});

Route::prefix('tenant')->group(function () {
    Route::get('/login', [TenantLoginController::class, 'showLoginForm'])->name('tenant.login');
    Route::post('/login', [TenantLoginController::class, 'login'])->name('tenant.login.submit');
    Route::any('/logout', [TenantLoginController::class, 'logout'])->name('tenant.logout');
    Route::get('/dashboard', [TenantLoginController::class, 'dashboard'])->name('tenant.dashboard');
});
