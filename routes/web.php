<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Auth
Auth::routes();

//首页
Route::get('/', 'HomeController@index')->name('home');

//文章列表页
Route::get('/article/list', 'ArticleController@list')->name('article.list');

//文章资源路由
Route::get('article/{article}', 'ArticleController@show')->name('article.show');

//markdown AJAX 解析
//Route::post('/markdown', 'ArticleController@markdown')->name('markdown');

//markdown AJAX 获取文章内容
Route::get('/markdown/{article}', 'ArticleController@markdown_article')->name('markdown.article');



//评论资源路由
Route::post('/comments', 'CommentsController@store')->middleware('throttle:5')->name('comments.store');

//回复（评论）资源路由
Route::post('/replys', 'ReplysController@store')->middleware('throttle:5')->name('replys.store');



//
//Route::get('/', function () {
//    return view('welcome');
//});
