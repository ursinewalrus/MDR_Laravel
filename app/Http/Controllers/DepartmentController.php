<?php

use \App\Department;
use \App\Student;

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DepartmentController extends Controller
{

    public static function ids()
    {
        return \App\Department::get()->map->only(['id'])->pluck('id')->toArray();
    }
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
        	$department = \App\Department::findOrFail($id);
    		$new_name = $req['name'];
    		if($new_name == "" || $new_name == null)
    		{
    			return "invalid name";
    		}
    		$department->name = $new_name;
    		$department->save();
    		return $department;
    	}
    	catch(Exception $ex)
    	{
    		//we could filter it by error type if we wanted, 
    		return "ERROR";
    	}
    	return $req;
    }

    public function add_department(Request $req)
    {
    	$args = $req->only('name');
    	if(ctype_alnum($args['name'])){
    		return \App\Department::create($args);   		
    	}
    	{
    		return "I can imagine non alphanumeric characters being in a dep name but probably not";
    	}
    }

    public function stats()
    {
        $results = array();
       foreach(DepartmentController::ids() as $id)
       {
            $results[\App\Department::find($id)['name']] = count(\App\Department::findOrFail($id)->students);
       }
        // return \App\Department::findOrFail(1)->pluck('name');
       //$results = arsort($results);
       arsort($results);
       return $results;
    }

    public function students(Request $req, $id)
    {
    	return \App\Department::findOrFail($id)->students;
    }

}
