<?php


class Kanban extends TT_Controller
{
	protected $currentProject;

	public function __construct(){
		parent::__construct();
		$this->load->model([
				'users_model',
				'projects_model',
				'releases_model'
			]);
		$this->load->view('header');
		$this->currentProject = $this->session->userdata('currentProject');
	}

	public function index($relase_id = '0'){
		$releasesList = $this->releases_model->fetch_releases_by_project($this->currentProject['id']);
		$data = [
			'status' => $this->status,
			'releasesList' => $releasesList
		];
		$this->load->view('kanban',$data);
		$this->load->view('footer');
	}

} 