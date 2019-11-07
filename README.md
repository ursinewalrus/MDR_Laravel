One thing I changed is MySQL has a bit of a messy install on this computer so I changed the config files to use
a SQLite DB called DB.sqlite
To get the driver to work for it here I had to edit my php.ini file and un comment out the lines related to sqlite. I was using windows with apache but no matter your setup you may need to do this if you havn't already.
Tested mostly with Postman, in a larger or more complex project writing a suite of unit tests first and then making the endpoings might be the way to go. The endpoints that update or insert a student or department take just form data.

* Adds a students/departments to database -> accepts json form data, I just used postman to check it would update
* if you set up my sqlite db you should see my edits. Will only allow you to update name, gender and dept_id
{
"name":"test",
"gender":"m",
"dept_id":1
}
Route::post('students/add_student', 'StudentController@add_student');
Route::post('departments/add_department', 'DepartmentController@add_department');

* Returns the number of students that are majoring in each department sorted in descending number of students.
Route::get('departmentStats', "DepartmentController@stats");

* Returns all students that belong to a department
Route::get('departments/{id}/students', 'DepartmentController@students');


Routes with what challenge part they answer

* Returns all students and departments
Route::get('departments', function(){
	return Department::all();
});
Route::get('students', function(){
	return Student::all();
});


* Updates name of student or department by id
{
"name":"newname"
}
Route::post('students/{id}', 'StudentController@update');
Route::post('departments/{id}', 'DepartmentController@update');
