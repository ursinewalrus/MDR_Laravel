<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
	//table
    protected $table = 'departments';
    //PK
    protected $primaryKey = 'id';
    //department property
    protected $fillable = ['name'];

    public function students ()
    {
    	return $this->hasMany('App\Student', 'dept_id');
    }
}
