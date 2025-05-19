<?php

/**
 * Backend Admin Routes for Web Application
 *
 * This file contains all the routes for managing the admin panel, including routes for
 * dashboard, system Settings, profile Settings, daily tips, blogs, and natural care.
 * Routes are grouped under the 'admin' prefix and require authentication with the 'admin' middleware.
 */


use App\Http\Controllers\Web\Backend\CMS\FaqController;
use App\Http\Controllers\Web\Backend\CMS\HomePageSocialLinkContainerController;
use App\Http\Controllers\Web\Backend\ContactMessageController;
use App\Http\Controllers\Web\Backend\NotificationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Backend\ProfileController;
use App\Http\Controllers\Web\Backend\DynamicPageController;
use App\Http\Controllers\Web\Backend\SystemSettingController;


Route::middleware(['auth:web', 'role_check'])->prefix('admin')->group(function () {

  // Routes for managing guests
  Route::get('/', function () {
    return view('backend.layouts.dashboard.index');
  })->name('admin.dashboard');

  Route::get('settings-profile', [ProfileController::class, 'index'])->name('profile_settings.index');
  Route::post('settings-profile', [ProfileController::class, 'update'])->name('profile_settings.update');
  Route::get('settings-profile-password', [ProfileController::class, 'passwordChange'])->name('profile_settings.password_change');
  Route::post('settings-profile-password', [ProfileController::class, 'UpdatePassword'])->name('profile_settings.password');

  // Route for system settings index
  Route::get('system-settings', [SystemSettingController::class, 'index'])->name('system_settings.index');

  // Route for updating system settings
  Route::post('system-settings-update', [SystemSettingController::class, 'update'])->name('system_settings.update');

  // Mail Settings index
  Route::get('system-settings-mail', [SystemSettingController::class, 'mailSettingGet'])->name('system_settings.mail_get');
  // Mail Settings routes
  Route::post('system-settings-mail', [SystemSettingController::class, 'mailSettingUpdate'])->name('system_settings.mail');
  // // Social App Settings
  // Route::get('setting-configuration-social', [SystemSettingController::class, 'socialConfigGet'])->name('system_settings.configuration.social_get');
  // Route::post('setting-configuration-social', [SystemSettingController::class, 'socialAppUpdate'])->name('system_settings.configuration.social');
  // // Payments Settings
  // Route::get('setting-configuration-payment', [SystemSettingController::class, 'paymentSettingGet'])->name('system_settings.configuration.payment_get');
  // Route::post('setting-configuration-payment', [SystemSettingController::class, 'paymentSettingUpdate'])->name('system_settings.configuration.payment');


  // Routes for DynamicPageController
  Route::resource('/dynamic-page', DynamicPageController::class)->names('dynamic_page');
  Route::post('/dynamic-page/status/{id}', [DynamicPageController::class, 'status'])->name('dynamic_page.status');

  // Routes for FaqController
  Route::resource('/faqs', FaqController::class)->names('faqs');
  Route::post('/faqs/status/{id}', [FaqController::class, 'status'])->name('faqs.status');
  // Route Social link
  Route::resource('/home-page/social-link/index', HomePageSocialLinkContainerController::class)->names('cms.home_page.social_link')->except('show');
  Route::post('/home-page/social-link/status/{id}', [HomePageSocialLinkContainerController::class, 'status'])->name('cms.home_page.social_link.status');


  // Routes for NotificationController
  Route::post('/notifications/mark-as-read', [NotificationController::class, 'markAsRead'])->name('notification.read');
  Route::post('/notifications/mark-as-read/single/{id}', [NotificationController::class, 'markAsSingleRead'])->name('notification.read_single');
  Route::delete('/notifications/{id}', [NotificationController::class, 'delete'])->name('notification.delete');
  Route::delete('/notifications', [NotificationController::class, 'deleteAll'])->name('notification.deleteall');

  Route::get('/contact-us-message', [ContactMessageController::class, 'index'])->name('admin_contact_us.index');
  Route::get('/contact-us-message/{id}', [ContactMessageController::class, 'show'])->name('admin_contact_us.show');
  Route::delete('/contact-us-message/{id}', [ContactMessageController::class, 'destroy'])->name('admin_contact_us.destroy');
});


// Public route for dynamic pages accessible to all users
Route::get('/pages/{slug}', [DynamicPageController::class, 'showDaynamicPage'])->name('pages');
