<?php

class Teams_Model extends CI_Model{

	var $table = 'teams';
	var $id = 'id';

	public function __construct(){
		parent::__construct();
	}

	public function insert($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function get_all(){
		return $this->db->get('teams')->result_array();
	}

	public function get_by_user_id($user_id){
		$this->db->select("T.*");
		$this->db->from("team_members TM");
		$this->db->join("teams T","T.id = TM.team_id");
		$this->db->where('TM.user_id',$user_id);
		return $this->db->get()->result_array();
	}

	public function link_members($team_id, $members_id,$role)
	{
		$insertArr = [];
		foreach ($members_id as $key => $member_id) {
			$insertArr[] = ['team_id' => $team_id, 'user_id' => $member_id, 'role' => $role[$key]];
		}
		$this->db->insert_batch('team_members', $insertArr);
	}
}