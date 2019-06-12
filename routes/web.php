<?php
use App\Http\Controllers\Front\FrontController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
require 'admin.php';
/*Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/', 'Front\FrontController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
