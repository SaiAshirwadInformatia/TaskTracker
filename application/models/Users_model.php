<?php

class Users_model extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();

	}

	public function authenticate($username, $password)
	{
		$user = $this->get_by_username($username);
		if($user and isset($user['password']))
		{
			if(password_verify($password, $user['password']))
			{
				$this->session->logged = true;
				$this->session->set_userdata('user', $user);
				return true;
			}
		}
		return false;
	}
	
	public function lastLogin($data){
		$user = $this->session->userdata('user');
		$this->db->where('id',$user['id']);
		$this->db->update('users',$data);
	}

	public function get_all(){
		return $this->db->get('users')->result_array();
	}

	public function get_by_id($id)
	{
		$this->db->where('id', $id);
		return $this->db->get('users')->row_array();
	}

	public function get_by_token($token){
		$this->db->where('access_token',$token);
		return $this->db->get('users')->row_array();
	}


	public function get_members_by_team_id($team_id){
		$this->db->select("U.* , TM.role as role");
		$this->db->from("users U");
		$this->db->join("team_members TM","TM.user_id = U.id");
		$this->db->join("teams T","T.id = TM.team_id");
		$this->db->where("T.id",$team_id);
		return $this->db->get()->result_array();
	}

	public function get_by_username($username)
	{
		$this->db->where('username', $username);
		return $this->db->get('users')->row_array();
	}

	public function setPassword($data){
		$ret = [];
		$this->db->where('id',$data['user_id']);
		$this->db->where('access_token',$data['access_token']);
		$user = $this->db->get('users')->row_array();
		if(count($user) > 0){
			$insert = [
				'access_token' => md5($data['password'].$user['access_token']),
				'password' => password_hash($data['password'], PASSWORD_DEFAULT),
				'lastlogin_ts' => date('Y/m/d h:m:s')
			];
			$this->db->where('id',$user['id']);
			if($this->db->update('users',$insert)){
				$ret = [
					'status' 	=> OK, 
					'id'		=> $user['id']
				];
			}else{
				$ret = [
					'status' 	=> KO, 
					'error'		=> $this->db->error()
				];
			}
		}
		return $ret;
	}

	public function insert($data)
	{
		$password = rand(1000, 9999);
		if(isset($data['password']))
		{
			$password = $data['password'];
		}
		$data['access_token'] = md5($data['email'].$password);
		$data['password'] = password_hash($password, PASSWORD_DEFAULT);
		$this->db->insert('users', $data);
		$ret = [
			'status' 	=> OK, 
			'id'		=> $this->db->insert_id(),
			'password'	=> $password
		];
		return $ret;
	}
}