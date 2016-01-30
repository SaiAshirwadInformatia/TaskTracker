<?php

class Projects extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('projects_model');
		$this->load->view('header');
	}

	public function index()
	{
		$projectsList = $this->projects_model->get_all();
		$data = ['projectsList' => $projectsList];
		$this->load->view('projects_list', $data);
	}

	public function view($id)
	{
		$projectData = $this->projects_model->get_by_id($id);
		// Array index in $data below becomes variable to be accessed in view
		$data = ['project' => $projectData];
		$this->load->view('project_view', $data);
	}
}