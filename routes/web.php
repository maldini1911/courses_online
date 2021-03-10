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

Route::namespace('BackEnd')->prefix('admin')->middleware(['admin'])->group(function(){
    Route::get('/', 'Home@index')->name('admin.home');
    Route::resource('users', 'Users')->except(['show']);
    Route::resource('categories', 'Categories')->except(['show']);
    Route::resource('skills', 'Skills')->except(['show']);
    Route::resource('tags', 'Tags')->except(['show']);
    Route::resource('pages', 'Pages')->except(['show']);
    Route::resource('videos', 'Videos')->except(['show']);
    Route::post('commetns', 'Videos@commentStore')->name('comment.store');
    Route::get('commetn/delete/{id}', 'Videos@commentDelete')->name('comment.delete');
    Route::post('commetn/update/{id}', 'Videos@commentUpdate')->name('comment.update');
    Route::resource('messages', 'Messages')->except(['show']);
    Route::post('messages/reply/{id}', 'Messages@reply_message')->name('messages.reply');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('index');
Route::get('home', 'HomeController@home')->name('home');
Route::get('category/{id}', 'HomeController@category')->name('index.category');
Route::get('skill/{id}', 'HomeController@skills')->name('index.skill');
Route::get('tag/{id}', 'HomeController@tags')->name('index.tag');
Route::get('video/{id}', 'HomeController@video')->name('index.video');
Route::post('add/message', 'HomeController@add_message')->name('add.message');
Route::get('page/{id}', 'HomeController@pages')->name('index.page');
Route::get('profile/{id}', 'HomeController@profile')->name('frontend.profile');
Route::post('profile/update/{id}', 'HomeController@profile_update')->name('profile.update');

route::group(['middleware' => 'auth'], function(){
    Route::any('edit/comment/{id}', 'HomeController@edit_comment')->name('index.edit_comment');
    Route::any('add/comment/{id}', 'HomeController@add_comment')->name('index.add_comment');
    Route::any('logout', 'HomeController@logout')->name('logout');
});

