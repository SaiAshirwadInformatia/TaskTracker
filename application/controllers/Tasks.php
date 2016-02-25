<?php

class Tasks extends TT_Controller
{
	private $currentUser; 	
	public function __construct()
	{
		parent::__construct();	
		loadProjectsSession();
		$this->load->model([
				'tasks_model',
				'releases_model',
				'users_model'
			]);
		$this->load->view('header');
		$this->currentUser = $this->session->userdata('user');
	}

	public function index()
	{
		$project = $this->session->userdata('currentProject');
		$tasksList = $this->tasks_model->get_by_project_id($project['id']);
		$data = [
			'tasksList' => $tasksList
		];
		$this->load->view('tasks_list', $data);
		$this->load->view('footer');
	}

	public function mytasks(){
		$mytasks_list = $this->tasks_model->get_by_user_id($this->currentUser['id']);
		$data['mytasks_list'] = $mytasks_list;
		$this->load->view('mytasks_list',$data);
		$this->load->view('footer');
	}



	public function open(){
		$project = $this->session->userdata('currentProject');
		$tasksList = $this->tasks_model->get_by_state($project['id'],'open');
		$data = [
			'tasksList' => $tasksList
		];
		$this->load->view('tasks_list', $data);
		$this->load->view('footer');
	}

	public function assigned(){
		$project = $this->session->userdata('currentProject');
		$tasksList = $this->tasks_model->get_by_state($project['id'],'assigned');
		$data = [
			'tasksList' => $tasksList
		];
		$this->load->view('tasks_list', $data);
		$this->load->view('footer');
	}

	public function closed(){
		$project = $this->session->userdata('currentProject');
		$tasksList = $this->tasks_model->get_by_state($project['id'],'closed');
		$data = [
			'tasksList' => $tasksList
		];
		$this->load->view('tasks_list', $data);
		$this->load->view('footer');
	}

	public function view($id){
		$task = $this->tasks_model->get_by_id($id);
		$user = $this->users_model->get_by_id($task['user_id']);
		$assigned_user = $this->users_model->get_by_id($task['assigned_id']);
		$data = [
			'task' => $task,
			'user' => $user,
			'assigned_user' => $assigned_user
		 ];
		$this->load->view('task_view',$data);
		$this->load->view('footer');
	}


	public function create($release_id = 0)
	{
		$project = $this->session->userdata('currentProject');
		$releasesList = $this->releases_model->get_by_project_id($project['id']);
		$usersList = $this->users_model->get_all();
		if(!isset($release_id) and $release_id == 0){
			$release_id = $this->input->post('release_id');
		}
		$data= [
			'action' => 'create_action',
			'releasesList' => $releasesList,
			'usersList' => $usersList,
			'title' => $this->input->post('title'),
			'release_id' => $release_id,
			'type' => $this->input->post('type'),
			'due_date' => $this->input->post('due_date'),
			'description' => $this->input->post('description'),
			'assigned_id' => $this->input->post('assigned_id'),
			];
		$this->load->view('task_form',$data);
		$this->load->view('footer');
	}

	public function create_action(){
		$title = $this->input->post('title');
		$type = $this->input->post('type');
		$release_id = $this->input->post('release_id');
		$assigned_id = $this->input->post('assigned_id');
		$due_date = $this->input->post('due_date');
		if($title and $type and $release_id and $due_date){
			$description = $this->input->post('description');
			$data= 
			[
				'title' => $title,
				'type' => $type,
				'release_id' => $release_id,
				'assigned_id' => $assigned_id,
				'user_id' => $this->currentUser['id'],
				'description' => $description,
				'due_date' => $due_date
			];
			if($assigned_id and $assigned_id != 0){
				$data['state'] = 'assigned';
			}else{
				$data['state'] = 'Open';
			}
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
				$this->create();
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
		$this->load->view('footer');
	}

	public function update_action(){
		$id = $this->input->post('id');
		$title = $this->input->post('title');
		$type = $this->input->post('type');
		$release_id = $this->input->post('release_id');
		$assigned_id = $this->input->post('assigned_id');
		$due_date = $this->input->post('due_date');
		if($title and $type and $release_id and $due_date){
			$description = $this->input->post('description');
			$lastmodified_ts = date('Y-m-d h:m:s a');
			$data= 
			[
				'title' => $title,
				'type' => $type,
				'release_id' => $release_id,
				'assigned_id' => $assigned_id,
				'description' => $description,
				'due_date' => $due_date,
				'user_id' => $this->currentUser['id'],
				'lastmodified_ts' => $lastmodified_ts
			];
			if($assigned_id and $assigned_id != 0){
				$data['state'] = 'assigned';
			}else{
				$data['state'] = 'Open';
			}
			$ret = $this->tasks_model->update($data,$id);
			if($ret['status'] == 'OK'){
					redirect(base_url('Tasks'));
			}else{	
				$message = "Error({$ret['error']['code']}): " . $ret['error']['message'];
				setMessage($message, 'error');
				$this->update();
			}
		}else{
			setMessage('Please fill all fields.','error');
			$this->update($id);
		}
	}

}