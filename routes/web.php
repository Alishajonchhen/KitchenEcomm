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

Route::group(['middleware'=>'web'], function(){
    /*Route for Signup*/
    Route::get('/signup',[
        'uses'=>'UserController@getSignUp',
        'as'=>'users.signup']);

    Route::post('/signup',[
        'uses'=>'UserController@postSignUp',
        'as'=>'users.signup']);

    /*Route for Login*/
    Route::get('/login',[
        'uses'=>'UserController@getLogIn',
        'as'=>'users.login']);

    Route::post('/login',[
        'uses'=>'UserController@postLogIn',
        'as'=>'users.login']);

    /*Route for Logout*/
    Route::post('/logout',[
        'uses'=>'UserController@logout',
        'as'=>'users.logout']);

    /*Route for User profile*/
    Route::get('/profile',[
       'uses'=>'UserController@userProfile',
       'as'=>'users.profile'
    ]);
});

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

//Auth::routes();
/*Route for home page*/
Route::get('/welcome',[
    'uses'=>'HomeController@index',
    'as'=>'layout.welcome']);




