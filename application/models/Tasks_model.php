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
		return $this->db->get($this->table)->result_array();
	}

	public function get_by_user_id($user_id = 1){
		$this->db->where('user_id',$user_id);
		return $this->db->get('tasks')->result_array();
	}

	public function get_by_id($id){
		$this->db->where('id',$id);
		return $this->db->get('tasks')->row_array();
	}

	public function insert($data){
		if($this->db->insert($this->table,$data)){
			return [
				'status' => OK,
				'id' => $this->db->insert_id()
			];
		}else{
			return [
				'status' => KO,
				'error' => $this->db->error()
			];
		}
	}

	public function release_count_tasks($release_id){
		$this->db->where('release_id',$release_id);
		$this->db->where('state','open');	
		$this->db->from('tasks');
		return $this->db->count_all_results();
	}

	public function get_by_project_id($project_id){
		$this->db->select("T.*, R.name AS release_name, R.id AS release_id, P.name AS project_name, P.id AS project_id");
		$this->db->from("tasks T");
		$this->db->join("releases R", "R.id = T.release_id");
		$this->db->join("projects P", "P.id = R.project_id");
		$this->db->where("P.id", $project_id);
		return $this->db->get()->result_array();
	}

	public function update($data,$id){
		$data['lastmodified_ts'] = date('Y-m-d h:m:s a');
		if($this->db->update('tasks',$data,['id' => $id])){
			return [
				'status' => OK,
				'id' => $id
			];
		}else{
			return [
				'status' => KO,
				'error' => $this->db->error()
			];
		}
	}
}