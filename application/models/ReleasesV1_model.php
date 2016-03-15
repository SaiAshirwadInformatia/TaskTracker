<?php

class ReleasesV1_model extends MY_Model
{
	public function __construct()
	{
		$this->table = 'releases';
		$this->id = 'id';
		$this->string_key = 'name';
		$this->required = [
			'name' => 'Release name required',
			'project_id' => 'Project ID required',
			'start_date' => 'Release start date required'
		];
		$this->fields = [
			'id',
			'name',
			'description',
			'project_id',
			'start_date',
			'estimated_release_date',
			'actual_release_date',
			'is_released'
		];
		parent::__construct(); 
	}

	public function teamMembers($param){
		$returnArr = [];
		if($param['release_id']){
			$this->db->select('U.*');
			$this->db->from('users U');
			$this->db->join('team_members TM','TM.user_id = U.id');
			$this->db->join('projects P','P.team_id = TM.team_id');
			$this->db->join('releases R','R.project_id = P.id');
			$this->db->where('R.id',$param['release_id']);
			$data = $this->db->get()->result_array();
			if(count($data) > 0){
				$returnArr = $data;
			}else{
				$returnArr = [
					'status' => 'Record not found'
				];
			}
		}else{
			$returnArr = [
				'status' => "release_id required"
			];
		}
		return $returnArr;
	}
}

?>
