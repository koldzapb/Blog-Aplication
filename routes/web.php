<?php

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

Route::get('/',  'NewsController@index');

Route::get('/category/{title}', 'NewsController@showcategory');
Route::get('/article/{titile}/{id}', 'NewsController@showarticle');
Route::post('/article/{id}/store-comment', 'NewsController@storecomment');

Auth::routes();

Route::get('/admin', 'HomeController@index')->name('home');


//Route::resource('admin/category', 'CategoryController');
//Route::resource('admin/article', 'ArticleController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/logout', 'Auth\LoginController@logout')->name('logout' );

Route::group(['middleware' => 'admin'], function()
{
    Route::resource('admin/category', 'CategoryController');
    Route::resource('admin/article', 'ArticleController');
    Route::get('admin/comment', 'CommentController@index');
	Route::put('admin/comment/update', 'CommentController@update');
});


