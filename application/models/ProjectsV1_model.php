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

}