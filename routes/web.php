<?php


Route::get('/', 'WelcomeController@index');

//Home
Route::group(['middleware' => ['auth']], function () {
  Route::get('/home','HomeController@index');
});

//users
Route::group(['middleware' => ['auth']], function () {
    Route::resource('users', 'UsersController', ['only' => ['show','edit','update']]);
});

//items
Route::group(['middleware' => ['auth']], function () {
   Route::resource('items', 'ItemsController');
});

//commnts
Route::group(['middleware' => ['auth']], function () {
   Route::resource('comments', 'CommentsController', ['only' =>['store','destroy']]);
});

//posts
Route::group(['middleware' => ['auth']], function () {
   Route::resource('posts', 'PostsController', ['only' =>['index','store','destroy']]);
});

//replies

Route::group(['middleware' => ['auth']], function () {
   Route::resource('replies', 'RepliesController', ['only' =>['store','destroy']]);
});

//chats
Route::group(['middleware' => ['auth']], function () {
   Route::resource('chats', 'ChatsController', ['only' =>['index','store','destroy']]);
});

//results
Route::group(['middleware' => ['auth']], function () {
   Route::resource('results', 'ResultsController', ['only' =>['index']]);
});

