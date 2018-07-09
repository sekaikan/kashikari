<?php


Route::get('/', 'WelcomeController@index');

Route::group(['middleware' => ['auth']], function () {
//Home
   Route::get('/home','HomeController@index')->name('home');

//users
   Route::resource('users', 'UsersController', ['only' => ['show']]);

//items
   Route::resource('items', 'ItemsController', ['only' => ['index', 'create', 'store','show']] );
//commnts
   Route::resource('comments', 'CommentsController', ['only' =>['store','destroy']]);

//posts
   Route::resource('posts', 'PostsController', ['only' =>['index','create','store','show', 'destroy']]);

//replies
   Route::resource('replies', 'RepliesController', ['only' =>['index','create','store','destroy']]);

//group home
   Route::resource('/group/home', 'GroupController', ['only' =>['index']]);

//chats
   Route::resource('/group/chats', 'ChatsController', ['only' =>['index','store','destroy']]);

//results
   Route::resource('results', 'ResultsController', ['only' =>['index']]);
   
//borrow
   Route::get('/group/borrow', 'PostsController@index');

//lend
   Route::get('/group/lend', 'ItemsController@index');

//items
   Route::group(['prefix' => 'items/{id}'], function (){
      Route::delete('/', 'ItemsController@destroy')->name('items.destroy');
      Route::get('edit', 'ItemsController@edit')->name('items.edit');
      Route::put('update', 'ItemsController@update')->name('items.update');
   });
   
//user_prefix
   Route::group(['prefix' => 'users/{id}'], function (){
      //users
      Route::get('edit', 'UsersController@edit') ->name('users.edit');
      Route::put('update', 'UsersController@update')->name('users.update');
   });
});

Auth::routes();
