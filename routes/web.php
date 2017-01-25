<?php


/**
 * Search Page
 */
Route::get('/', [
	'uses' => 'ResultShowController@index',
	'as' => 'home.index'
]);
Route::get('/result/find', [
	'uses' => 'ResultShowController@showResult',
	'as' => 'home.result'
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
	Route::delete('remove/subject/{subject}/department/{department}', [
		'uses' => "DepartmentController@removeSubject",
		'as' => 'subject.remove'
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
	/**
	 * Result Route
	 */
	Route::get('result', [
		'uses' => 'ResultAdminController@index',
		'as' => 'result.index'
	]);
	Route::get('result/department/{department}', [
		'uses' => 'ResultAdminController@selectSemester',
		'as' => 'result.select.dep'
	]);
	Route::get('result/department/{department}/semester/{semester}', [
		'uses' => 'ResultAdminController@selectStudent',
		'as' => 'result.select.stu'
	]);
	Route::get('result/student/{student}/semester/{semester}', [
		'uses' => 'ResultAdminController@addResult',
		'as' => 'result.add'
	]);
	Route::post('result/student/{student}/semester/{semester}', [
		'uses' => 'ResultAdminController@storeResult',
	]);
	Route::get('result/student/{student}/semester/{semester}/view', [
		'uses' => 'ResultAdminController@showResult',
		'as' => 'result.show'
	]);

});

