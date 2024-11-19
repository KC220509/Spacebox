<?php

use App\Http\Controllers\Web\AccountController;
use App\Http\Controllers\Web\Admin\AdminController;
use App\Http\Controllers\Web\HomeController;
use Illuminate\Support\Facades\Route;


// Liên kết tới trang chưa login
Route::get('/', [HomeController::class, 'landingPage'])->name('spacebox.landingpage');


// Account
Route::group(['prefix' => 'account', 'as' => 'account.'], function(){
    Route::get('/register', [AccountController::class, 'registerForm'])->name('register');
    Route::post('/register',[AccountController::class, 'registerAction'])->name('register.auth');

    Route::get('/verify/{email}',[AccountController::class, 'verifyEmail'])->name('verify');

    Route::get('/login', [AccountController::class, 'loginForm'])->name('login');
    Route::post('/login',[AccountController::class, 'loginAction'])->name('login.auth');

    Route::get('/logout', [AccountController::class, 'logoutAction'])->name('logout');

    Route::get('/reset-password', [AccountController::class, 'forgotPassForm'])->name('forgotPassForm');
    Route::post('/reset-password', [AccountController::class, 'sendEmailResetPass'])->name('sendResetPass');
});


    
// Dành cho Admin
Route::group(['prefix' => 'admin', 'middleware' => 'check_admin' ,'as' => 'admin.'], function(){
    Route::get('/', [AdminController::class, 'index'])->name('index');
    // Quản lý người dùng
    Route::get('/quan-ly-nguoi-dung', [AdminController::class, 'getListUser'])->name('getListUser');
    Route::post('/quan-ly-nguoi-dung/resetpass', [AccountController::class, 'sendEmailResetPass'])->name('sendResetPass');
    Route::delete('/quan-ly-nguoi-dung/delete', [AdminController::class, 'deleteUser'])->name('deleteUsers');
    
    Route::get('/quan-ly-nguoi-dung/update-user/{user_id}', [AdminController::class, 'updateUserForm'])->name('updateUserForm');
    Route::patch('/quan-ly-nguoi-dung/update-user/{user_id}', [AdminController::class, 'updateProfileUser'])->name('updateProfileUser');
    
    // Quản lý phòng chat
    Route::get('/quan-ly-phong-chat', [AdminController::class, 'getListRoom'])->name('getListRoom');
    
    // Xem, sửa profile
    Route::get('/profile', [AdminController::class, 'getProfile'])->name('getProfile');
    Route::patch('/update-profile', [AdminController::class, 'updateProfile'])->name('updateProfile');

    // Change password
    Route::get('/change-pass', [AdminController::class, 'changePassForm'])->name('changePassForm');
    Route::put('/change-pass', [AdminController::class, 'changePassAction'])->name('changePass');
    
    // Đăng nhập vào spacebox
    Route::get('/spacebox', [HomeController::class, 'index'])->name('home.index');


});


// Dành cho Users
Route::group(['prefix' => 'spacebox', 'middleware' => 'check_user' ,'as' => 'spacebox.'], function(){

    Route::get('/', [HomeController::class, 'index'])->name('home.index');
});




