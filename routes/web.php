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

route::prefix('/')->group(function (){

    Route::get('/main', 'web\main\main_cont@index')->name('index.web');

    route::prefix('section')->group(function (){
        Route::get('/{id}', 'web\section\section_cont@index')->name('index.section.web');
    });


    route::prefix('post')->group(function (){
        Route::get('/{id}', 'web\post\post_cont@index')->name('index.post.web');
        Route::post('/{id}', 'web\post\post_cont@index')->name('index.post.web');

        Route::get('/comment/{id}', 'web\post\post_cont@editcomment')->name('edit.comment.web');
        Route::post('/comment/{id}', 'web\post\post_cont@editcomment')->name('edit.comment.web');

        Route::get('/comment/delete/{id}', 'web\post\post_cont@deletecomment')->name('delete.comment.web');
    });

});




route::prefix('admin')->middleware('adminpanel')->group(function (){

    route::get('main',function (){
        return view('layouts.admin');

    });

    route::prefix('section')->middleware('adminrole')->group(function (){

        Route::get('/', 'admin\section\section_cont@index')->name('index.section');

        Route::get('delete/{id}', 'admin\section\section_cont@delete')->name('delete.section');
        Route::post('delete/{id}', 'admin\section\section_cont@delete')->name('delete.section');


        Route::get('add', 'admin\section\section_cont@add')->name('add.section');
        Route::post('add', 'admin\section\section_cont@add')->name('add.section');

        Route::get('update/{id}', 'admin\section\section_cont@update')->name('update.section');
        Route::post('update/{id}', 'admin\section\section_cont@update')->name('update.section');


    });

    route::prefix('image')->group(function (){
        Route::get('/', 'admin\image\image_cont@index')->name('index.image');


        Route::get('add', 'admin\image\image_cont@add')->name('add.image');
        Route::post('add', 'admin\image\image_cont@add')->name('add.image');

        Route::get('delete/{id}', 'admin\image\image_cont@delete')->name('delete.image');
        Route::post('delete/{id}', 'admin\image\image_cont@delete')->name('delete.image');

    });


    route::prefix('post')->group(function (){

        Route::get('add', 'admin\post\post_cont@add')->name('add.post');
        Route::post('add', 'admin\post\post_cont@add')->name('add.post');

        Route::get('update/{id}', 'admin\post\post_cont@update')->name('update.post');
        Route::post('update/{id}', 'admin\post\post_cont@update')->name('update.post');

        Route::get('delete/{id}', 'admin\post\post_cont@delete')->name('delete.post');
        Route::post('delete/{id}', 'admin\post\post_cont@delete')->name('delete.post');

        Route::get('/', 'admin\post\post_cont@index')->name('index.post');


    });


});




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');





