<?php

class Users extends TT_Controller{
	
	public function __construct(){
		parent::__construct(false);
		$this->load->view('head');
		$this->load->model('users_model');
		loadProjectsSession();
	}

	public function setPassword($token = null){
		$user = $this->users_model->get_by_token($token);
		if($user){
			$data = [
				'user' => $user,
				'action' => 'Users/setPasswordAction'
			];
			$this->load->view('set_password',$data);
		}else{
			redirect(base_url('Login'));
		}
	}

	public function profile()
	{
		
		$this->load->view('header');
		$this->load->view('profile');

	}


	public function setPasswordAction(){
		$data = [
		'password' => $this->input->post('newPassword'),
		'user_id' => $this->input->post('user_id'),
		'access_token' => $this->input->post('access_token')
		];
		if($data['password']){
			$ret = $this->users_model->setPassword($data);
			if(isset($ret['id'])){
				setMessage('Password changed successfully','success');
				redirect(base_url('Logout'));
			}else{
				setMessage('Something goes wrong while changind password','error');
				redirect(base_url('Logout'));
			}
		}
	}
}