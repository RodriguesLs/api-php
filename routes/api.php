<?php

Route::get('customer/{id}/document', 'Api\CustomerApiController@document');
Route::get('customer/{id}/phones', 'Api\CustomerApiController@phones');
Route::apiResource('customers', 'Api\CustomerApiController');

Route::get('document/{id}/customer', 'Api\DocumentApiController@customer');
Route::apiResource('documents', 'Api\DocumentApiController');

Route::get('phones/{id}/customer', 'Api\PhoneApiController@customer');
Route::apiResource('phone', 'Api\PhoneApiController');