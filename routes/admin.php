<?php
/*
Category Routes
*/
Route::get('/dashboard/category', 'CategoryController@index');
Route::post('/categorySave','CategoryController@save');
Route::get('/categoryManage','CategoryController@manage');
