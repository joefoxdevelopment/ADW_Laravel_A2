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
Route::get('/blog', 'UserController@blog')->name('blog');
Route::get('/blog/{id}/{slug?}', 'UserController@blogPost')->name('blog-post');
Route::get('/contact', 'UserController@contact')->name('contact');
Route::get('/privacypolicy', 'UserController@privacyPolicy')->name('privacy-policy');
Route::get('/projects', 'UserController@projects')->name('projects');

Route::post('/contact', 'UserController@sendMessage')->name('message');

Auth::routes();

Route::get('/manage', 'ManagementConsoleController@index')->name('management-index');

Route::get('/manage/blog','BlogManagementController@index')->name('blog-management-index');
Route::get('/manage/blog/delete/{id}', 'BlogManagementController@deleteBlogPost')->name('delete-blog-post');;
Route::get('/manage/blog/edit/{id}', 'BlogManagementController@editBlogPost')->name('edit-blog-post');
Route::get('/manage/blog/new','BlogManagementController@newBlogPost')->name('new-blog-post');

Route::get('/manage/projects', 'ProjectManagementController@index')->name('project-management-index');
Route::get('/manage/projects/delete/{id}', 'ProjectManagementController@deleteProject')->name('delete-project');
Route::get('/manage/projects/edit/{id}', 'ProjectManagementController@editProject')->name('edit-project');
Route::get('/manage/projects/new', 'ProjectManagementController@newProject')->name('new-project');

Route::post('/manage/blog/edit/{id}', 'BlogManagementController@updateBlogPost')->name('edit-blog-post-submit');
Route::post('/manage/blog/new', 'BlogManagementController@addNewBlogPost')->name('add-new-blog-post');

Route::post('/manage/projects/edit/{id}', 'ProjectManagementController@updateProject')->name('edit-project-submit');
Route::post('/manage/projects/new', 'ProjectManagementController@addNewProject')->name('add-new-project');

Route::middleware(['auth'])->group(function() {
	Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
});
