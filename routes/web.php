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

Route::get('/', 'UserController@index')->name('index');
Route::get('/about', 'UserController@about')->name('about');
Route::get('/projects', 'UserController@projects')->name('projects');
Route::get('/blog', 'UserController@blog')->name('blog');
Route::get('/contact', 'UserController@contact')->name('contact');

Auth::routes();

Route::get('/manage', 'ManagementConsoleController@index')->name('management-index');

Route::middleware(['auth'])->group(function() {
	Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
});
