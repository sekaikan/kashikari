<?php


Route::get('/', 'WelcomeController@index');


Route::group(['middleware' => ['auth']], function () {
//Home
   Route::get('/home','HomeController@index')->name('home');

//users
   Route::resource('users', 'UsersController', ['only' => ['show']]);

//items
   Route::resource('items', 'ItemsController', ['only' => ['index', 'create', 'store', 'show']] );

//commnts
   Route::resource('comments', 'CommentsController', ['only' =>['store','destroy']]);

//posts
   Route::resource('posts', 'PostsController', ['only' =>['index','store','destroy']]);

//replies
   Route::resource('replies', 'RepliesController', ['only' =>['store','destroy']]);

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

//user_prefix
   Route::group(['prefix' => 'users/{id}'], function (){
      
      //items
      Route::resource('items', 'ItemsController', ['only' => ['edit', 'update', 'destroy']]);
      
      //users
      Route::get('edit', 'UsersController@edit') ->name('edit');
      Route::patch('/', 'UsersController@update')->name('update');
      
      });
   });


Auth::routes();


