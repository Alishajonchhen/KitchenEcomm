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

Route::get('/admin',[
    'uses' =>'HomeController@adminHome',
    'as'=>'admin.adminHome'
]);

Auth::routes();

Route::get('/welcome', 'HomeController@home');
