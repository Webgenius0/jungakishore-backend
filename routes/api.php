<?php



use App\Http\Controllers\API\Auth\LoginController;
use App\Http\Controllers\API\Auth\LogoutController;
use App\Http\Controllers\API\Auth\RegisterController;
use App\Http\Controllers\API\Auth\ResetPasswordController;
use App\Http\Controllers\API\Auth\UserController;
use App\Http\Controllers\API\V1\CMS\HomePageController;
use App\Http\Controllers\API\V1\CMS\UserContactSupportController;
use Illuminate\Support\Facades\Route;



Route::group(['middleware' => 'guest:api'], function ($router) {
    //register
    Route::post('register', [RegisterController::class, 'register']);
    Route::post('/verify-email', [RegisterController::class, 'VerifyEmail']);
    Route::post('/resend-otp', [RegisterController::class, 'ResendOtp']);
    //login
    Route::post('login', [LoginController::class, 'login']);
    Route::post('/login/verify-otp', [LoginController::class, 'verifyLoginOtp']);
    //forgot password
    Route::post('/forget-password', [ResetPasswordController::class, 'forgotPassword']);
    Route::post('/verify-otp', [ResetPasswordController::class, 'VerifyOTP']);
    Route::post('/reset-password', [ResetPasswordController::class, 'ResetPassword']);

});

Route::group(['middleware' => 'auth:api'], function ($router) {
    Route::get('/refresh-token', [LoginController::class, 'refreshToken']);
    Route::post('/logout', [LogoutController::class, 'logout']);
    Route::get('/me', [UserController::class, 'me']);
    Route::post('/update-profile', [UserController::class, 'updateProfile']);
    Route::post('/update-password', [UserController::class, 'changePassword']);
    Route::delete('/delete-profile', [UserController::class, 'deleteProfile']);

});


// // only for enterprise and individual
// Route::group(['middleware' => ['auth:api', 'check_is_individual_or_enterprise']], function ($router) {
//     Route::post('/contact-support-message/sent', [UserContactSupportController::class, 'store']);
//     // dynamic page
//     Route::get("dynamic-pages", [HomePageController::class, "getDynamicPages"]);
//     Route::get("dynamic-pages/single/{slug}", [HomePageController::class, "showDaynamicPage"]);
// });

// only for enterprise
Route::group(['middleware' => ['auth:api', 'check_is_enterprise']], function ($router) {

});
// only for individual
Route::group(['middleware' => ['auth:api', 'check_is_individual']], function ($router) {

});
