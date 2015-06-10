<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\SourceState;
use Carbon\Carbon;
use App\Source;

class test extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function test() {
		$testObj = new SourceState ( 1, 1 );
		return response ()->json ( $testObj->getNewestData () );
	}
	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function test1() {
		$testObj = new SourceState ( 1, 1 );
		return $testObj->getDataOfDay ( '2015', '06', '10' );
	}
	
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function testInsert() {
		$carbon = Carbon::createFromDate(2015, 6, 10);
		for($i = 1; $i < 5 * 60 * 24; $i ++) {
			$model = new Source();
			$model->database = 'SDMDYdata_1';
			$model->table = 'D2015_06_10_1';
			$model->stageId = 1;
			$model->sourceId = 1;
			$model->savetime = $carbon->toDateTimeString();
			$model->vol1 = rand(1, 999);
			$model->volz1 = rand(1, 999);
			$model->cur1 = rand(1, 999);
			$model->vol2 = rand(1, 999);
			$model->volz2 = rand(1, 999);
			$model->cur2 = rand(1, 999);
			$model->save();
			$carbon->addSeconds(10);
		}
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
