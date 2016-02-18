<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DepartmentController extends Controller
{
    public function index($university,$SchoolOrCollege){
    
		

			
		

		

			return $SchoolOrCollege->departments;
		

    	
    }

      public function show($university,$SchoolOrCollege,$department){
    if($department->departmentof->slug == $SchoolOrCollege->slug)
  		{echo 1;}
    }
}
