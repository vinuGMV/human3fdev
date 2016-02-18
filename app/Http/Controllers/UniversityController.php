<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\University;

class UniversityController extends Controller
{
    public function index(){

    	$universities =  University::Year()->get();

    	


return $universities;

    }



    public function show(University $university){

    	return $university->with('schools')->attach('departments')->get();
    }
}
