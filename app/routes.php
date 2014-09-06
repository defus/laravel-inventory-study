<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the Closure to execute when that URI is requested.
  |
 */


Route::group(array('prefix' => '/admin', 'namespace' => 'Admin'), function() {
    Route::get('/', function() {
        
    });
    
    // Item management group
    Route::group(array('prefix' => '/items'), function() {

        Route::get('/', 'ItemsController@index');
        Route::match(array('GET', 'POST'), '/add', 'ItemsController@add');
        Route::match(array('GET', 'POST'), '/edit/{id}', 'ItemsController@edit')->where('id', '[0-9]+');
        Route::match(array('GET', 'POST'), '/delete/{id}', 'ItemsController@delete')->where('id', '[0-9]+');
        
    });
});
