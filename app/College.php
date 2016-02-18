<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    public function university() {

    	return $this->BelongsTo(University::class);

    }

    public function departments() {

    	return $this->morphMany(Department::class,'departmentof');

    }
}
