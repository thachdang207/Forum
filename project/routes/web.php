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
Route::get('/postsOfUser/{id}','PostController@showPostsOfUser')->name('posts.showPostsOfUser');
Route::get('/reportsOfPost/{id}','PostController@showReportsOfPost')->name('posts.showReportsOfPost');
Route::resource('posts', 'PostController');
Route::resource('categories', 'CategoryController');
Route::resource('users', 'UserController');
Route::resource('roles', 'RoleController');
Route::resource('comments', 'CommentController');
Route::resource('reports', 'ReportController');
<<<<<<< HEAD
Auth::routes();
=======


// Route::Auth('/login','LoginController@login')->name('login');
Auth::routes();

Auth::routes();

>>>>>>> 6e9eb45272647ead8e376a8e52c0a2a2b04991f0
Route::get('/home', 'HomeController@index')->name('home');
