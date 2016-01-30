<?php

class Auth extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('users_model');
		$this->load->library('form_validation');
	}

	public function login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		if($this->users_model->authenticate($username, $password))
		{
			redirect(site_url('Dashboard'));
		}else{
			redirect(site_url('Login/failed'));
		}
	}

	public function logout()
	{

	}
}