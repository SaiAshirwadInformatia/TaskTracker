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


	public function changeAssignedMemberByTaskId($param)
	{
		$ret = [];
		if($param['task_id'] and $param['assigned_id']){
			$this->db->where('id',$param['task_id']);
			$data = [
				'assigned_id' => $param['assigned_id']
			];
			if($this->db->update($this->table,$data)){
				$ret = [
					'status' => OK,
					'task_id' => $param['task_id'],
					'assigned_id' => $param['assigned_id']
				];
			}else{
				$ret = [
					'status' => KO,
					'error' => $this->db->error()		
				];
			}
		}else{
			$ret = [
				'error' => [
					'task_id reqired',
					'assigned_id required'
				]
			];
		}
		return $ret;
	}
}

?>