<?php

class Projects_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_all()
	{
		return $this->db->get('projects')->result_array();
		// Types of result that we can retrieve
		// $this->db->get('projects')->result();
		//1. stdClass Object form $project->name
		// $this->db->get('projects')->result_array();
		//2. array $project['name']
	}

	public function get_by_id($id)
	{
		$this->db->where('id', $id);
		return $this->db->get('projects')->row_array();
	}

	public function insert($data){
		$status = $this->db->insert('projects',$data);
		if($status){
			$ret = [
				'status' => OK,
				'id' => $this->db->insert_id()
			];
		}else{
			$ret = [
				'status' => KO,
				'error' => $this->db->error()
			];
		}
		return $ret;
	}

	public function update($data, $id){
		$data['lastmodified_ts'] = date('Y/m/d h:m:s');
		if($this->db->update('projects',$data,['id' => $id])){
			return [
				'status' => OK
			];
		}else{
			return [
				'status' => KO,
				'error' => $this->db->error()
			];
		}
	}
}