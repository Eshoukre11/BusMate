<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Application\sub\ApiDriverController;
use App\Http\Controllers\Application\sub\ApiSubscriberController;
use App\Http\Controllers\Application\sub\SendSubscriptionRequestController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

//ارسال طلب الاشتراك 
//قيام بعملية تسجيل دخول 
Route::controller(SendSubscriptionRequestController::class)->group(function () {
    Route::post('SendSubscribtionRequest', 'SendSubscribtionRequest');
    Route::post('Login', 'Login');
});

Route::middleware('AssignGuard:subscriber-api')->group(function () {
    Route::post('Logout', [ApiSubscriberController::class, 'Logout']);
    Route::get('ShowTrip', [ApiSubscriberController::class, 'ShowTrip']);
    Route::post('choosetrip', [ApiSubscriberController::class, 'choosetrip']);
    Route::post('SendFeedback', [ApiSubscriberController::class, 'SendFeedback']);
    Route::post('showsubscribertrip', [ApiSubscriberController::class, 'showsubscribertrip']);
    Route::post('changetriprequest', [ApiSubscriberController::class, 'changetriprequest']);
});

// Route::middleware('AssignGuard:driver-api', 'CheckAdminToken')->group(function () {
//     Route::post('logout', [ApiDriverController::class, 'logout']);
// });
