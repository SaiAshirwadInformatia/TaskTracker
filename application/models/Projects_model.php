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
}