<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    protected $fillable=['name','father_name','address','phone_no','class_id','grade_id'];

    // public function grades()
    // {
    // 	return $this->belongsTo('App\Grade','grade_id');
    // }

    // public function classes()
    // {
    // 	return $this->belongsTo('App\ClassName','class_id');
    // }
}
