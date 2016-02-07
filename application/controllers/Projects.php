<?php

class Projects extends TT_Controller
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

	public function create(){
		$data = ['action' => 'create_action'];
		$this->load->view('project_form',$data);
		$this->load->view('footer');
	}

	public function create_action(){
		$name = $this->input->post('name');
		$color = $this->input->post('color');
		if($name and $color){
			$description = $this->input->post('description');
			$insert = [
				'name' => $name,
				'color' => $color,
				'description' => $description
			];
			$this->projects_model->insert($insert);
		}else{
			$this->create();
		}
	}

	public function update($id){
		$project = $this->projects_model->get_by_id($id);
		$project['action'] = 'update_action';
		$this->load->view('project_form',$project);
		$this->load->view('footer');
	}

	public function update_action(){
		$id = $this->input->post('id');
		$project = $this->projects_model->get_by_id($id);
		$name = $this->input->post('name');
		$color = $this->input->post('color');
		if($name and $color and $id){
			$update = [
				'name' => $name,
				'color' => $color
			];
			$this->projects_model->update($update, $id);
		}else{
			$this->update();
		}
	}

	public function setCurrent($project_id)
	{
		$project = $this->projects_model->get_by_id($project_id);
		$this->session->set_userdata('currentProject', $project);
		redirect('Dashboard');
	}

}