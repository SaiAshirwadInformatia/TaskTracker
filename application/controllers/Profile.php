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
			'fname' => $this->input->post('fname'),
			'lname' => $this->input->post('lname'),
			'phone' => $this->input->post('phone'),
			'skills' => $this->input->post('skills'),
			'education' => $this->input->post('education'),
			'location' => $this->input->post('location'),
			'notes' => $this->input->post('notes'),

		];
		$ret = $this->users_model->update($this->currentUser['id']	,$data);
		if($ret['id']){
			redirect(base_url('Profile'));
		}
	}

}