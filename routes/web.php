<?php
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\PostsController;

Auth::routes();
Route::get('/', 'PostsController@index');
Route::get('/dashboard', function () {
    return view('layouts.master');    
});
Route::get('/welcome', function () {
    return view('welcome');
});
Route::group(['middleware' => ['auth']], function () {

    Route::get('/blogs', 'PostsController@index')->name('blog.index');

    Route::get('/blogs/show/{id}', 'PostsController@show')->name('blog.show');

    Route::get('/blogs/create', 'PostsController@create')->name('blog.create');

    Route::post('/blogs/store', 'PostsController@store')->name('blog.store');

    Route::get('/blogs/edit/{id}', 'PostsController@edit')->name('blog.edit');

    Route::post('/blogs/update/{id}', 'PostsController@update')->name('blog.update');

    Route::post('/blogs/delete/{id}', 'PostsController@destroy')->name('blog.delete');

    Route::get('/home', 'HomeController@index')->name('home');
    
    });
    
    Route::resource('dashboard', 'DashboardController');

