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
		$this->load->view('header');
		$this->load->library('pagination');
		loadProjectsSession();
		if($this->session->userdata('user')){
			$this->currentUser = $this->session->userdata('user');
		}
	}

	public function index(){
		if($this->currentUser){
			$user = $this->users_model->get_by_id($this->currentUser['id']);
			$tasks = $this->tasks_model->get_by_user_id($this->currentUser['id']);
			$projects = $this->projects_model->get_by_team_member($this->currentUser['id']);
			$data = [
				'user' => $user 	
			];
			$this->load->view('profile',$data);
		}
	}

}