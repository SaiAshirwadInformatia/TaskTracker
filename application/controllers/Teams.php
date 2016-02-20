<?php

class Teams extends TT_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model([
				'teams_model'
			]);
		loadProjectsSession();
		$this->load->view('header');
		$this->load->library('pagination');
	}

	public function index(){

	}

	public function create(){
		$data['action'] = "create_action";
		$this->load->view('team_form',$data);
		$this->load->view('footer');
	}

	public function create_action(){
		$members_id = $this->input->post('members_id');
		$name = $this->input->post('name');
		$description = $this->input->post('description');
		$team_id = $this->teams_model->insert([
			'name' => $name,
			'description' => $description
		]);
		if($team_id > 0)
		{
			$this->teams_model->link_members($team_id, $members_id);
		}
	}
}
