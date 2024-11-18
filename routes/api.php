<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\Api\ItemController;
use App\Http\Controllers\ApiController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Borneo Hackathon Mockup
Route::get('/get-items/{id?}', [ItemController::class, 'index']);
// Example
Route::get('resource', [ApiController::class, 'index']);
Route::get('resource/{id}', [ApiController::class, 'show']);
Route::post('resource', [ApiController::class, 'store']);
Route::put('resource/{id}', [ApiController::class, 'update']);
Route::delete('resource/{id}', [ApiController::class, 'destroy']);


// Old API attendancedashboard
Route::get('/getdata', [UserProfileController::class, 'getdata']);
Route::post('/getdata/{id}', [UserProfileController::class, 'showdata']);
Route::post('/adduser', [UserProfileController::class, 'adddata']);
Route::delete('/deleteuser', [UserProfileController::class, 'deleteuser']);
Route::PUT('/updateuser', [UserProfileController::class, 'updateuser']);
Route::post('/updateuserClockIn',   [UserProfileController::class, 'userClockIn']);
Route::post('/updateuserClockOut', [UserProfileController::class, 'userClockOut']);

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
