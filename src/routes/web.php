<?php


Route::group([
    'namespace' => 'Softce\UserDiscount\Http\Controllers',
    'prefix' => 'admin/',
    'middleware' => ['web']
],function(){

    Route::get('user-discount/{user}/show', ['as' => 'admin.user_discount.show', 'uses' => 'UserDiscount@index']);
    Route::post('user-discount/{user}/change', ['as' => 'admin.user_discount.change', 'uses' => 'UserDiscount@change']);

});