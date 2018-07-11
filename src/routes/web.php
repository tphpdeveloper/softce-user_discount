<?php


Route::group([
    'namespace' => 'Softce\UserDiscount\Http\Controllers',
    'prefix' => 'admin/',
    'middleware' => ['web']
],function(){

    Route::get('user-discount/show/{user}', ['as' => 'admin.user_discount.show', 'uses' => 'UserDiscount@index']);

});