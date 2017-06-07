<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('register',[
//         'as' => 'register',
//         'uses' => 'RegistrationController@create']);

// Route::post('register',[
//         'as' => 'post.register',
//         'uses' => 'RegistrationController@store']);

Route::get('login',[
        'as' => 'login',
        'uses' => 'SessionsController@create']);

Route::get('logout',[
        'as' => 'logout',
        'uses' => 'SessionsController@destroy']);

Route::post('login',[
        'as' => 'post.login',
        'uses' => 'SessionsController@store']);

// Route::get('dashboard',[
//         'as' => 'dashboard',
//         'uses' => 'UserController@dashboard']);

Route::get('profile',[
        'as' => 'profile',
        'uses' => 'UserController@profile']);

Route::get('user/add',[
        'as' => 'add.user',
        'uses' => 'UserController@addUser']);

Route::post('user/add',[
        'as' => 'post.add.user',
        'uses' => 'UserController@postAddUser']);

Route::get('users',[
        'as' => 'user.list',
        'uses' => 'UserController@userList']);

// Route::get('blacklist/word/add',[
//         'as' => 'add.blacklisted.word',
//         'uses' => 'BlacklistedWordsController@create']);

Route::post('blacklist/word/store',[
        'as' => 'post.add.blacklisted.word',
        'uses' => 'BlacklistedWordsController@store']);

Route::get('blacklist/words',[
        'as' => 'blacklisted.words.list',
        'uses' => 'BlacklistedWordsController@index']);

Route::get('messages/inbox',[
        'as' => 'inbox.list',
        'uses' => 'MessageController@inbox']);

Route::get('messages/outbox',[
        'as' => 'outbox.list',
        'uses' => 'MessageController@outbox']);

Route::get('message/send',[
        'as' => 'message.send',
        'uses' => 'MessageController@send']);

Route::post('message/send',[
        'as' => 'message.post.send',
        'uses' => 'MessageController@postSend']);

