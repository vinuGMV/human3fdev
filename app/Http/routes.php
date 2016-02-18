<?php

Route::group(['middleware' => ['api']], function () {

    /**
     * University API Resource
     */
	Route::resource('/university', 'UniversityController',['only' => ['index', 'show']]);

	/**
     * Schools API Resource
     */
	Route::resource('/university.school', 'SchoolController',['only' => ['index', 'show']]);
	Route::resource('/university.school.department', 'DepartmentController',['only' => ['index','show']]);
	Route::resource('/university.school.department.faculty', 'FacultyController',['only' => ['index','show']]);

	/**
     * Colleges API Resource
     */
	Route::resource('/university.college', 'CollegeController',['only' => ['index', 'show']]);
	Route::resource('/university.college.department', 'DepartmentController',['only' => ['index','show']]);
	Route::resource('/university.college.department.faculty', 'FacultyController',['only' => ['index','show']]);

	/**
	 * Search for Faculty
	 */
	Route::get('/search/{term}','SearchController@index');


	
	


});
