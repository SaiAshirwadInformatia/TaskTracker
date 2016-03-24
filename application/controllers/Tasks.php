<?php

class Tasks extends TT_Controller
{
	private $currentUser; 	
	private $currentProject;
	public function __construct()
	{
		parent::__construct();	
		loadProjectsSession();
		$this->load->model([
				'tasks_model',
				'releases_model',
				'users_model'
			]);
		$data = [
		'nextStatus' => $this->nextStatus
		];
		$this->load->view('header',$data);
		$this->load->library('pagination');
		$this->currentUser = $this->session->userdata('user');
		$this->currentProject = $this->session->userdata('currentProject');
	}

	public function index($start = 0)
	{	
		$this->paginationConfig['total_rows'] = $this->tasks_model->project_count_tasks($this->currentProject['id']);
		$this->paginationConfig['base_url'] = base_url('Tasks/index');
		$this->pagination->initialize($this->paginationConfig);
		$tasksList = $this->tasks_model->fetch_tasks($this->currentProject['id'], $this->paginationConfig['per_page'],$start);
		$data = [
			'links' => $this->pagination->create_links(),
			'tasksList' => $tasksList
		];
		$this->load->view('tasks_list', $data);
		$this->load->view('footer');
	}

	public function mytasks($start = 0){
		$count = $this->tasks_model->get_by_user_id($this->currentUser['id']);
		$this->paginationConfig['total_rows'] = count($count);
		$this->paginationConfig['base_url'] = base_url('Tasks/mytasks');
		$this->pagination->initialize($this->paginationConfig);
		$mytasks_list = $this->tasks_model->get_by_user_id($this->currentUser['id'],$this->paginationConfig['per_page'],$start);

		$data = [
			'mytasks_list' => $mytasks_list,
			'links' => $this->pagination->create_links()
		];
		$this->load->view('mytasks_list',$data);
		$this->load->view('footer');
	}



	public function open($start = 0){
		$count =  $this->tasks_model->get_by_state($this->currentProject['id'],'open');
		$this->paginationConfig['total_rows'] = count($count);
		$this->paginationConfig['base_url'] = base_url('Tasks/open');
		$this->pagination->initialize($this->paginationConfig);
		$tasksList = $this->tasks_model->get_by_state($this->currentProject['id'],'open',$this->paginationConfig['per_page'],$start);
		$data = [
			'tasksList' => $tasksList,
			'links' => $this->pagination->create_links()
		];
		$this->load->view('tasks_list', $data);
		$this->load->view('footer');
	}

	public function unassigned($start = 0){
		$count =  $this->tasks_model->get_by_state($this->currentProject['id'],'unassigned');
		$this->paginationConfig['total_rows'] = count($count);
		$this->paginationConfig['base_url'] = base_url('Tasks/unassigned');
		$this->pagination->initialize($this->paginationConfig);
		$tasksList = $this->tasks_model->get_by_state($this->currentProject['id'],'unassigned',$this->paginationConfig['per_page'],$start);
		$data = [
			'tasksList' => $tasksList,
			'links' => $this->pagination->create_links()
		];
		$this->load->view('tasks_list', $data);
		$this->load->view('footer');
	}

	public function closed(){
		$count =  $this->tasks_model->get_by_state($this->currentProject['id'],'closed');
		$this->paginationConfig['total_rows'] = count($count);
		$this->paginationConfig['base_url'] = base_url('Tasks/closed');
		$this->pagination->initialize($this->paginationConfig);
		$tasksList = $this->tasks_model->get_by_state($this->currentProject['id'],'closed');
		$data = [
			'tasksList' => $tasksList,
			'links' => $this->pagination->create_links()
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
			'assigned_user' => $assigned_user,
			'status' => $this->status
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
				$data['state'] = 'Assigned';
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