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
		$key = $this->input->post('key');
		if($name and $color and $key and $start_date){
			$description = $this->input->post('description');
			$insert = [
				'name' => $name,
				'color' => $color,
				'key' => $key,
				'start_date' => $start_date,
				'description' => $description
			];
			$ret = $this->projects_model->insert($insert);
			if($ret['status'] == 'OK'){
				loadProjectsSession();
				$id = $ret[id];
				$save = $this->input->post('save');
				switch($save){
					case 'saveAddNew' :
						redirect(base_url('Projects/create'));
						break;
					case 'saveAddRelease' :
						$this->setCurrent($id);
						redirect(base_url('Releases/create'));
						break;
					case 'saveExit' :
						redirect(base_url('Projects'));
						break;
					default :
						redirect(base_url('Projects/update/'.$id));
				}
			}
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
		$description = $this->input->post('description');
		$key = $this->input->post('key');
		$start_date = $this->input->post('start_date');
		if($name and $color and $id and $key and $start_date){
			$update = [
				'name' => $name,
				'color' => $color,
				'key' => $key,
				'start_date' => $start_date,
				'description' => $description
			];
			$ret = $this->projects_model->update($update, $id);
			loadProjectsSession();
			$message = "Release sucessfully Saved";
			setMessage($message,'success');
			redirect(base_url('Projects'));
		}else{
			$message = "Please fill all fields.";
			setMessage($message , 'error');
			redirect(base_url('Projects/update/'.$id));
		}
	}

	public function setCurrent($project_id)
	{
		$project = $this->projects_model->get_by_id($project_id);
		$this->session->set_userdata('currentProject', $project);
		redirect('Dashboard');
	}

}	