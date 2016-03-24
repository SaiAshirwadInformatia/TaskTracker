<?php


class Profile extends TT_Controller{

	protected $currentUser;

	public function __construct(){
		parent::__construct();
		$this->load->model([
				'users_model',
				'projects_model',
				'tasks_model',
				'releases_model'
			]);
		$this->load->library('pagination');
		loadProjectsSession();
		if($this->session->userdata('user')){
			$this->currentUser = $this->session->userdata('user');
		}
	}

	public function index(){
		$this->load->view('header');
		$user = $this->users_model->get_by_id($this->currentUser['id']);
		$tasks = $this->tasks_model->get_by_user_id($this->currentUser['id']);
		$projects = $this->projects_model->get_by_team_member($this->currentUser['id']);
		$data = [
			'user' => $user 	
		];
		$this->load->view('profile',$data);
		$this->load->view('footer');
	}

	public function  update(){
		$this->load->view('header');
		$user = $this->users_model->get_by_id($this->currentUser['id']);
		$data = [
			'user' => $user
		];
		$this->load->view('update_profile',$data);
		$this->load->view('footer');
	}

	public function update_action(){
		$data = [
			//Personal Information
			'fname' => $this->input->post('fname'),
			'lname' => $this->input->post('lname'),
			'mname' => $this->input->post('mname'),
			'dob' => $this->input->post('dob'),
			'gender' => $this->input->post('gender'),
			'designation' => $this->input->post('designation'),
			//Contact Details
			'email' => $this->input->post('email'),
			'phone' => $this->input->post('phone'),
			'github' => $this->input->post('github'),
			'facebook' => $this->input->post('facebook'),
			//Residential Information
			'address1' => $this->input->post('address1'),
			'address2' => $this->input->post('address2'),
			'city' => $this->input->post('city'),
			'district' => $this->input->post('district'),
			'state' => $this->input->post('state'),
			'pincode' => $this->input->post('pincode'),
			'country' => $this->input->post('country'),
			//Edicational Details
			'college' => $this->input->post('college'),
			'board' => $this->input->post('board'),
			'exam' => $this->input->post('exam'),

		];
		$ret = $this->users_model->update($this->currentUser['id']	,$data);
		if($ret['id']){
			redirect(base_url('Profile'));
		}
	}

}