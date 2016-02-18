<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public function departmentof()
    {
    	return $this->MorphTo();
    }

    public function faculty()
    {
    	 return $this->hasMany(Faculty::class);
    }
}
