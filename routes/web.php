<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GroupdashController;

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


// DASHBOARD AUTH
Route::middleware(['auth'])->group(function () {
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





    // ---------------------------------------------------------------
    Route::get('/dashboard/materials/list', [DashboardController::class, 'materialsPage']);
    Route::get('/dashboard/materials/list/{id}', [DashboardController::class, 'materialsDetail']);
    Route::get('/dashboard/materials/create', [DashboardController::class, 'materialsCreatePage']);
    Route::post('/dashboard/materials/create', [DashboardController::class, 'materialsCreate']);

    Route::get('/dashboard/materials/modify', [DashboardController::class, 'materialsModifyPage']);
    Route::get('/dashboard/materials/modify/edit/{id}', [DashboardController::class, 'materialsUpdatePage']);
    Route::put('/dashboard/materials/modify/edit/{id}', [DashboardController::class, 'materialsUpdate']);



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


    Route::get('/dashboard/profile/{id}', [ProfileController::class, 'index']);
    Route::put('/dashboard/profile/update/{id}', [ProfileController::class, 'updateProfile']);

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





