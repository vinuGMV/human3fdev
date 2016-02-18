<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    public function university() {

    	return $this->BelongsTo(University::class);

    }

    public function departments() {

    	return $this->morphMany(Department::class,'departmentof');

    }

    public function Scopesearch($query,$terms){

  
    	$terms = explode(' ', $terms);
    	foreach ($terms as $term) {
    		$query->orWhere('name','like','%'.$term.'%');  
    	}

    	return $query;
    }
}
