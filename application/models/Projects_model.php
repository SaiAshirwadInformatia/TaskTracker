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

	public function get_by_team_member($user_id){
		$this->db->select("P.*");
		$this->db->from("projects P");
		$this->db->join("team_members T","T.team_id = P.team_id");
		$this->db->join("users U","U.id = T.user_id");
		$this->db->where("U.id",$user_id);
		return $this->db->get()->result_array();
	}

	public function get_projects_by_team_id($team_id){
		$this->db->where('team_id',$team_id);
		return $this->db->get('projects')->result_array();
	}


	public function records_count($user_id){
		$this->db->select("count(*) as total");
		$this->db->from("projects P");
		$this->db->join("team_members T","T.team_id = P.team_id");
		$this->db->join("users U","U.id = T.user_id");
		$this->db->where("U.id",$user_id);
		$count = $this->db->get()->row_array();
		return $count['total'];
	}

	public function fetch_projects($limit, $start, $user_id) {
		$this->db->select("P.*");
		$this->db->from("projects P");
		$this->db->join("team_members T","T.team_id = P.team_id");
		$this->db->join("users U","U.id = T.user_id");
		$this->db->where("U.id",$user_id);
        $this->db->limit($limit, $start);
        return $this->db->get()->result_array();
        
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