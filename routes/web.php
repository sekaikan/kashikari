<?php


Route::get('/', 'WelcomeController@index');

Route::group(['middleware' => ['auth']], function () {
//Home
   Route::get('/home','HomeController@index')->name('home');
   
//about
   Route::get('/about', 'HomeController@about')->name('about');

//users
   Route::resource('users', 'UsersController', ['only' => ['show']]);

//commnts
   Route::resource('comments', 'CommentsController', ['only' =>['store','destroy']]);

//posts
   Route::resource('posts', 'PostsController', ['only' =>['index','store','show', 'destroy']]);
   

//replies
   Route::resource('replies', 'RepliesController', ['only' =>['index','create','store','destroy']]);

//group home
   Route::resource('group', 'GroupsController');

//chats
   Route::resource('chats', 'ChatsController', ['only' =>['index','store','destroy']]);

//results
   Route::resource('results', 'ResultsController', ['only' =>['index']]);
   Route::get('results/groupsearch', 'ResultsController@groupsearch');

// notifications
   Route::delete('/', 'NotificationsController@destroy')->name('notifications.destroy');

   
//borrow
  // Route::get('/group/borrow', 'PostsController@index');

//lend
  // Route::get('/group/lend', 'ItemsController@index');


   
//user_prefix
   Route::group(['prefix' => 'users/{id}'], function (){
      //users
      Route::get('edit', 'UsersController@edit') ->name('users.edit');
      Route::put('update', 'UsersController@update')->name('users.update');
   });
   
   
   Route::group(['prefix' => 'groups/{id}'], function (){
    Route::post('follow', 'GroupUserController@store')->name('user.follow');
    Route::delete('unfollow', 'GroupUserController@destroy')->name('user.unfollow');
    Route::get('borrow','PostsController@borrow')->name('posts.borrow');
    Route::get('lend','ItemsController@lend')->name('items.lend');
    Route::post('lend/store','ItemsController@store')->name('items.store');
    Route::get('items/index', 'ItemsController@index')->name('items.index');
    
   });
    Route::group(['prefix' => 'items/{id}'], function (){
      Route::delete('/', 'ItemsController@destroy')->name('items.destroy');
      Route::get('edit', 'ItemsController@edit')->name('items.edit');
      Route::put('update', 'ItemsController@update')->name('items.update');
       Route::get('items/show','ItemsController@show')->name('items.show');
      });

   
});


Auth::routes();
