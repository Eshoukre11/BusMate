<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Http\Controllers\DashboardCompany\mytripController;
use App\Http\Controllers\DashboardCompany\AddBusesController;
use App\Http\Controllers\DashboardCompany\AddDriverController;
use App\Http\Controllers\DashboardUniversity\AddTripController;
use App\Http\Controllers\DashboardUniversity\AddYearController;
use App\Http\Controllers\DashboardUniversity\CompanyController;
use App\Http\Controllers\DashboardUniversity\UserAddController;
use App\Http\Controllers\DashboardUniversity\feedbackController;
use App\Http\Controllers\DashboardUniversity\SubscriberController;
use App\Http\Controllers\DashboardUniversity\AddSemesterController;
use App\Http\Controllers\DashboardUniversity\ChangeTripRequestController;
use App\Http\Controllers\DashboardUniversity\AddCompanyContractController;
use App\Http\Controllers\DashboardUniversity\SubscribtionRequestController;

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
// , ['only' => ['index', 'show']]
//university dashboard 
Route::group([], function () {
    Route::get('/d', function () {

        return view('DashboardUniversity.information');
    })->name('dashboard-university');

    Route::resource('UniversityUserAdd', UserAddController::class);
    Route::resource('SubscribtionRequest', SubscribtionRequestController::class);
    Route::resource('Subscriber', SubscriberController::class);
    Route::resource('Add_Year', AddYearController::class);
    Route::resource('Add_Semester', AddSemesterController::class);
    Route::resource('Add_Company_Contract', AddCompanyContractController::class);
    Route::resource('Company', CompanyController::class);
    Route::resource('Add_Trip', AddTripController::class);
    Route::resource('change_trip_request', ChangeTripRequestController::class);
    Route::resource('subscriberfeedback', feedbackController::class);
});
//company dashboard
Route::group([], function () {
    Route::get('/', function () {
        return view('DashboardCompany.information');
    })->name('dashboard-Company');
    Route::resource('AddBuses', AddBusesController::class);
    Route::resource('AddDriver', AddDriverController::class);
    Route::resource('Mytrip', mytripController::class);
});
