<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::group(['prefix' => \Mcamara\LaravelLocalization\Facades\LaravelLocalization::setLocale()], function()
//{
//    Route::get('/', 'Controller@index');
//    Route::auth();
//    Route::get('/home', 'HomeController@index');
//});


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect' ]
    ],
    function()
    {
        Route::get('/', 'Controller@index');
        Route::auth();
        Route::get('/home', 'HomeController@index');


        // личный кабинет

        Route::group(['middleware' => 'auth'], function()
        {
            Route::get('/user', 'User\UserController@index');
        });



    });

