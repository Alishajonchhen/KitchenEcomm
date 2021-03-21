<?php

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
Route::group(['prefix'=>'user','middleware'=>'prevent-back-history'], function (){
    /*Route for Home page*/
    Route::get('/home',[
        'uses'=>'HomeController@home',
        'as'=>'front.home'
    ]);

    /*Route for About page*/
    Route::get('/about',[
        'uses'=>'GuideController@ShowAbout',
        'as'=>'guide.about']);

    /*Route for Private Policy page*/
    Route::get('/policy',[
        'uses'=>'GuideController@ShowPolicy',
        'as'=>'guide.policy']);

    /*Route for Return Policy page*/
    Route::get('/return',[
        'uses'=>'GuideController@ShowReturn',
        'as'=>'guide.return']);

    /*Route for terms and condition page*/
    Route::get('/terms',[
        'uses'=>'GuideController@ShowTerm',
        'as'=>'guide.terms']);

});


Auth::routes();

Route::group(['prefix' => 'admin', 'middleware'=>'prevent-back-history'], function (){

    //Dashboard
    Route::get('/','AdminController@index');
    Route::get('/welcome','AdminController@welcome')->name('admin.dashboard');

    //Login route for admin
    Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');

    //Logout
    Route::post('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

    //Register
    Route::get('/register','Auth\AdminRegisterController@showRegisterForm')->name('admin.register');
    Route::post('/register', 'Auth\AdminRegisterController@register')->name('admin.register.submit');
});

Route::group(['prefix' => 'admin'], function () {
//Password reset routes
    Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
    Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset')->name('admin.password.update');

    //Category
    Route::get('/categories',[
        'uses'=>'CategoryController@listCategory',
        'as'=>'admin.categories.category'
    ]);

    //Product
    Route::get('/products',[
        'uses'=>'ProductController@listProduct',
        'as'=>'admin.products.product'
    ]);

    //Crud for category table
    Route::post('/addCategory','CategoryController@addCategory')->name('admin.addCategory');
    Route::any('delete/{id?}','CategoryController@delete')->name('delete');
    Route::any('edit/{id?}','CategoryController@edit')->name('edit');
    Route::any('editAction','CategoryController@editAction')->name('editAction');

    //Crud for product table
    Route::post('/addProduct',[App\Http\Controllers\ProductController::class, 'addProduct'])->name('admin.addProducts');
    Route::any('delete/{id?}','ProductController@delete')->name('delete');
    Route::any('edit/{id?}','ProductController@edit')->name('edit');
    Route::any('editAction','ProductController@editAction')->name('editAction');
});



