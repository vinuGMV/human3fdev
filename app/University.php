<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    public function schools()
    {
    	return $this->hasMany(School::class);
    }

     public function colleges()
    {
    	return $this->hasMany(College::class);
    }

    public function scopeYear($query,$year=NULL){

    	return $year ? $query->where('year', '>', $year) : false;
    }
}
