<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\auth\AuthenticatedSessionController;


use App\Http\Controllers\company\Auth\CompanyRegController;
use App\Models\Company;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/home',[HomeController::class.'index'])
// // ->middleware('auth','web')
//     ->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
//     ->middleware('auth')
//     ->name('logout');

require __DIR__.'/auth.php';

require __DIR__.'/admin-auth.php';


 

            // for company
            Route::prefix('company')->group(function () {
                Route::get('/register', [CompanyRegController::class, 'showRegisterForm'])->name('company.auth.register');
                Route::post('/register', [CompanyRegController::class, 'store']);
                         
            });
            
            // company Dashboard Route
            Route::prefix('company')->middleware(['auth', 'company'])->group(function () {
                Route::get('/dashboard', [CompanyController::class, 'index'])
                    ->name('company.dashboard'); // Ensure this name matches the redirection
            });
            
                    // For Admins 
                   

// // Admin Routes
// Route::prefix('admin')->group(function () {
//     Route::get('/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
//     Route::post('/login', [AdminController::class, 'login']);
//     Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');
//     Route::get('/dashboard', function () {
//         return view('admin.dashboard');
//     })->middleware('auth:admin');
// });
