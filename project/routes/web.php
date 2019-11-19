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
Route::resource('posts', 'PostController');
Route::resource('categories', 'CategoryController');
Route::resource('users', 'UserController');
Route::resource('roles', 'RoleController');
Route::resource('comments', 'CommentController');
Route::resource('reports', 'ReportController');
