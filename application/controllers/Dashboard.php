<?php

class Dashboard extends TT_Controller
{
	public function __construct()
	{
		parent::__construct();

		loadProjectsSession();
		
		$this->load->model([
				'users_model',
				'projects_model',
				'releases_model',
				'tasks_model',
				'teams_model'
			]);

	}

	public function index()
	{
		$fields = [
			'Bug',
			'Story',
			'Disscussion',
			'Question'
		];
		$latestFiveTask = [
			'Bug',
			'Disscussion'
		];
		foreach ($fields as $value) {
			$taskType[$value]["total$value"] = $this->tasks_model->count_task_by_type($value,$this->currentProject['id']);
			$taskType[$value]["user$value"] = $this->tasks_model->count_task_by_type($value,$this->currentProject['id'],$this->currentUser['id']);
		}
		/*$assignedList = $this->teams_model->get_by_project_id($this->currentProject['id']);
		foreach ($assignedList as $key => $value) {
			$tasks = $this->tasks_model->get_assigned_list($this->currentProject['id'],$assignedList[$key]['id']);
			$assignedList[$key]['tasks'] = $tasks['total'];
		}
		*/
		foreach ($latestFiveTask as $value) {
			$latestTaskList[$value] = $this->tasks_model->get_by_type($value,$this->currentProject['id'],null,5,0);
		}
		$assignedList = $this->tasks_model->get_assigned_list($this->currentProject['id']);
		$data = [
		'taskType' => $taskType,
		'assignedList' => $assignedList,
		'latestFiveTask' => $latestTaskList
		];
		$this->load->view('header',$data);
		$this->load->view('dashboard');
		$this->load->view('footer');
		//$this->load->view('tasktracker.tour.js');
		/*
		$to_name = 'Rohan Sakhale';
		$to_email = 'rohansakhale@gmail.com';
		$subject = 'Dashboard';
		$message = 'Email send successfully';
		$ret = sendEmail($to_name,$to_email,$subject,$message);
		if($ret){
			var_dump($ret);die();
			setMessage('Email sent successfully','success');
		}else{
			setMessage('Email not sent successfully','error');

		}
		*/
	}
}