<?php

class Tasks extends TT_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('tasks_model');
		$this->load->view('header');
		loadProjectsSession();
	}

	public function index()
	{
		$tasks_list = $this->tasks_model->get_all();
		$data = ['tasks' => $tasks_list];
		$this->load->view('tasks_list', $data);
	}

	public function mytasks($id = 1){
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
		$data= ['action' => 'create_action'];
		$this->load->view('tasks_form',$data);
	}

	public function update()
	{

	}

	public function read()
	{

	}
}