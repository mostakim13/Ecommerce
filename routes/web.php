<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ShippingAreaController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\LanguageController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\User\CartPageController;
use App\Http\Controllers\User\WishlistController;
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

    //Coupon
    Route::get('coupon', [CouponController::class, 'create'])->name('coupon');
    Route::post('coupon/store', [CouponController::class, 'store'])->name('coupon-store');
    Route::get('coupon-edit/{id}', [CouponController::class, 'edit']);
    Route::post('coupon/update', [CouponController::class, 'update'])->name('coupon-update');
    Route::get('coupon-delete/{id}', [CouponController::class, 'destroy']);

    //Shipping Area
    Route::get('division', [ShippingAreaController::class, 'createDivision'])->name('division');
    Route::post('division/store', [ShippingAreaController::class, 'storeDivision'])->name('division-store');
    Route::get('division-edit/{id}', [ShippingAreaController::class, 'editDivision']);
    Route::post('division/update', [ShippingAreaController::class, 'updateDivision'])->name('division-update');
    Route::get('division-delete/{id}', [ShippingAreaController::class, 'destroyDivision']);

    //District
    Route::get('district', [ShippingAreaController::class, 'createDistrict'])->name('district');
    Route::post('district/store', [ShippingAreaController::class, 'storeDistrict'])->name('district-store');
    Route::get('district-edit/{id}', [ShippingAreaController::class, 'editDistrict']);
    Route::post('district/update', [ShippingAreaController::class, 'updateDistrict'])->name('district-update');
    Route::get('district-delete/{id}', [ShippingAreaController::class, 'destroyDistrict']);

    //State
    Route::get('state', [ShippingAreaController::class, 'createState'])->name('state');
    Route::post('state/store', [ShippingAreaController::class, 'storeState'])->name('state-store');
    Route::get('state-edit/{id}', [ShippingAreaController::class, 'editState']);
    Route::post('state/update', [ShippingAreaController::class, 'updateState'])->name('state-update');
    Route::get('state-delete/{id}', [ShippingAreaController::class, 'destroyState']);

    Route::get('district-get/ajax/{division_id}', [ShippingAreaController::class, 'getDistrictAjax']);
});


//================================================User Routes============================================
Route::group(['prefix' => 'user', 'middleware' => ['user', 'auth'], 'namespace' => 'User'], function () {
    Route::get('dashboard', [UserController::class, 'index'])->name('user.dashboard');
    Route::post('/update/data', [UserController::class, 'updateData'])->name('update.profile');
    Route::get('image', [UserController::class, 'imagePage'])->name('user-image');
    Route::post('/update/image', [UserController::class, 'updateImage'])->name('update-image');
    Route::get('/update/password', [UserController::class, 'updatePasswordPage'])->name('update-password');
    Route::post('/store/password', [UserController::class, 'storePassword'])->name('password-store');

    //wishlist
    Route::get('/wishlist', [wishlistController::class, 'create'])->name('wishlist');

    Route::get('/get-wishlist-product', [WishlistController::class, 'readAllProduct']);

    Route::get('/wishlist-remove/{id}', [WishlistController::class, 'destroy']);

    //cart
    Route::get('/my-cart', [CartController::class, 'create'])->name('cart');
    Route::get('/get-cart-product', [CartController::class, 'getAllCart']);
    Route::get('/cart-remove/{rowId}', [CartController::class, 'destroy']);
    Route::get('/cart-increment/{rowId}', [CartController::class, 'cartIncrement']);
    Route::get('/cart-decrement/{rowId}', [CartController::class, 'cartDecrement']);
});

//==============================================Frontend Routes=========================================
Route::get('english/language', [LanguageController::class, 'english'])->name('english.language');
Route::get('bangla/language', [LanguageController::class, 'bangla'])->name('bangla.language');
Route::get('animation', [LanguageController::class, 'ani'])->name('animation');
Route::get('single/product/{id}/{slug}', [IndexController::class, 'singleProduct']);


//===================================Product Tags===================================
Route::get('product/tag/{tag}', [IndexController::class, 'tagWiseProduct']);

//===========================subcat wise product show==========================
Route::get('subcategory/product/{subcat_id}/{slug}', [IndexController::class, 'subcatWiseProduct']);

//===========================subsubcat wise product show==========================
Route::get('sub/subcategory/product/{subsubcat_id}/{slug}', [IndexController::class, 'subSubCatWiseProduct']);
//===========================product view modal with ajax==========================
Route::get('product/view/modal/{id}', [IndexController::class, 'productViewAjax']);

//============================Add to Cart with ajax===========================
Route::post('/cart/data/store/{id}', [CartController::class, 'addToCart']);

//============================Add to Cart with ajax===========================
Route::get('/product/mini/cart/', [CartController::class, 'miniCart']);


Route::get('/minicart/product-remove/{rowId}', [CartController::class, 'miniCartRemove']);

//add to wishlist
Route::post('/add-to-wishlist/{id}', [WishlistController::class, 'addToWishlist']);

//coupon
Route::post('/coupon-apply', [CartController::class, 'couponApply']);