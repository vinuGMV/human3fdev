<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\University;
use App\College;


class CollegeController extends Controller
{
    public function index($university){
    
		return $university->colleges;
    	
    }

    public function show($university,$college){

    	return $college->name;
    }
}
