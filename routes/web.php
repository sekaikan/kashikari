<?php


Route::get('/', 'WelcomeController@index')->name('welcome');

//about
Route::get('/about', 'HomeController@about')->name('about');

//thank you page
Route::get('/thankyou', function()
{
    return 'thankyou';
});

Route::group(['middleware' => ['auth']], function () {
//Home
   Route::get('/home','HomeController@index')->name('home');
   
//users
    Route::group(['prefix' => 'users/{id}'], function (){
      Route::get('/', 'UsersController@show')->name('users.show');
      Route::get('/posts', 'UsersController@posts')->name('users.posts');
      Route::get('/follows', 'UsersController@groups')->name('users.follows');
    });

//comments
   Route::resource('comments', 'CommentsController', ['only' =>['store','destroy']]);


//replies
   Route::resource('replies', 'RepliesController', ['only' =>['index','create','store','destroy']]);

//group home
   Route::resource('group', 'GroupsController');

//chats
   Route::resource('chats', 'ChatsController', ['only' =>['destroy']]);

//results
   Route::resource('results', 'ResultsController', ['only' =>['index']]);
   Route::get('results/search', 'ResultsController@search')->name('groups.search');


// notifications
   Route::delete('/', 'NotificationsController@destroy')->name('notifications.destroy');
   Route::delete('/notifications/purge', 'NotificationsController@purge')->name('notifications.purge');
   Route::get('/notifications/open_delete', 'NotificationsController@open_delete')->name('notifications.open_delete');
   

  
//borrow
  // Route::get('/group/borrow', 'PostsController@index');

//lend
  // Route::get('/group/lend', 'ItemsController@index');


//items
   Route::group(['prefix' => 'items/{id}'], function (){
      Route::delete('/', 'ItemsController@destroy')->name('items.destroy');
      Route::get('edit', 'ItemsController@edit')->name('items.edit');
      Route::put('update', 'ItemsController@update')->name('items.update');
      Route::put('/', 'UserItemsController@update')->name('want');
      //Route::get('want', 'ItemsController@show')->name('want');
      Route::get('/','ItemsController@show')->name('items.show');
   });

//user_prefix
   Route::group(['prefix' => 'users/{id}'], function (){
      //users
      Route::get('edit', 'UsersController@edit') ->name('users.edit');
      Route::put('update', 'UsersController@update')->name('users.update');
      Route::delete('destroy', 'UsersController@destroy')->name('users.destroy');
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
    Route::get('chats/index', 'ChatsController@index')->name('chats.index');
    Route::post('chats/store','ChatsController@store')->name('chats.store');
   });

});

Route::get('error/{code}', function ($code) {
  abort($code);
});

Auth::routes();
