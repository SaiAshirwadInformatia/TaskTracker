<?php

class Releases_model extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_all()
	{
		return $this->db->get('releases')->result_array();
	}

	public function insert($data)
	{
		$this->db->insert('releases', $data);
		$ret = [
			'status'	=> OK,
			'id' 		=> $this->db->insert_id()
		];
	}
}