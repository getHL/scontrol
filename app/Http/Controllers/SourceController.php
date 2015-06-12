<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use App\SourceState;
use Carbon\Carbon;
use App\Source;

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
        if ($v->fails()) {
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
        if ($v->fails()) {
            return response($v->messages(), 404);
        }
        
        $carbon = Carbon::now();
        
        $sourceState = new SourceState(Input::get('stage'), Input::get('source'));
        return response()->json($sourceState->getDataOfDay($carbon->year, $carbon->month, $carbon->day));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function pushData() {
        $v = Validator::make(Input::all(), [
            'stage' => 'required|numeric',
            'source' => 'required|numeric',
            'vol1' => 'required|numeric',
            'volz1' => 'required|numeric',
            'cur1' => 'required|numeric',
            'vol2' => 'required|numeric',
            'volz2' => 'required|numeric',
            'cur2' => 'required|numeric'
        ]);
        if ($v->fails()) {
            return response($v->messages(), 404);
        }
        
        $data = [
            'vol1' => Input::get('vol1'),
            'volz1' => Input::get('volz1'),
            'cur1' => Input::get('cur1'),
            'vol2' => Input::get('vol2'),
            'volz2' => Input::get('volz2'),
            'cur2' => Input::get('cur2')
        ];
        
        $sourceState = new SourceState(
            Input::get('stage'), 
            Input::get('source')
        );
        
        $sourceState->saveNewData($data);
        
        $json = [
            'state' => 'success',
            'data' => $data
        ];
        return response()->json($json);
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
