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
            Route::get('/user', 'User\UserController@main');

            //profile
            Route::get('/user/profile', 'User\UserController@profile');
            Route::post('/user/edit_profile', 'User\UserController@edit_profile');
            Route::post('/user/edit_password', 'User\UserController@edit_password');
            Route::post('/user/change_photo', 'User\UserController@change_photo');
            Route::get('/user/delete_photo', 'User\UserController@delete_photo');

            //message
            Route::post('/user/new_message', 'User\MessageController@add');
            Route::get('/user/get_message_chat', 'User\MessageController@check_new');

            Route::get('/user/message', 'User\MessageController@index');

        });



    });

