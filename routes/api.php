<?php

Route::get('/customers', 'Api\CustomerApiController@index');
Route::post('/customer', 'Api\CustomerApiController@store');
Route::get('/customer/{id}', 'Api\CustomerApiController@show');