<?php

Route::group(['prefix' => 'api/v1'],  function()
{
    Route::group(['namespace' => 'Services\Users\Http\Controllers'], function()
    {
        Route::get('users', ['uses' => 'UsersController@index']);
        Route::get('users/{id}', ['uses' => 'UsersController@show']);
    });
});

/*
 * Fallback to the site's home page
 */
Route::any('/{anything?}', function ()
{
    return redirect('http://local.churchadmin.com');
});

