<?php

class Tasks extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('tasks_model');
		$this->load->view('header');
	}

	public function index()
	{
		$tasks_list = $this->tasks_model->get_all();
		$data = ['tasks' => $tasks_list];
		$this->load->view('tasks_list', $data);
	}

	public function create()
	{
		$this->load->view('tasks_form');
	}

	public function update()
	{

	}

	public function read()
	{

	}
}