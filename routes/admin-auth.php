<?php
use App\Http\Controllers\Admin\Auth\AdminLogController;
use App\Http\Controllers\Admin\Auth\AdminRegController;
use App\Http\Controllers\Admin\Auth\AdminProfileController;

use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;



Route::prefix('admin')->middleware('guest:admin')->group(function () {
    
    Route::get('/register', [AdminRegController::class, 'create'])
        ->name('admin.auth.register');
    Route::post('register', [AdminRegController::class, 'store']);

    //admin registration
    
    Route::get('/login', [AdminLogController::class, 'create'])
        ->name('admin.auth.login');
    Route::post('login', [AdminLogController::class, 'store']);

});

Route::prefix('admin')->middleware('auth:admin')->group(function () {
   

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
    
   
        Route::get('/profile', [AdminProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [AdminProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [AdminProfileController::class, 'destroy'])->name('profile.destroy');
   
    

    Route::post('logout', [AdminLogController::class, 'destroy'])
        ->name('admin.logout');
});
