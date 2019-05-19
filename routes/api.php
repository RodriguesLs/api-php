<?php

Route::get('/customers', 'Api\CustomerApiController@index');
Route::post('/customer', 'Api\CustomerApiController@store');
Route::get('/customer/{id}', 'Api\CustomerApiController@show');
Route::delete('/customer/{id}', 'Api\CustomerApiController@destroy');
Route::patch('/customer/{id}', 'Api\CustomerApiController@update');