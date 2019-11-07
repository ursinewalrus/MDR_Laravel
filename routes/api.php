<?php

use Illuminate\Http\Request;
use App\Department;
use App\Student;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



//I just prefer posts with parameters to provide context, 
//if prior convention establishes differently though I will use that instead
Route::post('students/add_student', 'StudentController@add_student');
Route::post('departments/add_department', 'DepartmentController@add_department');

Route::post('students/{id}', 'StudentController@update');
Route::post('departments/{id}', 'DepartmentController@update');

Route::get('departmentStats', "DepartmentController@stats");

Route::get('departments/{id}/students', 'DepartmentController@students');

Route::get('students', function(){
	return Student::all();
});

Route::get('departments', function(){
	return Department::all();
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
