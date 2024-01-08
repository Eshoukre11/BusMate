<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\university\LoginController;
use App\Http\Controllers\university\RegisterController;
use App\Http\Controllers\university\DashboardController;
use App\Http\Controllers\unstaffController;

/*
|--------------------------------------------------------------------------
| university Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::controller(DashboardController::class)->group(function () {
    Route::get('/ununiversity/dashboard/home', 'home')->name('university.dashboard');
    Route::get('/ununiversity/dashboard/addstudent', 'add')->name('addstudent');
});

//add student and show

Route::resource('student', StudentController::class);
//add un staff and show
Route::resource('unstaff', unstaffController::class);


Route::controller(unstaffController::class)->group(function () {
});

//login
Route::controller(LoginController::class)->group(function () {
    Route::get('/', 'ShowLogin')->name('login');

    Route::post('/login', 'CheckLogin')->name('login.university');
});


//Register
Route::controller(RegisterController::class)->group(function () {

    Route::get('/Register', 'ShowRegister')->name('regester.university');

    Route::post('/Register', 'CheckRegister')->name('Register.university');
});
