<?php
/*
Category Routes
*/
Route::get('/dashboard/category', 'CategoryController@index');
Route::post('/categorySave','CategoryController@save');
Route::get('/categoryManage','CategoryController@manage');
Route::get('/categoryEdit/{id}','CategoryController@edit');
Route::post('/categoryUpdate/{id}','CategoryController@update');
Route::get('/categoryDelete/{id}','CategoryController@delete');

/*
Category Routes
*/

Route::prefix('subCategory')->group(function(){
    Route::get('/entry','SubCategoryController@index');
    Route::post('/save','SubCategoryController@save');
});
