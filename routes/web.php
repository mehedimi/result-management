<?php

/**
 * Home Page
 */
Route::get('home', [
	'uses' => 'HomeController@index',
	'as' => 'home.page'
]);
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

/**
 * Student Route
 */
Route::get('students', [
	'uses' => 'StudentController@index',
	'as' => 'student.index'
]);
