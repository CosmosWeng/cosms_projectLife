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
Route::auth();

Route::get('/', 		['as' => 'home.index',			'uses' => 'Common\HomeController@index']);
Route::get('about',		['as' => 'about.index',			'uses' => 'Information\AboutController@index']);
Route::get('contact' ,	['as' => 'contacts.create', 	'uses' => 'Information\ContactsController@create']);
Route::post('contact',	['as' => 'contacts.store', 		'uses' => 'Information\ContactsController@store']);

Route::get('animate_newlession', ['as' => 'animateNewLession.index',	'uses' => 'Animate\AnimatelessionController@index']);
Route::get('animate/analysis', ['as' => 'animateNewLession.analysis',	'uses' => 'Animate\AnimatelessionController@analysis']);
Route::get('animate_list', ['as' => 'animate.list',	'uses' => 'Animate\AnimateController@index']);
Route::get('animate_list/getdata', ['as' => 'animate.getdata',	'uses' => 'Animate\AnimateController@getdata']);



Route::get('article',	['as' => 'article.list',		'uses' => 'Admin\Post\PostsController@lists']);
Route::get('article/{id}', ['as' => 'article.detail',	'uses' => 'Admin\Post\PostsController@show']);

Route::post('message',	['as' => 'message.store',	'uses' => 'Admin\Message\MessageController@store']);




Route::group(['middleware'=>'auth','namespace'=>'Admin','prefix' => 'admin'],function(){

	Route::get('/', 				['as' => 'admin.index', 'uses' => 'Home\AdminController@index']);
	
	Route::get('article/', 			['as' => 'article.index',	'uses' => 'Post\PostsController@index']);
	Route::get('article/create',	['as' => 'article.create',	'uses' => 'Post\PostsController@create']);
	Route::post('article',			['as' => 'article.store',	'uses' => 'Post\PostsController@store']);

	Route::get('article/{id}/edit',	['as' => 'article.edit',	'uses' => 'Post\PostsController@edit']);

	//Route::get('article/{id}/category', 		['as' => 'article.category','uses' => 'Post\PostsController@index']);

	Route::patch('article/{id}'   , ['as' => 'article.update',	'uses' => 'Post\PostsController@update']);
	Route::delete('article/{id}',	['as' => 'article.destroy',	'uses' => 'Post\PostsController@destroy']);



	//Article Category
	Route::get('article_category', 			['as' => 'category.index',	'uses' => 'Post\CategoryController@index']);
	Route::get('article_category/create',	['as' => 'category.create',	'uses' => 'Post\CategoryController@create']);
	Route::post('article_category',			['as' => 'category.store',	'uses' => 'Post\CategoryController@store']);

	Route::get('article_category/{id}/edit',	['as' => 'category.edit',	'uses' => 'Post\CategoryController@edit']);

	Route::patch('article_category/{id}'   , ['as' => 'category.update',	'uses' => 'Post\CategoryController@update']);
	Route::delete('article_category/{id}',	['as' => 'category.destroy',	'uses' => 'Post\CategoryController@destroy']);

	//Message
	Route::get('message', 			['as' => 'message.index',	'uses' => 'Message\MessageController@getlist']);
	Route::get('message/{id}/edit', ['as' => 'message.edit',	'uses' => 'Message\MessageController@getform']);
//	Route::post('message',			['as' => 'message.store',	'uses' => 'Message\MessageControlle@store']);
	Route::patch('message/{id}'   , ['as' => 'message.update',	'uses' => 'Message\MessageController@update']);
	Route::delete('message/{id}',	['as' => 'message.destroy',	'uses' => 'Message\MessageController@destroy']);


	//ACG
	Route::get('animate_list', 			['as' => 'animate.index',	'uses' => 'Animate\ManageController@index']);
	Route::post('animate_list', 			['as' => 'animate.post',	'uses' => 'Animate\ManageController@index']);
	Route::get('animate_list/{id}/edit', ['as' => 'animate.edit',	'uses' => 'Animate\ManageController@getform']);
	Route::patch('animate_list/{id}'   , ['as' => 'animate.update',	'uses' => 'Animate\ManageController@update']);
	Route::delete('animate_list/{id}',	['as' => 'animate.destroy',	'uses' => 'Animate\ManageController@destroy']);

});



//Route::get('article/{id}',	['as' => 'article.show'   , 'uses' => 'Post\PostsController@show']);
//Route::resource('article','Post\PostsController');




/*

Route::get('about', ['as' => 'about.index', 'uses' => 'AboutController@index']);

Route::get('posts'              , ['as' => 'posts.index'  , 'uses' => 'PostsController@index']);
Route::get('random'             , ['as' => 'posts.random' , 'uses' => 'PostsController@random']);
Route::get('posts/{id}'         , ['as' => 'posts.show'   , 'uses' => 'PostsController@show']);
Route::get('posts/create'       , ['as' => 'posts.create' , 'uses' => 'PostsController@create']);
Route::post('posts'             , ['as' => 'posts.store'  , 'uses' => 'PostsController@store']);
Route::get('posts/{id}/edit'    , ['as' => 'posts.edit'   , 'uses' => 'PostsController@edit']);
Route::patch('posts/{id}'       , ['as' => 'posts.update' , 'uses' => 'PostsController@update']);
Route::delete('posts/{id}'      , ['as' => 'posts.destroy', 'uses' => 'PostsController@destroy']);
Route::post('posts/{id}/comment', ['as' => 'posts.comment', 'uses' => 'PostsController@comment']);

Route::get('contact' , ['as' => 'contacts.create', 'uses' => 'ContactsController@create']);
Route::post('contact', ['as' => 'contacts.store', 'uses' => 'ContactsController@store']);

*/


Route::auth();

Route::get('/home', 'HomeController@index');
