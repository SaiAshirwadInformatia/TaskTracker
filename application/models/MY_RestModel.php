<?php

interface IRestManager{
	
	function get($param = null);

	function post();

	function put($param = null);

	function delete($param = null);

	function search();

	function meta();

}

class BR_Model extends CI_Model implements IRestManager{

	var $table;
	var $id;
	var $string_key;

	public function __construct() {
		parent::__construct();
	}

	public function get($param = null)
	{
		if(is_null($param) or !$param)
		{
			return $this->db->get($this->table)->results_array();
		}else{
			if(is_numeric($param))
			{
				$this->db->where($this->id, $param);
			}else{
				$this->db->where($this->string_key, $param);
			}
			return $this->db->get($this->table)->row_array();
		}
	}

	public function post(){

	}

	public function update(){

	}

	public function delete(){

	}

	public function search(){

	}

	public function meta(){

	}

}
