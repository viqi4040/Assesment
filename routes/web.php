<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



// Front routes

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');

Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');

Route::get('/get_union_councils', [RegisterController::class, 'unionCouncils'])->name('get_union_councils');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

Route::post('/login', [LoginController::class, 'login'])->name('login.submit');


// Admin Routes

Route::get('/adminDashboard', [DashboardController::class, 'index'])->name('adminDashboard');

Route::get('/admin/view-polio-workers', [AdminController::class, 'viewPolioWorkers'])->name('viewPolioWorkers');

Route::get('/admin/assignPolioWorkers', [AdminController::class, 'assignPolioWorkers'])->name('assignPolioWorkers');

Route::get('/admin/assignPolioWorker', [AdminController::class, 'assignPolioWorker'])->name('assignPolioWorker');

Route::post('/get_divisions', [AdminController::class, 'getDivisions']);

Route::post('/get_districts', [AdminController::class, 'getDistricts']);

Route::post('/get_tehsils', [AdminController::class, 'getTehsils']);

Route::post('/get_union_councils', [AdminController::class, 'getUnionCouncils']);

Route::post('/get_households', [AdminController::class, 'getHouseholds']);

Route::post('/get_household_members', [AdminController::class, 'getHouseholdMembers']);

Route::post('/get_users', [AdminController::class, 'getUsers']);

Route::get('admin/submitUsers', [AdminController::class, 'submitUsers'])->name('submitUsers');


Route::get('/admin/logout', [LoginController::class, 'logout'])->name('logout');