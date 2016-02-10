<?php

class Tasks extends TT_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model([
				'tasks_model',
				'releases_model',
				'users_model'
			]);
		$this->load->view('header');
		loadProjectsSession();
	}

	public function index()
	{
		$project = $this->session->userdata('currentProject');
		$releases = $this->releases_model->get_by_project_id($project['id']);
		//$tasksList = $this->tasks_model->get_by_releases($releases);
		$tasksList = $this->tasks_model->get_all();
		$data = [
			'tasksList' => $tasksList
		];
		$this->load->view('tasks_list', $data);
	}

	public function mytasks($user_id = 1){
		$mytasks_list = $this->tasks_model->get_by_user_id($id);
		$data['mytasks_list'] = $mytasks_list;
		$this->load->view('mytasks_list',$data);
	}

	public function view($id){
		$task = $this->tasks_model->get_by_id($id);
		$data = ['task' => $task ];
		$this->load->view('task_view',$data);
	}

	public function create()
	{
		$project = $this->session->userdata('currentProject');
		$releasesList = $this->releases_model->get_by_project_id($project['id']);
		$usersList = $this->users_model->get_all();
		$data= [
			'action' => 'create_action',
			'releasesList' => $releasesList,
			'usersList' => $usersList,
			'title' => $this->input->post('title'),
			'release_id' => $this->input->post('release_id'),
			'type' => $this->input->post('type'),
			'description' => $this->input->post('description'),
			'assigned_id' => $this->input->post('assigned_id'),
			];
		$this->load->view('task_form',$data);
	}

	public function create_action(){
		$title = $this->input->post('title');
		$type = $this->input->post('type');
		$release_id = $this->input->post('release_id');
		$assigned_id = $this->input->post('assigned_id');
		$start_ts = $this->input->post('start_ts');
		$end_ts = $this->input->post('end_ts');
		if($title and $type and $release_id){
			$description = $this->input->post('description');
			$data= 
			[
				'title' => $title,
				'type' => $type,
				'release_id' => $release_id,
				'assigned_id' => $assigned_id,
				'description' => $description,
				'start_ts' => $start_ts,
				'end_ts' => $end_ts
			];
			$ret = $this->tasks_model->insert($data);

			if($ret['status'] == 'OK'){
				$save = $this->input->post('save');
				setMessage($title.' is suceesfully created','success');
				switch($save){
					case 'saveAddNew':
						redirect(base_url('Tasks/create'));
						break;
					case 'saveExit':
						redirect(base_url('Tasks'));
						break;
					default :
						redirect(base_url('Tasks/update/'.$ret['id']));
						break;
				}
			}else{	
				$message = "Error({$ret['error']['code']}): " . $ret['error']['message'];
				setMessage($message, 'error');
			}
		}else{
			setMessage('Please fill all fields.','error');
			$this->create();
		}
	}

	public function update($id)
	{
		$task = $this->tasks_model->get_by_id($id);
		$project = $this->session->userdata('currentProject');
		$releasesList = $this->releases_model->get_by_project_id($project['id']);
		$usersList = $this->users_model->get_all();
		$task['action'] = 'update_action';
		$task['releasesList'] = $releasesList;
		$task['usersList'] = $usersList;
		$this->load->view('task_form',$task);
	}

	public function update_action(){
		$id = $this->input->post('id');
		$title = $this->input->post('title');
		$type = $this->input->post('type');
		$release_id = $this->input->post('release_id');
		$assigned_id = $this->input->post('assigned_id');
		$start_ts = $this->input->post('start_ts');
		$end_ts = $this->input->post('end_ts');
		if($title and $type and $release_id){
			$description = $this->input->post('description');
			$lastmodified_ts = date('Y-m-d h:m:s a');
			$data= 
			[
				'title' => $title,
				'type' => $type,
				'release_id' => $release_id,
				'assigned_id' => $assigned_id,
				'description' => $description,
				'start_ts' => $start_ts,
				'end_ts' => $end_ts,
				'lastmodified_ts' => $lastmodified_ts
			];
			$ret = $this->tasks_model->update($data,$id);
			if($ret['status'] == 'OK'){
					redirect(base_url('Tasks'));
			}else{	
				$message = "Error({$ret['error']['code']}): " . $ret['error']['message'];
				setMessage($message, 'error');
			}
		}else{
			setMessage('Please fill all fields.','error');
			$this->create();
		}
	}

	public function read()
	{

	}
}