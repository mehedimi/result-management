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
	Route::get('student/create', [
		'uses' => 'StudentController@create',
		'as' => 'student.create'
	]);
	Route::get('student/search', [
		'uses' => 'StudentController@search',
		'as' => 'student.search'
	]);
	Route::post('student/create', [
		'uses' => 'StudentController@store',
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
	Route::get('department/create', [
		'uses' => 'DepartmentController@create',
		'as' => 'department.create'
	]);
	Route::post('department/create', [
		'uses' => 'DepartmentController@store',
	]);
	Route::get('department/{department}/edit', [
		'uses' => 'DepartmentController@edit',
		'as' => 'department.edit'
	]);
	Route::put('department/{department}/edit', [
		'uses' => 'DepartmentController@update',
	]);
	Route::get('add-subject/{department}/department', [
		'uses' => 'DepartmentController@addSubject',
		'as' => 'department.add.subject'
	]);
	Route::get('department/{department}/semester/{semester}', [
		'uses' => 'DepartmentController@addSubjectWithSemester',
		'as' => 'department.subject.add'
	]);
	Route::post('assign-subject/department/{department}/semester/{semester}', [
		'uses' => 'DepartmentController@assignSubject',
		'as' => 'assign.subject'
	]);
	/**
	 * Subject 
	 * **/
	Route::resource('subject', 'SubjectController', ['except' => ['show']]);

	// Group Route Section
	Route::get('group/{department}/create', [
		'uses' => 'GroupController@index',
		'as' => 'group.index'
	]); 
	Route::post('group/{department}/create', [
		'uses' => 'GroupController@store',
	]); 
	//  End Group Route Section 


});

