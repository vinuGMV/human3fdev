<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    public function department()
    {
    	 return $this->BelongsTo(Department::class);
    }

    public function Scopesearch($query,$terms){
    	$terms = explode(' ', $terms);
    	//dd($terms);
    	foreach ($terms as $term) {
    		$query->orWhere('name','like','%'.$term.'%');  
    	}

    	return $query;
    }
}
