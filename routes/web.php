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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('posts', 'PostsController', ['only' => [
    'index', 'show'
]]);
Route::get('prices', 'PricesController@index')->name('prices');

Route::get('contact', 'ContactsController@index');
Route::post('contact/confirm', 'ContactsController@confirm');
Route::post('contact/complete', 'ContactsController@complete');

// 管理画面
//Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function()
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin::'], function()
{
    Route::resource('posts', 'PostsController');
    Route::resource('categories', 'CategoriesController');
    Route::resource('tags', 'TagsController');
    Route::resource('contacts', 'ContactsController', ['only' => [
        'index', 'show', 'destroy'
    ]]);
    // 価格表
    Route::get('prices', 'PricesController@index')->name('prices');
    Route::post('prices/upload', 'PricesController@upload')->name('prices.upload');
    Route::get('prices/download', 'PricesController@download')->name('prices.download');

});
