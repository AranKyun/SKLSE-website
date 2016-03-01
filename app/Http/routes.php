<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
 */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group ap`plies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
 */

Route::group(['middleware' => 'web'], function () {
	Route::auth();

	Route::get('/home', 'HomeController@index');
	Route::get('/', 'HomepageController@index');
	Route::group(['prefix' => 'news'], function () {
		Route::get('/', 'NewsController@index');
		Route::get('/{id}', 'NewsController@show');
	});

	//实验室概况
	Route::group(['prefix' => 'lab'], function () {

		Route::get('/', function () {
			return view('lab.intro')->withNavSelection(1);
		});

		Route::get('/talent', function () {
			return view('lab.talent')->withNavSelection(1);
		});

		Route::get('/facility', function () {
			return view('lab.facility')->withNavSelection(1);
		});

	});

	//科学研究
	Route::group(['prefix' => 'study'], function () {

		Route::get('/', function () {
			return view('study.team')->withNavSelection(2);
		});

		Route::get('/project', function () {
			return view('study.project')->withNavSelection(2);
		});

		Route::get('/achieve', function () {
			return view('study.achieve')->withNavSelection(2);
		});

	});

	Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'isAdmin']], function () {
		Route::get('/', 'AdminController@index');
		Route::get('/homepage/', 'HomepageController@index');
		Route::post('/homepage/news', 'HomepageController@news');
		Route::post('/homepage/spotlight', 'HomepageController@spotlight');
		Route::post('/homepage/blog', 'HomepageController@blog');
		Route::resource('/news', 'NewsController');
		Route::get('/news/{id}/delete', 'NewsController@delete');
		Route::get('/user', 'UserController@index');
		Route::get('/user/reset', 'UserController@reset');
	});

	//个人博客

	Route::group(['prefix' => 'blog', 'namespace' => 'Blog'], function () {
		//blog index
		Route::get('/', 'BlogController@index');

		//user blog homepage
		Route::get('/{id}/home', 'BlogController@home')->where('id', '[0-9]+');
		Route::get('/{id}/home/articles', 'BlogController@list')->where('id', '[0-9]+');
		//search blog articles by title
		Route::get('/{id}/home/search', 'BlogController@search')->where('id', '[0-9]+');

		//file&zip download
		Route::get('/{id}/home/download', 'DownloadController@index')->where('id', '[0-9]+');
		Route::get('/{id}/home/download/file/zip', 'DownloadController@downloadzip')->where('id', '[0-9]+');
		Route::get('/{id}/home/download/{filename}', 'DownloadController@download')->where('id', '[0-9]+');

		Route::get('/{id}/home/{article_id}', 'BlogController@show')->where(['id' => '[0-9]+', 'article_id' => '[0-9]+']);

		Route::group(['middleware' => ['auth']], function () {

			Route::resource('{id}/home/{article_id}/comment', 'ArticleController@comment');

			//personal setting
			Route::get('{id}/admin/set', 'BlogController@set')->where('id', '[0-9]+');
			Route::post('{id}/admin/set/store', 'BlogController@setstore')->where('id', '[0-9]+');

			//files upload
			Route::resource('/{id}/admin/uploads', 'UploadController');

			//blog articles&comment

			Route::resource('/{id}/admin', 'ArticleController');
			Route::resource('/{id}/admin/{article_id}', 'ArticleController@show');
		});

	});
});