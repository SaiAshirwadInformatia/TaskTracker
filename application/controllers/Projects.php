<?php

class Projects extends TT_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model([
				'projects_model',
				'releases_model'
			]);
		$this->load->view('header');
		$this->load->library('pagination');
		loadProjectsSession();
	}

	public function index($start = 0)
	{
		$this->paginationConfig['base_url'] = base_url('Projects/index');
		$this->paginationConfig['total_rows'] = $this->projects_model->records_count();
		$this->pagination->initialize($this->paginationConfig);
		$projectsList = $this->projects_model->fetch_projects($this->paginationConfig['per_page'],$start);
		$data = [
			'projectsList' => $projectsList,
			'links' => $this->pagination->create_links()
		];
		$this->load->view('projects_list', $data);
		$this->load->view('footer');
	}

	public function view($id)
	{
		$projectData = $this->projects_model->get_by_id($id);
		// Array index in $data below becomes variable to be accessed in view
		$release = $this->releases_model->project_count_releases($id);
		$data = [
			'project' => $projectData,
			'release' => $release
		];
		$this->load->view('project_view', $data);
		$this->load->view('footer');
	}

	public function create(){

		$data = [
			'action' => 'create_action',
			'name' => $this->input->post('name'),
			'key' => $this->input->post('key'),
			'color' => $this->input->post('color'),
			'start_date' => $this->input->post('start_date'),
			'description' => $this->input->post('description')
				];
		$this->load->view('project_form',$data);
		$this->load->view('footer');
	}

	public function create_action(){
		$name = $this->input->post('name');
		$color = $this->input->post('color');
		$key = $this->input->post('key');
		$start_date = $this->input->post('start_date');
		if($name and $color and $key and $start_date){
			$description = $this->input->post('description');
			$is_active = 1;
			$access_token = password_hash($name.$color, PASSWORD_DEFAULT);
			$insert = [
				'name' => $name,
				'color' => $color,
				'key' => $key,
				'start_date' => $start_date,
				'description' => $description,
				'access_token' => $access_token,
				'is_active' => $is_active

			];
			$ret = $this->projects_model->insert($insert);
			if($ret['status'] == 'OK'){
				$id = $ret['id'];
				$save = $this->input->post('save');
				switch($save){
					case 'saveAddNew' :
						redirect(base_url('Projects/create'));
						break;
					case 'saveAddRelease' :
						$URL = 'Releases/create';
						$this->session->set_flashdata('URL',$URL);
						$this->setCurrent($id);
						break;
					case 'saveExit' :
						redirect(base_url('Projects'));
						break;
					default :
						redirect(base_url('Projects/update/'.$id));
						break;
				}
			}else{	
				$message = "Error({$ret['error']['code']}): " . $ret['error']['message'];
				setMessage($message, 'error');
			}
		}else{
			$message = 'Please fill all fields.';
			setMessage($message,'error');
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
		$is_active = 1;
		$access_token = password_hash($name.$color);
		if($name and $color and $id and $key and $start_date){
			$update = [
				'name' => $name,
				'color' => $color,
				'key' => $key,
				'start_date' => $start_date,
				'description' => $description,
				'is_active' => $is_active,
				'access_token' => $access_token
			];
			$ret = $this->projects_model->update($update, $id);
			if($ret['status'] == 'OK'){
				$message = "Release sucessfully Saved";
				setMessage($message,'success');
				redirect(base_url('Projects'));
			}else{	
				$message = "Error({$ret['error']['code']}): " . $ret['error']['message'];
				setMessage($message, 'error');
				$this->update($id);
			}
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
		if($this->session->flashdata('URL')){
			$URL = $this->session->flashdata('URL');
			redirect(base_url($URL));
		}else{
			redirect(base_url('Dashboard'));
		}
	}

}	