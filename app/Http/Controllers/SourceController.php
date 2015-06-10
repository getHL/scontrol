<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use App\SourceState;
use Carbon\Carbon;

class SourceController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function newest() {
		$v = Validator::make(Input::all(), [
				'stage' => 'required|numeric',
				'source' => 'required|numeric'
		]);
		if ($v->fails()){
			return response($v->messages(), 404);
		}
		
		$sourceState = new SourceState(Input::get('stage'), Input::get('source'));
		return response()->json($sourceState->getNewestData());
	}
	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function dataOfDay() {
		$v = Validator::make(Input::all(), [
				'stage' => 'required|numeric',
				'source' => 'required|numeric'
		]);
		if ($v->fails()){
			return response($v->messages(), 404);
		}
		
		$carbon = Carbon::now();
		
		$sourceState = new SourceState(Input::get('stage'), Input::get('source'));
		return response()->json($sourceState->getDataOfDay(
					$carbon->year,
					$carbon->month,
					$carbon->day
				));
	}
	
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store() {
		//
	}
	
	/**
	 * Display the specified resource.
	 *
	 * @param int $id        	
	 * @return Response
	 */
	public function show($id) {
		//
	}
	
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param int $id        	
	 * @return Response
	 */
	public function edit($id) {
		//
	}
	
	/**
	 * Update the specified resource in storage.
	 *
	 * @param int $id        	
	 * @return Response
	 */
	public function update($id) {
		//
	}
	
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param int $id        	
	 * @return Response
	 */
	public function destroy($id) {
		//
	}
}
