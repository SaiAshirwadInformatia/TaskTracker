<?php

class TasksV1_model extends MY_Model
{
	private $commentRequiredFileds;
	private $commentTable;

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

		$this->commentTable = 'tasks_comments' ;

		$this->commentRequiredFileds = [
				'task_id' => 'task_id is required',
				'user_id' => 'user_id is required',
				'comment' => 'comment is required'
			];

		parent::__construct(); 
	}

	public function statusUpdate($param){
		$ret = [];
		if($param['state']){
			$data = [
				'state' => $param['state']
			];
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
		}
		return $ret;
	}
	public function getByState($param){
		$returnArr = [];
		if($param['state'] and $param['release_id']){
			$this->db->select('T.*, U.id as user_id, U.fname AS user_fname, U.lname AS user_lname');
			$this->db->from('tasks T');
			$this->db->join('releases R', 'R.id = T.release_id');
			$this->db->join('projects P', 'R.project_id = P.id');
			$this->db->join('team_members TM', 'TM.team_id = P.team_id');
			$this->db->join('users U', 'TM.user_id = U.id');
			$this->db->where('T.state',$param['state']);
			$this->db->where('T.release_id',$param['release_id']);
			$data =  $this->db->get()->result_array();
			foreach ($data as $value) {
				if(!isset($returnArr[$value['id']])){
					$value['team_members'] = [];
					$returnArr[$value['id']] = $value;

				}
				$returnArr[$value['id']]['team_members'][] = [
					'id' => $value['user_id'],
					'name' => $value['user_fname'] . ' ' . $value['user_lname']
				];
				unset($returnArr[$value['id']]['user_fname']);
				unset($returnArr[$value['id']]['user_lname']);
				unset($returnArr[$value['id']]['user_id']);
			}
			if(count($returnArr) === 0){
				$returnArr = [
					'state' => 'No record found'
				];
			}else{
				$returnArr = array_values($returnArr);
			}
		}else{
			$returnArr = [
				'key' => "Key must be 'state' and 'release_id'"
			];
		}
		return $returnArr;
	}

	public function taskComments($param) {	

		var_dump($param);die();

		$error = [];
		$data = [];
		$isValid = true;
		foreach($this->commentRequiredFileds as $key => $value ){
			if(!array_key_exists($key, $param)){
				$error[] = $value;
				$isValid = false;
			}
		}
		foreach($param as $key => $value ){
			if(!array_key_exists($key, $this->commentRequiredFileds)){
				$error[] = $key.' key is not required';
				$isValid = false;
			}
		}
		if($isValid){
			if($this->db->insert($this->commentTable,$param)){
				$data = [
					'msg' => 'Successfully added new Comment',
					'id' => $this->db->insert_id()
				]; 
			}else{
				$data = [
					'error_msg' => $this->db->error()
				];
			}
		}
		if(count($error) > 0){
			$ret = [
				'status' => KO,
				'error' => $error,
				];
		}else{
			$ret = $data;
		}
		return $ret;

	}

}

?>