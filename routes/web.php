<?php


/**
 * Search Page
 */
Route::get('/', [
	'uses' => 'ResultShowController@index',
	'as' => 'home.index'
]);
Route::post('/result/search', [
	'uses' => 'ResultShowController@search',
	'as' => 'result.search'
]);

Auth::routes();
Route::group(['middleware' => 'auth'], function(){
	/**
	 * Home Page
	 */
	Route::get('home', [
		'uses' => 'HomeController@index',
		'as' => 'home.page'
	]);

	/**
	 * Student Route
	 */
	Route::get('students', [
		'uses' => 'StudentController@index',
		'as' => 'student.index'
	]);
	Route::get('student/{student}/edit', [
		'uses' => 'StudentController@edit',
		'as' => 'student.edit'
	]);
	Route::post('student/{student}/edit', [
		'uses' => 'StudentController@update',
	]);

	Route::get('departments', [
		'uses' => 'DepartmentController@index',
		'as' => 'department.index'
	]);

});

