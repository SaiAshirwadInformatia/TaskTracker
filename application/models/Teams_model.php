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

	public function link_members($team_id, $members_id)
	{
		$insertArr = [];
		foreach ($members_id as $member_id) {
			$insertArr[] = ['team_id' => $team_id, 'user_id' => $member_id];
		}
		$this->db->insert_batch('team_members', $insertArr);
	}
}