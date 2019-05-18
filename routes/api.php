<?php

Route::get('/customer', 'CustomerApiController@index');

Route::post('/customer', 'CustomerApiController@store');

//{
 //   return response()->json($request);

//});
