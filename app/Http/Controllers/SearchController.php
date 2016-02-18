<?php

namespace App\Http\Controllers;



use App\Http\Requests\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Faculty;
use App\School;



class SearchController extends Controller
{
    public function appendValue($data, $type, $element)
	{
		// operate on the item passed by reference, adding the element and type
		foreach ($data as $key => & $item) {
			$item[$element] = $type;
		}
		return $data;		
	}

	public function appendURL($data, $prefix)
	{
		// operate on the item passed by reference, adding the url based on slug
		foreach ($data as $key => & $item) {
			

			$item['department'] = Faculty::findOrFail($item['id'])->department;
			$item['url'] = url($prefix.'/'.$item['department']->slug);
			
		}
		return $data;		
	}

	public function index($term)
	{
		$query = $term;

		if(!$query && $query == '') return Response::json(array(), 400);

		//$query = explode(' ', $query );

		$Faculty = Faculty::search($query)
			->orderBy('name','asc')
			->take(5)
			->get(array('id','name','slug'))->toArray();

		$Paper = School::search($query)
		
			->take(5)
			->get(array('id','name','slug'))
			->toArray();

		
		// Add type of data to each item of each set of results
		$Faculty = $this->appendValue($Faculty, 'Faculty', 'class');
		$Paper = $this->appendValue($Paper, 'Paper', 'class');

		$Faculty 	= $this->appendURL($Faculty, 'Faculty');
		$Paper  = $this->appendURL($Paper, 'Papers');

		

		// Merge all data into one array
		$data = array_merge($Faculty, $Paper);

		return \Response::json(array(
			'data'=>$data
		));
	}
}
