<?php

class Dashboard extends TT_Controller
{
	public function __construct()
	{
		parent::__construct(false);
		loadProjectsSession();
	}

	public function index()
	{
		$this->load->view('header');	
		$this->load->view('dashboard');
		$this->load->view('footer');
		
	}
}