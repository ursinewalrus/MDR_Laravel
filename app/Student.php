<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //table
    protected $table = 'students';
    //PK
    protected $primaryKey = 'id';
    //attrs
    protected $fillable = ['name','gender','dept_id'];

}
