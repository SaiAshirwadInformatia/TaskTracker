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
	
	public function get_all(){
		return $this->db->get('users')->result_array();
	}

	public function get_by_id($id)
	{
		$this->db->where('id', $id);
		return $this->db->get('users')->row_array();
	}

	public function get_by_username($username)
	{
		$this->db->where('username', $username);
		return $this->db->get('users')->row_array();
	}

	public function insert($data)
	{
		$password = rand(1000, 9999);
		if(isset($data['password']))
		{
			$password = $data['password'];
		}
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