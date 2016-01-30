<?php
if(!defined('BASEPATH')) { exit('No direct script access allowed'); }

class Tasks_model extends CI_Model
{

	private $table = 'tasks';
	private $id = 'id';
	private $order = 'DESC';

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_all()
	{
		$this->db->order_by($this->id, $this->order);
		$this->db->get($this->table)->result_array();
	}

	/**
	 *	$data => ['title' => 'Hello', 'description' => 'World']
	 */
	public function create($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}
}