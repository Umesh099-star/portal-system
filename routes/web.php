<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\auth\AuthenticatedSessionController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\Aplicantcontroller;
use App\Http\Controllers\CompanySettingController;
use App\Http\Controllers\CompanyProfileController;
use App\Http\Controllers\company\Auth\CompanyRegController;
use App\Http\Controllers\Admin\listController;
use App\Models\Company;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// homepage route 


Route::get('/', [HomeController::class, 'index']);


//  Role Based registration
Route::get('/roleregister', function () {
    return view('auth.roleregister');
})->name('roleregister');





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
            
                // for company crud operations
                Route::prefix('company')->middleware(['auth', 'company'])->group(function () {
Route::get('/jobs/create', [JobController::class, 'create'])->name('company.jobs.create');
 Route::post('/jobs/store', [JobController::class, 'store'])->name('company.jobs.store');
Route::get('/jobs/save', [JobController::class, 'save'])->name('company.jobs.save');
Route::get('/jobs/edit/{id}', [JobController::class, 'edit'])->name('company.jobs.edit');
Route::post('/jobs/update/{id}', [JobController::class, 'update'])->name('company.jobs.update');
Route::delete('/jobs/delete/{id}', [JobController::class, 'destroy'])->name('company.jobs.delete');

                });

                    // company account deletion
                  
 Route::prefix('company')->middleware(['auth', 'company'])->group(function () {
    Route::get('/setting', [CompanySettingController::class, 'index'])->name('company.setting');
    Route::post('/setting/create', [CompanySettingController::class, 'create'])->name('company.setting.create');
    Route::put('/setting/update', [CompanySettingController::class, 'update'])->name('company.setting.update');
    Route::delete('/setting/delete', [CompanySettingController::class, 'delete'])->name('company.setting.delete');
 
    // Create company profile (if not exists)
Route::get('/profile', [CompanyProfileController::class, 'create'])->name('company.profile.create');
Route::post('/profile/store', [CompanyProfileController::class, 'store'])->name('company.profile.store');
});








                    // For Admins 
                   

// // Admin Routes


Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});

// Group routes under 'admin' middleware


// admin job listong uses this method to get data in dashboard

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [JobController::class, 'jobSeekerDashboard'])
    ->name('dashboard');
});

Route::middleware(['auth:admin'])->group(function () {
    // Admin job creation route
    Route::get('/admin/jobs/create', [AdminController::class, 'create'])->name('admin.jobs.create');
    // Other admin routes for job deletion, updating, etc.
    Route::post('/admin/jobs/store', [listController::class, 'store'])->name('admin.jobs.store');
    Route::delete('/admin/jobs/{id}/delete', [AdminController::class, 'deleteJob'])->name('admin.jobs.delete');
});


Route::middleware('auth:admin')->group(function() {
    Route::get('/admin/view', [AdminController::class, 'viewUsers'])->name('admin.view');
    Route::delete('/admin/delete-user/{id}', [AdminController::class, 'deleteUser'])->name('admin.deleteUser');
    Route::delete('/admin/delete-company/{id}', [AdminController::class, 'deleteCompany'])->name('admin.deleteCompany');
    
});

// Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
//     Route::get('/jobs/create', [AdminController::class, 'create'])->name('admin.jobs.create');
//     Route::post('/admin/jobs/store', [listController::class, 'store'])->name('admin.jobs.store');
// });

// Route::prefix('admin')->group(function () {
//     Route::get('/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
//     Route::post('/login', [AdminController::class, 'login']);
//     Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');
//     Route::get('/dashboard', function () {
//         return view('admin.dashboard');
//     })->middleware('auth:admin');
// });

// Route::get('/apply/{id}', [aplicantcontroller::class, 'showApplyForm'])
// ->name('job.apply');

// Route::post('/apply/{id}', [aplicantcontroller::class, 'submitApplication'])
// ->name('job.submit');

// Route::get('/company/job/{id}/applicants', [CompanyController::class, 'viewApplicants'])
// ->name('company.viewApplicants');



Route::get('/dashboard', [JobController::class, 'jobList'])
->name('dashboard');


// user profile crud operations


Route::middleware(['auth'])->group(function () {
    Route::get('/job-seeker/profile', [ProfileController::class, 'create'])
    ->name('job-seeker.profile');

    Route::post('/job-seeker/profile', [ProfileController::class, 'store'])
    ->name('job-seeker.profile.store');
    Route::get('/job-seeker/profile/view', [ProfileController::class, 'show'])
    ->name('job-seeker.profile.view');
    Route::get('/job-seeker/profile/edit', [ProfileController::class, 'edit'])
    ->name('job-seeker.profile.edit');
    Route::post('/job-seeker/profile/update', [ProfileController::class, 'update'])
    ->name('job-seeker.profile.update');
    Route::post('/job-seeker/profile/delete', [ProfileController::class, 'destroy'])
    ->name('job-seeker.profile.delete');
});



// apply for the job and view
Route::middleware(['auth'])->group(function () {
    Route::post('/apply/{jobId}', [Aplicantcontroller::class, 'apply'])
    ->name('apply.job');
    Route::get('job-seeker/appliedjob', [Aplicantcontroller::class, 'userApplications'])
    ->name('job-seeker.appliedjob');
    Route::get('/company/applicant', [Aplicantcontroller::class, 'companyApplications'])
    ->name('company.applicant');
});


Route::get('/company/about/{companyId}', [CompanyController::class, 'about'])->name('company.about');

