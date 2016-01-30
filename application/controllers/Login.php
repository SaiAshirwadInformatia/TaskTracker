<?php

class Login extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('head');
		$this->load->view('login');
	}

	public function forgotpassword()
	{
		$this->load->view('head');
		$this->load->view('forgotpassword');
	}

	public function failed()
	{
		echo "Login failed";
		$this->index();
	}
}