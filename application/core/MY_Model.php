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
	var $unique;

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
					'error_msg' => $this->db->error()
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

	private function identifyKeySet($param)
	{
		$identifiedKeySet = [];
		$paramKeys = array_keys($param);
		$keyFound = false;
		$ret = ['missing'=>[], 'unique_fields'=>[]];
		foreach ($this->unique as $key => $uniqueKeySet) {
			$isCurrentSet = false;
			foreach ($uniqueKeySet as $reqKey) {
				if(in_array($reqKey, $paramKeys)){
					$isCurrentSet = true;
				}
			}
			if($isCurrentSet)
			{
				$keyFound = true;
				$diffKeySet = array_diff($uniqueKeySet, $paramKeys);
				if(count($diffKeySet) > 0)
				{
					$ret['missing'] = $diffKeySet;
				}else{
					$ret['unique_fields'] = $uniqueKeySet;
				}
				break;
			}
		}
		if(!$keyFound)
		{
			$uniqueFields = [];
			foreach ($this->unique as $uniqueKeyArr) {
				$uniqueFields = array_merge($uniqueFields, $uniqueKeyArr);
			}
			$ret['missing'] = $uniqueFields;
		}
		return $ret;
	}

	public function isAvailable($param)
	{
		$errors = [];
		$ret = [
			'errors' => $errors,
			'error_code' => 1005
		];
		$uniqueFields = $this->identifyKeySet($param);
		
		if(count($uniqueFields['missing']) > 0)
		{
			foreach ($uniqueFields['missing'] as $req_key) {
				$errors[] = "Missing key: $req_key";
			}
		}
		if(count($errors) > 0)
		{
			$ret['errors'] = $errors;
		}else{
			foreach ($uniqueFields['unique_fields'] as $req_field) {
				$this->db->where($req_field, $param[$req_field]);
			}
			$isAvailable = $this->db->get($this->table)->num_rows() === 0;
			if($isAvailable)
			{
				$ret = [
					'available' => true,
					'msg' => 'You can create item with the provided data'
				];
			}else{
				$ret = [
					'available' => false,
					'msg' => 'Please choose some other data for creation, as this already exists'
				];
			}
		}

		return $ret;
	}


	public function meta(){

	}

}
