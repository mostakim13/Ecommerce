<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Frontend\IndexController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [IndexController::class, 'index']);

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//================================================Admin Routes===========================================
Route::group(['prefix' => 'admin', 'middleware' => ['admin', 'auth'], 'namespace' => 'Admin'], function () {
    Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    //==================================PROFILE======================================
    Route::get('profile', [AdminController::class, 'profile'])->name('profile');
    Route::post('update/info', [AdminController::class, 'updateInfo'])->name('update-data');
    Route::get('update/image/page', [AdminController::class, 'updateImagePage'])->name('admin-image');
    Route::post('image/store', [AdminController::class, 'imageStore'])->name('store-image');
    Route::get('change/password', [AdminController::class, 'changePassword'])->name('change-password');
    Route::post('change/password/store', [AdminController::class, 'changePasswordStore'])->name('change-password-store');
    
    //======================================Brand Routes=====================================
    Route::get('all-brands', [BrandController::class, 'index'])->name('brands');
    Route::post('brand/store', [BrandController::class, 'brandStore'])->name('brand-store');
    Route::get('/brand-edit/{brand_id}', [BrandController::class, 'edit']);
    Route::post('brand/update', [BrandController::class, 'brandUpdate'])->name('update-brand');
    Route::get('/brand-delete/{brand_id}',[BrandController::class,'delete']);
    
    //====================================Category Routes===================================
    Route::get('category', [CategoryController::class, 'index'])->name('category');
    Route::post('category/store', [CategoryController::class, 'categoryStore'])->name('category-store');
    Route::get('/category-edit/{cat_id}', [CategoryController::class, 'edit']);
    Route::post('category/update', [CategoryController::class, 'categoryUpdate'])->name('update-category');
    Route::get('/category-delete/{cat_id}',[CategoryController::class,'delete']);

    //=====================================Sub-Category Routes=================================
    Route::get('sub-category', [CategoryController::class, 'subIndex'])->name('sub-category');
    Route::post('sub-category/store', [CategoryController::class, 'subCategoryStore'])->name('subcategory-store');
    Route::get('/sub-category-edit/{subcat_id}', [CategoryController::class, 'subEdit']);
    Route::post('sub-category/update', [CategoryController::class, 'subCategoryUpdate'])->name('update-sub-category');
    Route::get('/sub-category-delete/{subcat_id}',[CategoryController::class,'subDelete']);
});


//================================================User Routes============================================
Route::group(['prefix' => 'user', 'middleware' => ['user', 'auth'], 'namespace' => 'User'], function () {
    Route::get('dashboard', [UserController::class, 'index'])->name('user.dashboard');
    Route::post('update/data', [UserController::class, 'updateData'])->name('update.profile');
    Route::get('image', [UserController::class, 'imagePage'])->name('user-image');
    Route::post('update/image', [UserController::class, 'updateImage'])->name('update-image');
    Route::get('update/password', [UserController::class, 'updatePasswordPage'])->name('update-password');
    Route::post('store/password', [UserController::class, 'storePassword'])->name('password-store');
});

//==============================================Frontend Routes=========================================
