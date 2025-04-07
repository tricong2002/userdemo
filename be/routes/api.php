<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PaymentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\User\Update\AddressController;
use App\Http\Controllers\userprof;
use Illuminate\Session\Middleware\StartSession;

/* Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum'); */


Route::get('/truong', [ProductController::class, 'index']);
Route::get('/detail/{id}', [ProductController::class, 'detail']);

Route::post('/get-catepr', [ProductController::class, 'getcatepr']);
Route::match(['get', 'post'], '/search-product', [ProductController::class, 'searchProduct']);
/* Route::post('/register', [AuthController::class, 'register']);
 */
Route::middleware([StartSession::class])->group(function () {
    Route::post('/add-to-cart', [CartController::class, 'addCart']);
    Route::post('/up-cart', [CartController::class, 'upProCart']);
    Route::post('/down-cart', [CartController::class, 'downProCart']);
    Route::get('/get-cart', [CartController::class, 'getCart']);
    Route::post('/delete-cart', [CartController::class, 'deleteCart']);
    /*    Route::resource('total-payment', PaymentController::class); */
});
Route::middleware('api')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/forgotpass', [AuthController::class, 'forgot']);
    Route::post('/chance-pass', [AuthController::class, 'resetPass']);
    Route::middleware('auth:sanctum')->get('/getuserdetail', [AuthController::class, 'getUserInfo']);
    Route::middleware('auth:sanctum')->get('/logout', [AuthController::class, 'logout']);
    Route::middleware('auth:sanctum')->get('/logout', [AuthController::class, 'logout']);
    Route::middleware('auth:sanctum')->resource('/userprof', userprof::class);
    Route::middleware(['auth:sanctum', StartSession::class])->resource('total-payment', PaymentController::class);
    Route::middleware('auth:sanctum')->patch('/addresses/{address}/set-default', [AddressController::class, 'setDefault']);
    Route::middleware('auth:sanctum')->get('/getselect-user', [AddressController::class, 'getselect']);
    Route::middleware('auth:sanctum')->get('/payment-success', [PaymentController::class, 'vnpayReturn']);
    Route::middleware(['auth:sanctum', StartSession::class])->get('/check-cart', [CartController::class, 'checkCart']);
});
