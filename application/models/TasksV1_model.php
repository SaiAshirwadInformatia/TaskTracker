<?php

class TasksV1_model extends MY_Model
{
	public function __construct()
	{
		$this->table = 'tasks';
		$this->id = 'id';
		$this->string_key = 'title';
		$this->required = [
			'title' => 'Task title required',
			'type' => 'Task type requuired',
			'release_id' => 'Release ID required',
			'user_id' => 'User ID required'
		];
		$this->fields = [
			'id',
			'title',
			'description',
			'type',
			'release_id',
			'user_id',
			'assigned_id',
			'due_date',
			'strat_ts',
			'end_ts'
		];

		parent::__construct(); 
	}

	public function statusUpdate($param){
		if($param['state']){
			$data = [
				'state' => $param['state']
			];
		}
		if($this->db->update('tasks',$data,['id' => $param['id']])){
			$ret = [
				'id' => $param['id'],
				'status' => OK
			];
		}else{
			$ret = [
				'status' => ko
			];
		}
		return $ret;
	}
}

?>