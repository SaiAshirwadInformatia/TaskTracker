<?php

interface IRestManager{
	
	function get($param = null);

	function post($param = []);

	function put($id, $param = null);

	function delete($id);

	function search($param = []);

	function meta();

}

class MY_Model extends CI_Model implements IRestManager{

	var $table;
	var $id;
	var $string_key;
	var $required;

	public function __construct() 
	{
		parent::__construct();
		$this->load->database();
	}

	public function get($param = null)
	{
		$ret = [];
		if(is_null($param) or !$param)
		{
			$ret = $this->db->get($this->table)->result_array();
			if(!$ret or count($ret) === 0){
				$ret = [
					'error_msg' => 'No ' . $this->table . ' found',
					'error_code' => 1003
				];
			}
		}else{
			if(is_numeric($param))
			{
				$this->db->where($this->id, $param);
			}else{
				$this->db->where($this->string_key, $param);
			}
			$ret = $this->db->get($this->table)->row_array();
			if(!$ret or count($ret) === 0){
				$ret = [
					'error_msg' => ucfirst(substr($this->table, 0, strlen($this->table) - 1)) . 
									' doesn\'t exists',
					'error_code' => 1004
				];
			}
		}
		return $ret;
	}

	public function post($param = []) {
		$ret = [];
		$errors = [];
		$isValid = true;
		if($this->required)
		{
			foreach($this->required as $req_key => $key_msg){
				if(!isset($param[$req_key])){
					$errors[] = $key_msg;
					$isValid = false;
				}
			}
		}
		// do duplicate validation
		if($isValid && isset($param[$this->string_key])){
			$this->db->where($this->string_key, $param[$this->string_key]);
			if($this->db->count_all_results($this->table) > 0){
				$isValid = false;
				$errors[] = 'Record already exists';
			}
		}
			
		if($isValid){

			if($this->db->insert($this->table, $param)){
				$ret = [
					'msg' => 'Successfully added new ' . ucfirst(substr($this->table, 0, strlen($this->table) - 1)),
					'id' => $this->db->insert_id()
				];
			}else{
				$ret = [
					'error_msg' => $this->db->error(),
				];
			}
		}else{
			$ret = [
				'error_msgs' => $errors
			];
		}
		return $ret;
	}

	public function put($id, $param = null){
		$ret = [];
		$this->db->where($this->id, $id);
		if($this->db->update($this->table, $param)){
			$ret = [
				'msg' => 'Updated Successfully',
			];
		}else{
			$ret = [
				'error_msg' => $this->db->error()
			];
		}
		return $ret;
	}

	public function delete($id) {
		$this->db->where($this->id, $id);
		$this->db->delete($this->table);
	}

	public function search($param = []){
		$this->db->where($param);
		return $this->db->get($this->table)->result_array();
	}

	public function meta(){

	}

}
