<?php

class Releases extends TT_Controller
{

	private $currentProject;
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model([
			'releases_model',
			'tasks_model',
			'projects_model'
		]);
		$this->load->library([
			'form_validation'
		]);
		loadProjectsSession();
		$this->currentProject = $this->session->userdata('currentProject');
		if(!$this->currentProject){
			setMessage('Please create project first', 'error');
			redirect('Projects/create');
		}
		$this->load->view('header');
	}

	public function index()
	{
		$releases = $this->releases_model->get_by_project_id($this->currentProject['id']);
		$data = ['releasesList' => $releases];
		$this->load->view('releases_list', $data);
		$this->load->view('footer');
	}

	public function view($id){
		$release = $this->releases_model->get_by_id($id);
		$task = $this->tasks_model->release_count_tasks($id);
		$project = $this->projects_model->get_by_id($release['project_id']);
		$data = [
			'release' => $release,
			'task' => $task,
			'project' => $project
		];
		$this->load->view('release_view',$data);
	}

	public function create()
	{
		$data = [
			'action' => 'create_action',
			'name' => $this->input->post('name'),
			'description' => $this->input->post('description'),
			'start_date' => $this->input->post('start_date'),
			'estimated_release_date' => $this->input->post('estimated_release_date'),
		];
		$data['currentProject'] = $this->session->userdata('currentProject');
		$this->load->view('release_form',$data);
		$this->load->view('footer');
	}

	public function create_action()
	{
		$name = $this->input->post('name');
		$start_date = $this->input->post('start_date');
		$estimated_release_date = $this->input->post('estimated_release_date');
		if($name  and $start_date and $estimated_release_date){
			$description = $this->input->post('description');
			$access_token = $name.$start_date.time();
			$access_token = password_hash($access_token, PASSWORD_DEFAULT);
			$is_active = 1;
			$project_id = $this->input->post('project_id');
			$insert = [
				'name' => $name,
				'description' => $description,
				'project_id' => $project_id,
				'start_date' => $start_date,
				'estimated_release_date' => $estimated_release_date,
				'access_token' => $access_token,
				'is_active' => $is_active
			];
			$ret = $this->releases_model->insert($insert);
			if($ret['status'] === OK){
				setMessage('Added new release data successfully');
				$save = $this->input->post('save');
				switch ($save) {
					case 'saveAddNew':
						redirect(base_url('Releases/create'));
						break;
					case 'saveAddTask':
						redirect(base_url('Tasks/create/' . $ret['id']));
						break;
					case 'saveExit':
						redirect(base_url('Releases'));
						break;
					default:
						redirect(base_url('Releases/update/'.$ret['id']));
						break;
				}
			}else{	
				$message = "Error({$ret['error']['code']}): " . $ret['error']['message'];
				setMessage($message, 'error');
			}
		}else{
			setMessage('Something went wrong while creating release data', 'error');
			$this->create();
		}
	}

	public function update($id)
	{
		$release = $this->releases_model->get_by_id($id);
		$release['currentProject'] = $this->session->userdata('currentProject');
		$release['action'] = 'update_action';
		$this->load->view('release_form', $release);
		$this->load->view('footer');
	}

	public function update_action(){
		$release = $this->releases_model->get_by_id($id);
		$id = $this->input->post('id');
		$start_date = $this->input->post('start_date');
		$estimated_release_date = $this->input->post('estimated_release_date');
		$name = $this->input->post('name');
		$project_id = $this->input->post('project_id');
		if($id and $name){
			$description = $this->input->post('description');
			$update = [
				'name' => $name,
				'description' => $description,
				'start_date' => $start_date,
				'estimated_release_date' => $estimated_release_date,	
				'lastmodified_ts' => $lastmodified_ts,
				'project_id' => $project_id
			];
			$ret = $this->releases_model->update($update, $id);
			if($ret['status'] == 'OK'){
				setMessage('Successfully updated release data');
				redirect(base_url('Releases'));
			}else{
					$message = "Error({$ret['error']['code']}): " . $ret['error']['message'];
					setMessage($message, 'error');
					$this->update($id);
			}
		}else{
			setMessage('Please fill all fields','error');
		}
	}
}