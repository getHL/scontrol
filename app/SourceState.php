<?php
namespace App;

use Carbon\Carbon;
class SourceState{
	
	private $stageId;
	private $sourceId;
	
	public function __construct($stageId, $sourceId){
		$this->stageId = $stageId;
		$this->sourceId = $sourceId;
	}
	
	public function getNewestData(){
		
		$query = '`stageId` = \''.$this->stageId.'\' and '.
			'`sourceId` = \''.$this->sourceId.'\'';
		
		$source = Source::whereRaw($query)
			->get()
			->sortBy('savetime')
			->first();
		
		$json = [
				'vol1' => $source->vol1,
				'volz1' => $source->volz1,
				'cur1' => $source->cur1,
				'vol2' => $source->vol2,
				'volz2' => $source->volz2,
				'cur2' => $source->cur2,
		];
		
		return $json;
		
	}
	
	public function getDataOfDay($year, $month, $day){
		
		$table = 'D'.$year.'_'.$month.'_'.$day.'_'.$this->sourceId;
		
		$query = '`stageId` = \''.$this->stageId.'\' and '.
			'`table` = \''.$table.'\'';
		
		$sources = Source::whereRaw($query)
			->get()
			->sortBy('savetime')
			->toArray();
		
		$count = count($sources);
		$json = [];
		for ($i = 0; $i < $count; $i++){
			if ($i % 30 == 0){
				$source = $sources[$i];
				$json[] = [
					'vol1' => $source['vol1'],
					'volz1' => $source['volz1'],
					'cur1' => $source['cur1'],
					'vol2' => $source['vol2'],
					'volz2' => $source['volz2'],
					'cur2' => $source['cur2'],
				];
			}
		}
		
		return $json;
		
	}
	
	public function saveNewData($data){
	    $carbon = Carbon::now();
	    $table = 'D'.$carbon->year.
    	    '_'.$carbon->month.
    	    '_'.$carbon->day.
    	    '_'.$this->sourceId;
	    
	    $source = new Source();
	    $source->database = 'SDMDYdata_'.$this->stageId;
	    $source->table = $table;
	    $source->stageId = $this->stageId;
	    $source->sourceId = $this->sourceId;
	    $source->savetime = $carbon->toDateTimeString();
	    $source->vol1 = $data['vol1'];
	    $source->volz1 = $data['volz1'];
	    $source->cur1 = $data['cur1'];
	    $source->vol2 = $data['vol2'];
	    $source->volz2 = $data['volz2'];
	    $source->cur2 = $data['cur2'];
	    $source->save();
	}
}