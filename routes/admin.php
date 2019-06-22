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
    Route::get('/manage','SubCategoryController@manage');
    Route::get('/view/{id}','SubCategoryController@singleSubCategory');
    Route::get('/edit/{id}','SubCategoryController@edit');
    Route::post('/update/{id}','SubCategoryController@update');
    Route::get('/delete/{id}','SubCategoryController@delete');
});
