<?php


class Kanban extends TT_Controller
{

	public function __construct(){
		parent::__construct();
		$this->load->view('header');
	}

	public function index($relase_id = '0'){
		$this->load->view('kanban');
		$this->load->view('footer');
	}

} 