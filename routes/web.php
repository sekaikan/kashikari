<?php


Route::get('/', 'WelcomeController@index');

//about
Route::get('/about', 'HomeController@about')->name('about');


Route::group(['middleware' => ['auth']], function () {
//Home
   Route::get('/home','HomeController@index')->name('home');
   
//users
   Route::resource('users', 'UsersController', ['only' => ['show']]);

//commnts
   Route::resource('comments', 'CommentsController', ['only' =>['store','destroy']]);


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
   Route::delete('/', 'NotificationsController@purge')->name('notifications.purge');
   

  
//borrow
  // Route::get('/group/borrow', 'PostsController@index');

//lend
  // Route::get('/group/lend', 'ItemsController@index');


//items
   Route::group(['prefix' => 'items/{id}'], function (){
      Route::delete('/', 'ItemsController@destroy')->name('items.destroy');
      Route::get('edit', 'ItemsController@edit')->name('items.edit');
      Route::put('update', 'ItemsController@update')->name('items.update');
      Route::put('want', 'UserItemsController@update')->name('want');
      Route::get('want', 'ItemsController@show')->name('want');
      Route::get('/','ItemsController@show')->name('items.show');
   });

//user_prefix
   Route::group(['prefix' => 'users/{id}'], function (){
      //users
      Route::get('edit', 'UsersController@edit') ->name('users.edit');
      Route::put('update', 'UsersController@update')->name('users.update');
   });

//posts
   Route::resource('posts', 'PostsController', ['only' =>['show', 'destroy']]);
   
   
   Route::group(['prefix' => 'group/{id}'], function (){
    Route::post('follow', 'GroupUserController@store')->name('user.follow');
    Route::delete('unfollow', 'GroupUserController@destroy')->name('user.unfollow');
    Route::get('borrow','PostsController@borrow')->name('posts.borrow');
    Route::get('lend','ItemsController@lend')->name('items.lend');
    Route::post('lend/store','ItemsController@store')->name('items.store');
    Route::get('items/index', 'ItemsController@index')->name('items.index');
    Route::post('borrow/store','PostsController@store')->name('posts.store');
    Route::get('posts/index', 'PostsController@index')->name('posts.index');
    Route::get('userlist','GroupsController@userlist')->name('group.userlist');
   });

});


Auth::routes();
