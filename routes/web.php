<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CVController;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GroupdashController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// HOME
Route::get('/', [LandingController::class, 'index']);
Route::get('/programs', [LandingController::class, 'programs']);
Route::get('/about-us', [LandingController::class, 'about']);


// AUTHENTICATION
Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticating'])->middleware('guest');

Route::get('/register', [AuthController::class, 'register'])->middleware('guest');
Route::post('/register', [AuthController::class, 'store'])->middleware('guest');

Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');


// PROSES PENGIRIMAN EMAIL VERIFIKASI
    //jika user mulai register akan diarahkan ke /email/verify
    Route::get('/email/verify', function () {
        return view('auth.verify-email');
    })->middleware('auth')->name('verification.notice');

    //jika user sudah memverifikasi akun di email maka db email verified at akan terisi dan diarahkan ke route tujuan
    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();
        return redirect('/'); //udah terverifikasi tapi akun belum aktif
    })->middleware(['auth','signed'])->name('verification.verify');

    // Route::get('/notActivated', function(){
    //     return "Your Account has not activated yet, please contact admin";
    // })->middleware(['auth', 'verified']);


// DASHBOARD AUTH
Route::middleware(['auth', 'verified'])->group(function () {
    
    Route::middleware('OnlyAdmin')->group(function () {
    //STUDENT FULL
        Route::get('/dashboard/students/list', [DashboardController::class, 'index']);
        Route::get('/dashboard/students/filter', [DashboardController::class, 'filterIndex']);

        Route::get('dashboard/students/create', [DashboardController::class, 'getCreate']);
        Route::post('dashboard/students/create', [DashboardController::class, 'createStudent']);


        Route::get('/dashboard/modify', [DashboardController::class, 'modifPage'])->name('dashboard.modify');
        Route::get('/dashboard/modify/{id}', [DashboardController::class, 'modif'])->middleware('CheckUserAccess');
        Route::put('/dashboard/modify/{id}', [DashboardController::class, 'modifUpdate'])->middleware('CheckUserAccess');
        Route::delete('/dashboard/modify/delete/{id}', [DashboardController::class, 'modifDelete'])->middleware('CheckUserAccess');



        Route::get('/dashboard/approving', [DashboardController::class, 'approvPage']);
        Route::get('/dashboard/approving/{id}', [DashboardController::class, 'confirmed'])->middleware('CheckUserAccess');
        Route::put('/dashboard/approving/{id}', [DashboardController::class, 'updateConfirmed'])->middleware('CheckUserAccess');

        Route::post('/dashboard/materials/create', [DashboardController::class, 'materialsCreate']);
    
        Route::get('/dashboard/materials/modify', [DashboardController::class, 'materialsModifyPage']);
        Route::get('/dashboard/materials/modify/edit/{id}', [DashboardController::class, 'materialsUpdatePage']);
        Route::put('/dashboard/materials/modify/edit/{id}', [DashboardController::class, 'materialsUpdate']);

        Route::get('/dashboard/meeting/list', [MeetingController::class, 'index']);
        Route::post('/dashboard/meeting/create', [MeetingController::class, 'createMeet']);
        Route::get('/dashboard/meeting/edit/{id}', [MeetingController::class, 'modifyMeet']);
        Route::put('/dashboard/meeting/edit/{id}', [MeetingController::class, 'updateMeet']);
        Route::delete('/dashboard/meeting/delete/{id}', [MeetingController::class, 'deleteMeet']);

        Route::get('/dashboard/meeting/absence/{id}', [MeetingController::class, 'getAbsence']);
        Route::post('/dashboard/meeting/absence/create', [MeetingController::class, 'storeAbsence']);
    });


    //MATERIAL FULL
    // ---------------------------------------------------------------
    Route::get('/dashboard/materials/list', [DashboardController::class, 'materialsPage']);
    Route::get('/dashboard/materials/list/{id}', [DashboardController::class, 'materialsDetail']);




// ---------------------------------------------------------------------
// GROUP FULL
    Route::get('/dashboard/group/list', [GroupdashController::class, 'index']);
    Route::get('/dashboard/group/list/{id}', [GroupdashController::class, 'groupDetail']);

    Route::get('/dashboard/group/create', [GroupdashController::class, 'groupCreatePage']);
    Route::post('/dashboard/group/create', [GroupdashController::class, 'groupCreate']);

    Route::get('/dashboard/group/modify', [GroupdashController::class, 'groupModifyPage']);
    Route::get('/dashboard/group/modify/edit/{id}', [GroupdashController::class, 'updatePage']);
    Route::put('/dashboard/group/modify/edit/{id}', [GroupdashController::class, 'groupUpdate']);
    Route::delete('/dashboard/group/modify/delete/{id}', [GroupdashController::class, 'groupDelete']);


    // PROFILE FULL
    // --------------------------------------------------------------
    Route::get('/dashboard/profile/{id}', [ProfileController::class, 'index']);
    Route::put('/dashboard/profile/update/{id}', [ProfileController::class, 'updateProfile']);



    // CV
    //-------------------------------------------------------------
    Route::get('/dashboard/cv/education', [CVController::class, 'education']);
    Route::post('/dashboard/cv/education', [CVController::class, 'educationInput']);
    Route::delete('/dashboard/cv/education-delete/{id}', [CVController::class, 'educationDelete']);

    Route::get('/dashboard/cv/experience', [CVController::class, 'experience']);
    Route::post('/dashboard/cv/experience', [CVController::class, 'experienceInput']);
    Route::delete('/dashboard/cv/experience-delete/{id}', [CVController::class, 'experienceDelete']);

    Route::get('/dashboard/cv/achievement', [CVController::class, 'achievement']);
    Route::post('/dashboard/cv/achievement', [CVController::class, 'achievementInput']);
    Route::delete('/dashboard/cv/achievement-delete/{id}', [CVController::class, 'achievementDelete']);

    Route::get('/dashboard/cv/skill', [CVController::class, 'skill']);
    Route::post('/dashboard/cv/skill', [CVController::class, 'skillInput']);
    Route::delete('/dashboard/cv/skill-delete/{id}', [CVController::class, 'skillDelete']);


    
    Route::get('/dashboard/cv/input', [CVController::class, 'inputData']);
    Route::post('/dashboard/cv/input', [CVController::class, 'storeData']);
    Route::get('/dashboard/cv/download', [CVController::class, 'cvData']);

});


// Route::get('/dashboard/students', [DashboardController::class, 'index'])->middleware('auth');
// Route::get('/dashboard/students/filter', [DashboardController::class, 'filterIndex'])->middleware('auth');


// Route::get('/dashboard/modify', [DashboardController::class, 'modifPage'])->name('dashboard.modify')->middleware('auth');
// Route::get('/dashboard/modify/{id}', [DashboardController::class, 'modif'])->middleware('auth');
// Route::put('/dashboard/modify/{id}', [DashboardController::class, 'modifUpdate'])->middleware('auth');
// Route::delete('/dashboard/modify/delete/{id}', [DashboardController::class, 'modifDelete'])->middleware('auth');



// Route::get('/dashboard/approving', [DashboardController::class, 'approvPage'])->middleware('auth');
// Route::get('/dashboard/approving/{id}', [DashboardController::class, 'confirmed'])->middleware('auth');
// Route::put('/dashboard/approving/{id}', [DashboardController::class, 'updateConfirmed'])->middleware('auth');

// Route::get('/dashboard/materials', [DashboardController::class, 'materialsPage'])->middleware('auth');





