<?php

class TeamsV1_model extends MY_Model
{
	public function __construct()
	{
		$this->table = 'teams';
		$this->id = 'id';
		$this->string_key = 'name';
		$this->required = [
			'name' => 'Team name required',
		];
		$this->fields = [
			'id',
			'name',
			'description'
		];
		$this->unique = [
			'key' => [
				'key'
			]
		];

		parent::__construct(); 
	}

	function teamSearchByTask($param){
		$data =[];
		if($param['task_id']){
			$this->db->select('U.*');
			$this->db->from('tasks T');
			$this->db->join('releases R','R.id = T.release_id');
			$this->db->join('projects P', 'R.project_id = P.id');
			$this->db->join('team_members TM','TM.team_id = P.team_id');
			$this->db->join('users U','U.id = TM.user_id');
			$this->db->where('T.id',$param['task_id']);
			$data = $this->db->get()->result_array();

		}else{
			$data = [
				'Status' => 'No record found'
			];
		}

		return $data;

	}
}

?>