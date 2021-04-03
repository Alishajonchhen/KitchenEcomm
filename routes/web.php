<?php

use App\Cart;
use App\Category;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\Frontend\SearchController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\OrderController as AppOrderController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

View::composer('*', function ($view) {
    $categories = Category::where('status', 1)->get();
    $cartCount = Cart::where('is_checked_out', 0)->where('user_id', Auth::id())->count();
    return $view->with(['categories' => $categories, 'cartCount' => $cartCount]);
});

Route::group(['prefix' => 'user', 'middleware' => 'prevent-back-history'], function () {
    /*Route for Home page*/
    Route::get('/home', [
        'uses' => 'HomeController@home',
        'as' => 'front.home'
    ]);

    /*Route for About page*/
    Route::get('/about', [
        'uses' => 'GuideController@ShowAbout',
        'as' => 'guide.about'
    ]);

    /*Route for Private Policy page*/
    Route::get('/policy', [
        'uses' => 'GuideController@ShowPolicy',
        'as' => 'guide.policy'
    ]);

    /*Route for Return Policy page*/
    Route::get('/return', [
        'uses' => 'GuideController@ShowReturn',
        'as' => 'guide.return'
    ]);

    /*Route for terms and condition page*/
    Route::get('/terms', [
        'uses' => 'GuideController@ShowTerm',
        'as' => 'guide.terms'
    ]);
});

Route::group(['middleware' => 'prevent-back-history'], function () {

    //##################################################3 USER ROUTEs ###########################################

    Route::get('/user/profile', [UserController::class, 'index'])->name('user-profile');
    Route::patch('/user/change/password', [UserController::class, 'changePassword'])->name('change-password');
    Route::get('/search/product', [SearchController::class, 'search'])->name('search-product');

    //############################################# FRONTEND CATEGORY WISE PRODUCT LISTING #############################

    Route::get('/category/{slug}', 'Frontend\CategoryController@index')->name('frontend-category');
    Route::get('/add-to-cart/{id}', 'Frontend\CartController@addToCart')->name('add-to-cart');
    Route::get('/view-cart', 'Frontend\CartController@index')->name('all-carts');
    Route::get('/checkout/cart', 'Frontend\CartController@checkoutOrder')->name('checkout-order');
    Route::delete('/remove-item/{id}', 'Frontend\CartController@removeItemFromCart')->name('remove-item');

    Route::get('/product/{id}', 'Frontend\CategoryController@productDetail')->name('frontend-product-detail');
    Route::post("/place-order", [OrderController::class, 'store'])->name('store-order');

    //####################################3 ORder tracking #########################################
    Route::get('user/order-track', [OrderController::class, 'orderTrack'])->name('order-track');
    Route::patch('/user/cancel/order/{id}', [OrderController::class, 'cancelOrderItem'])->name('cancel-order-item');

    //############################################# Payment #############################
    Route::post('/esewa-pay', 'Frontend\PaymentController@pay')->name('esewa-pay');
    Route::get('/success-pay', 'Frontend\PaymentController@successPay')->name('success-pay');
    Route::get('/error-pay', 'Frontend\PaymentController@errorPay')->name('error-pay');
});


Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => 'prevent-back-history'], function () {

    //Dashboard
    Route::get('/', 'AdminController@index');

    //Login route for admin
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');

    //Logout
    Route::post('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

    //Register
    Route::get('/register', 'Auth\AdminRegisterController@showRegisterForm')->name('admin.register');
    Route::post('/register', 'Auth\AdminRegisterController@register')->name('admin.register.submit');
});

Route::group(['prefix' => 'admin', 'middleware' => 'prevent-back-history'], function () {
    //Password reset routes
    Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
    Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset')->name('admin.password.update');

    // Route::group(['middleware' => 'auth'], function () {

    Route::get('/welcome', 'AdminController@welcome')->name('admin.dashboard');

    //Category

    Route::get('/categories', [
        'uses' => 'CategoryController@listCategory',
        'as' => 'admin.categories.category'
    ]);

    //Product
    Route::get('/products', [
        'uses' => 'ProductController@listProduct',
        'as' => 'admin.products.product'
    ]);

    //Crud for category table
    Route::post('/addCategory', 'CategoryController@addCategory')->name('admin.addCategory');
    Route::delete('/category/delete/{id?}', 'CategoryController@delete')->name('delete-category');
    Route::get('/category/edit/{id}', 'CategoryController@edit')->name('edit-category');
    Route::patch('/category/update/{id}', 'CategoryController@update')->name('update-category');

    //Crud for product table
    Route::post('/addProduct', [App\Http\Controllers\ProductController::class, 'addProduct'])->name('admin.addProducts');
    Route::delete('/product/delete/{id}', 'ProductController@delete')->name('delete-product');
    Route::get('/product/edit/{id}', 'ProductController@edit')->name('edit-product');
    Route::patch('/product/update/{id}', 'ProductController@update')->name('update-product');

    // order Controller
    Route::get('/orders', [AppOrderController::class, 'index'])->name('admin-order-list');
    Route::get('/order/edit/{id}', [AppOrderController::class, 'edit'])->name('admin-edit-order');
    Route::get('/order/view/{id}', [AppOrderController::class, 'viewOrder'])->name('admin-order-view');
    Route::patch('/order/update/status/{id}', [AppOrderController::class, 'updateStatus'])->name('update-order-status');
    Route::patch('/order/update/item/status/{id}', [AppOrderController::class, 'updateItemStatus'])->name('update-order-item-status');
    Route::delete('/order/delete/{id}', [AppOrderController::class, 'delete'])->name('admin-delete-order');
    Route::delete('/order/item/delete/{id}', [AppOrderController::class, 'deleteOrderItem'])->name('admin-delete-order-item');
});
// });
