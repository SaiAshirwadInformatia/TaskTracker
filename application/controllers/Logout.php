<?php

class Logout extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->session->sess_destroy();
		redirect('Login');
	}

	public function index(){}
}