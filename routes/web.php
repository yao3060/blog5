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

Route::middleware('web')->group(function () {

    Route::resource('posts', 'PostController');

    Route::get('blog/{slug}', [
        'as'    => 'blog.single',
        'uses'  => 'BlogController@getSingle'
    ])->where('slug', '[\w\d\-\_]+');

    Route::get('blog', [
        'as'    => 'blog.index',
        'uses'  => 'BlogController@getArchive'
    ]);

    Route::get('about', 'PagesController@getAbout');

    Route::get('contact', 'PagesController@getContact');

    //Route::get('home', 'PagesController@index');


    Route::get('/', function () {
        return view('welcome');
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
