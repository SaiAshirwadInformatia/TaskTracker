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
	var $fields;

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

	public function search($post_data = []){
		$ret = [];
		$error = [];
		$isValid = true;
		if($post_data){
			foreach ($post_data as $post_key => $post_value) {
				if(!in_array($post_key, $this->fields)){
					$isValid = false;
					$error[] = "Invalid key : $post_key";
				}
			}
		}
		if($isValid and isset($post_data)){
			foreach ($post_data as $post_key => $post_value) {
				if(is_numeric($post_value) or is_bool($post_value)){
					$this->db->where($post_key,$post_value);
				}else{
					$this->db->like($post_key,$post_value,'after');
				}
			}
			$ret = $this->db->get($this->table)->result_array();
			if(!$ret and count($ret) === 0){
				$ret = [
					'error_msg' => 'Row doesn\'t exists',
					'error_code' => 2005
				];
			}
		}else{
			$ret = [
				'error_msgs' => $error
			];
		}
		return $ret;
	}

	public function meta(){

	}

}
