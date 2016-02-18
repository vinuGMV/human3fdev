<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Faculty;

class FacultyController extends Controller
{
    public function index($university,$SchoolOrCollege,$department){

    	if($department->departmentof->slug == $SchoolOrCollege->slug && $department->departmentof->id === $SchoolOrCollege->id){

return $department->faculty;


    	}else{
            return abort(404);
        }
    	


    }

    public function show($university,$SchoolOrCollege,$department,Faculty $faculty){
    	if($department->departmentof->id === $SchoolOrCollege->id && $faculty->department->id === $department->id){
    		echo $faculty->name;

            echo $faculty->department->name;



    	}else{
            return abort(403, 'Unauthorized action.');
        }
        

    }
}
