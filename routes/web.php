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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();


Route::get('test','PostsController@posts');

//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');


//ログイン中のページ
Route::get('/top','PostsController@index');

Route::get('/profile','UsersController@profile');

Route::get('/search','UsersController@search');

Route::get('/logout','Auth\LoginController@logout');

Route::post('post/create','PostsController@create');

Route::post('post/update','PostsController@update');


// フォロー関連
Route::get('/follow-list','FollowsController@followList');
Route::get('/follower-list','PostsController@followerList');
Route::post('follow/create',"FollowsController@create");
Route::post('follow/remove',"FollowsController@remove");
Route::get('/result','UsersController@result');
Route::get('userprofile/{id}','UsersController@userprofile');


// つぶやき削除
Route::get('/post/{id}/delete', 'PostsController@delete');

//プロフィール編集
Route::post('/upload','UsersController@store');
