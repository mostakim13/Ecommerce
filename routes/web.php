<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Frontend\LanguageController;
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
    Route::get('/brand-delete/{brand_id}', [BrandController::class, 'delete']);

    //====================================Category Routes===================================
    Route::get('category', [CategoryController::class, 'index'])->name('category');
    Route::post('category/store', [CategoryController::class, 'categoryStore'])->name('category-store');
    Route::get('/category-edit/{cat_id}', [CategoryController::class, 'edit']);
    Route::post('category/update', [CategoryController::class, 'categoryUpdate'])->name('update-category');
    Route::get('/category-delete/{cat_id}', [CategoryController::class, 'delete']);

    //=====================================Sub-Category Routes=================================
    Route::get('sub-category', [CategoryController::class, 'subIndex'])->name('sub-category');
    Route::post('sub-category/store', [CategoryController::class, 'subCategoryStore'])->name('subcategory-store');
    Route::get('/sub-category-edit/{subcat_id}', [CategoryController::class, 'subEdit']);
    Route::post('sub-category/update', [CategoryController::class, 'subCategoryUpdate'])->name('update-sub-category');
    Route::get('/sub-category-delete/{subcat_id}', [CategoryController::class, 'subDelete']);

    //=====================================Sub-Subcategory Routes=============================
    Route::get('sub-sub-category', [CategoryController::class, 'subSubIndex'])->name('sub-sub-category');
    Route::get('subcategory/ajax/{cat_id}', [CategoryController::class, 'getSubCat']);
    Route::post('sub-sub-category/store', [CategoryController::class, 'subSubCategoryStore'])->name('sub-subcategory-store');
    Route::get('/sub-sub-category-edit/{subsubcat_id}', [CategoryController::class, 'subSubEdit']);
    Route::post('sub-subcategory/update', [CategoryController::class, 'subSubCategoryUpdate'])
        ->name('update-sub-subcategory');
    Route::get('/sub-sub-category-delete/{subsubcat_id}', [CategoryController::class, 'subSubDelete']);

    //=============================================Product Routes================================
    Route::get('add/product', [ProductController::class, 'addProduct'])->name('add-product');
    Route::post('product/store', [ProductController::class, 'store'])->name('store-product');
    Route::get('sub-subcategory/ajax/{subcat_id}', [ProductController::class, 'getSubSubCat']);
    Route::get('manage/product', [ProductController::class, 'manageProduct'])->name('manage-product');
    Route::get('/product-view/{product_id}', [ProductController::class, 'view']);
    Route::get('/product-edit/{product_id}', [ProductController::class, 'edit']);
    Route::post('product/data/update', [ProductController::class, 'productDataUpdate'])
        ->name('update-product-data');
    Route::get('/product-delete/{product_id}', [ProductController::class, 'delete']);
    Route::post('product/multi/image/update', [ProductController::class, 'multiImgUpdate'])
        ->name('update-product-image');
    Route::post('product/thambnail/update', [ProductController::class, 'thambnailUpdate'])
        ->name('update-product-thambnail');

    Route::get('product/multiimg/delete/{id}', [ProductController::class, 'multiImageDelete']);
    Route::get('product-inactive/{id}', [ProductController::class, 'inactive']);
    Route::get('product-active/{id}', [ProductController::class, 'active']);
    //sliders
    Route::get('slider', [SliderController::class, 'index'])->name('sliders');
    Route::post('slider/store', [SliderController::class, 'store'])->name('slider-store');
    Route::get('slider-edit/{id}', [SliderController::class, 'edit']);
    Route::post('slider/update', [SliderController::class, 'update'])->name('update-slider');
    Route::get('slider/delete/{id}', [SliderController::class, 'destroy']);
    Route::get('slider-inactive/{id}', [SliderController::class, 'inactive']);
    Route::get('slider-active/{id}', [SliderController::class, 'active']);
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
Route::get('english/language', [LanguageController::class, 'english'])->name('english.language');
Route::get('bangla/language', [LanguageController::class, 'bangla'])->name('bangla.language');
Route::get('animation', [LanguageController::class, 'ani'])->name('animation');
Route::get('single/product/{id}/{slug}', [IndexController::class, 'singleProduct']);


//===================================Product Tags===================================
Route::get('product/tag/{tag}', [IndexController::class, 'tagWiseProduct']);