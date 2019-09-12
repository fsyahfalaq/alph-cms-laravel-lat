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
use App\Post;
use App\Category;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

// Route::get('/view', function () {
//     return view('store.view');
// });

Route::get('/', 'ArticleController@index');
Route::get('article/category/{id}', 'ArticleController@category');
Route::get('article/search', 'ArticleController@search');
Route::resource('store', 'StoreController');
Route::resource('article', 'ArticleController');
Route::resource('category', 'CategoryController')->middleware('auth');
Route::resource('post', 'PostController')->middleware('auth');
Route::delete('post/{id}', 'PostController@destroy');
Route::get('post/delete/{id}', 'PostController@destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
