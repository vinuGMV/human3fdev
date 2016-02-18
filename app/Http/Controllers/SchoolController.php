<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SchoolController extends Controller
{
    public function index($university){
    
		return $university->schools;
    	
    }

    public function show($university,$school){

    	return $school->name;
    }

    
}
