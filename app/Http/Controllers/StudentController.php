<?php

use \App\Student;
use \App\Department;

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
	/*
	send formdata with the format
	{
	"name":"new name"
	}
	*/
    public function update(Request $req, $id)
    {
    	try
   		{
        	$student = \App\Student::findOrFail($id);
    		$new_name = $req['name'];
    		if($new_name == "" || $new_name == null)
    		{
    			return "invalid name";
    		}
    		$student->name = $new_name;
    		$student->save();
    		return $student;
    	}
    	catch(Exception $ex)
    	{
    		//not too concerned about error type in this scenario 
    		return "ERROR";
    	}
    	return $req;
    }

    public function add_student(Request $req)
    {
    	//2 people could have the same name, realistically something else would distringuish them, an email address perhaps
    	$args = $req->only('name', 'gender', 'dept_id');
    	//make sure a valid dept
    	//could preform a similar check with gender, make sure
    	//it's off a list we have, perhaps in the db
    	//to prevent malilcious insertions
    	if(in_array($args['dept_id'], DepartmentController::ids()) && ctype_alnum ($args['name'])){
    		return \App\Student::create($args);
    	}
    	else
    	{ //realisitically we would probably make some default error class and have its return be based on arguments
    		return "invalid dept";
    	}

    }
}
