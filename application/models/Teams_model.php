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

	public function get_by_id($id){
		$this->db->where('id',$id);
		return $this->db->get('teams')->row_array();
	}

	public function get_by_user_id($user_id, $limit = 30, $start = 0){
		$this->db->select("T.*");
		$this->db->from("team_members TM");
		$this->db->join("teams T","T.id = TM.team_id");
		$this->db->where('TM.user_id',$user_id);
		if($limit and $start >= 0){
			$this->db->limit($limit,$start);
		}
		return $this->db->get()->result_array();
	}



	public function link_members($team_id, $members_id,$role)
	{
		$insertArr = [];
		if(count($members_id) > 0){
			foreach ($members_id as $key => $member_id) {
				$insertArr[] = ['team_id' => $team_id, 'user_id' => $member_id, 'role' => $role[$key]];
			}
			$this->db->insert_batch('team_members', $insertArr);
		}
	}


	public function link_members_update($team_id, $members, $role)
	{
		$updateArr = [];
		if(count($members) > 0){
			foreach ($members as $member) {
				$updateArr[] = ['id' => $member['team_members_id'], 'user_id' => $member['id'], 'role' => $role[$member['id']]];
			}
			if($this->db->update_batch('team_members', $updateArr, 'id')){
				return true;

			}
		}
		return false;
	}

	public function link_members_delete($team_id, $members_id)
	{
		if(count($members_id) > 0){
			$this->db->where_in('user_id',$members_id);
			$this->db->where('team_id',$team_id);
			if($this->db->delete('team_members')){
				return true;
			}
		}
		return false;
	}
}