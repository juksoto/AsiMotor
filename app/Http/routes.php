<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {

});

/**
 * Groups AdminControllers Controllers
 */

Route::group(['prefix' => 'admin'], function()
{
    Route::resource('country', 'AdminControllers\Contact\CountryController');
    Route::resource('city', 'AdminControllers\Contact\CityController');

    Route::group(['prefix' => 'vehicle'], function()
    {
        Route::resource('make', 'AdminControllers\Vehicle\MakeController');
        Route::resource('class', 'AdminControllers\Vehicle\ClassController');
        Route::resource('line', 'AdminControllers\Vehicle\LineController');



    });
});