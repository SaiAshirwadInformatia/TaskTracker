	<?php

class ProjectsV1_model extends MY_Model
{
	
	public function __construct()
	{
		$this->table = 'projects';
		$this->id = 'id';
		$this->string_key = 'key';
		$this->required = [
			'name' => 'Project name required',
			'key' => 'Project key required',
			'color' => 'Project color required'
		];
		$this->fields = [
			'id',
			'name',
			'description',
			'key',
			'color'
		];
		$this->unique = [
			'key' => [
				'key'
			],
			'name_team' => [
				'name',
				'team_id'
			]
		];
		parent::__construct();
		$this->load->database();
	}
	/*
	public function get($param = null)
	{
		// character checking validation
		// if true call base function
		// else directly throw exception
		$ret = parent::get($param);
		return ['output' => $ret];
	}
	*/

	public function isKeyAvailable($param)
	{
		$ret = [
			'error_msg' => 'Please provide param key to validate',
			'error_code' => 1005
		];
		if(isset($param['key']))
		{
			$this->db->where('key', $param['key']);
			$isAvailable = $this->db->get($this->table)->num_rows() === 0;
			if($isAvailable)
			{
				$ret = [
					'msg' => "Key ({$param['key']}) can be used for Project creation",
					'available' => true
				];
			}else{
				$ret = [
					'msg' => "Key ({$param['key']}) already used by some project",
					'available' => false
				];
			}
		}
		return $ret;
	}

	public function checkKey($param){
		$this->db->where('key',$param['key']);
		$project = $this->db->get('projects')->row_array();
		$ret = [];
		$error = [];
		$isValid = true;
		foreach($param as $key => $value){
			if($key != 'key'){
				$isValid = false;
				$error[] = "Invalid Key : $key";
				break;
			}
		}
		if($isValid){
			if(!$project['key']){
				$ret = [
					'error_msg' => 'Project key available',
					'error_code' => 1005,
					'available' => true
				];
			}else{
				$ret = [
					'id' => $project['id'],
					'name' => $project['name'],
					'available' => false
				];
			}
		}else{
			$error[] = "Required only Project Key (key)";
			$ret =[
			 	'error' =>	$error
			];
		}
		return $ret;
	}

	public function getAllStatistics(){
		$projects = [];
		$projects = $this->db->get('projects')->result_array();
		foreach ($projects as $key => $project) {
			$this->db->select('T.type,count(*) AS total');
			$this->db->from('tasks T');
			$this->db->join('releases R','R.id = T.release_id');
			$this->db->where('R.project_id = '.$project['id']);
			$this->db->group_by('T.type');
			$projects[$key]['statistics'] = $this->db->get()->result_array();
		}
		return $projects;
	}

}