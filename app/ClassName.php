<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassName extends Model
{
    //
    	protected $table="cclasses";
        protected $fillable=['name','grade_id'];
        public function grades()
        {
        	return $this->belongsTo('App\Grade','grade_id');
        }
}
