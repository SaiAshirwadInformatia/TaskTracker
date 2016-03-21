<?php
 
class TaskCommentsV1_model extends MY_Model
{
	private $commentRequiredFileds;
	private $commentTable;




	public function __construct(){
		parent::__construct();

		$this->commentTable = 'tasks_comments' ;

		$this->commentRequiredFileds = [
				'task_id' => 'task_id is required',
				'user_id' => 'user_id is required',
				'comment' => 'comment is required'
			];
	}


	public function insertComments($param) {	

		

		$error = [];
		$data = [];
		$isValid = true;
		foreach($this->commentRequiredFileds as $key => $value ){
			if(!array_key_exists($key, $param)){
				$error[] = $value;
				$isValid = false;
			}
		}
		foreach($param as $key => $value ){
			if(!array_key_exists($key, $this->commentRequiredFileds)){
				$error[] = $key.' key is not required';
				$isValid = false;
			}
		}
		if($isValid){
			if($this->db->insert($this->commentTable,$param)){
				$data = [
					'msg' => 'Successfully added new Comment',
					'id' => $this->db->insert_id()
				]; 
			}else{
				$data = [
					'error_msg' => $this->db->error()
				];
			}
		}
		if(count($error) > 0){
			$ret = [
				'status' => KO,
				'error' => $error,
				];
		}else{
			$ret = $data;
		}
		return $ret;

	}


	public function getComments($param){

		$error = [];
		$data = [];

		if($param['task_id']){
			$this->db->where('task_id',$param['task_id']);
			$data = $this->db->get($this->commentTable)->result_array();

			if(count($data)==0){
				$data = "No record found.";
			}
		}else{
			$error = ['error' => 'task_id is required.'];
		}

		if(count($error)>0){
			$ret = [
			'error' => $error
			];
		}else{
			$ret = [
			'status' => OK,
			'data' => $data
			];
		}

		return $ret;
	}
} 





