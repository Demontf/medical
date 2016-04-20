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

Route::auth();

Route::group(['middleware'=>'auth'],function(){
	Route::get('/home', 'HomeController@index');

	Route::get('/role/all', 'RoleController@getAll');
	Route::get('/role/toAdd', 'RoleController@toAdd');
	Route::match(['post','get'],'/role/add', 'RoleController@add');
	Route::match(['get','post'],'/role/edit/{id}', 'RoleController@edit');
	Route::match(['get','post'],'/role/update', 'RoleController@update');



	Route::get('/permission/webAll', 'PermissionController@getWebAll');
	Route::get('/permission/list', function(){return view('permission.website');});
	Route::get('/permission/toAdd', function(){return view('permission.add');});
	Route::match(['get','post'],'/permission/edit/{id}', 'PermissionController@edit');
	Route::match(['get','post'],'/permission/add', 'PermissionController@add');
	Route::match(['get','post'],'/permission/update', 'PermissionController@update');

	Route::get('/user/all','UserController@getAll');
	Route::match(['get','post'],'/user/editRole/{id}','UserController@editRole');
	Route::match(['get','post'],'/user/updateRole','UserController@updateRole');


	
});


	Route::match(['get','post'],'/service/permissionList','ServiceController@getWebPermissionList');
	Route::match(['get','post'],'/service/login','ServiceController@login');
	Route::match(['get','post'],'/service/register','ServiceController@register');





