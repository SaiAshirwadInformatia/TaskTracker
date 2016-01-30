<?php

class Releases extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model([
			'releases_model'
		]);
		$this->load->library([
			'form_validation'
		]);
		$this->load->view('header');
	}

	public function index()
	{
		$releases = $this->releases_model->get_all();
		$data['releases'] = $releases;
		$this->load->view('releases', $data);
	}

	public function create()
	{

		$this->load->view('release_form');
	}

	public function create_action()
	{
		$name = $this->input->post('name');
		$insert = [
			'name' => $name
		];
		$this->releases_model->insert($insert);
	}
}