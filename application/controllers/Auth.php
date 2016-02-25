<?php

class Auth extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('users_model');
		$this->load->library('form_validation');
		loadProjectsSession();
	}

	public function login()
	{
		$login = $this->input->post('login');
		if($login){
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			if($this->users_model->authenticate($username, $password))
			{
				$user = $this->session->userdata('user');
				if($user['lastlogin_ts'] == NULL){
					redirect(base_url('Users/setPassword/'.$user['access_token']));
				}else{
					$data = [
						'lastlogin_ts' => date('Y/m/d h:i:s')
					];
					$this->users_model->lastLogin($data);
					redirect(site_url('Dashboard'));
				}
			}else{
				redirect(site_url('Login/failed'));
			}
		}else{
			redirect(base_url('Login'));
		}
	}

	public function logout()
	{

	}
}