<?php

class Dashboard extends TT_Controller
{
	public function __construct()
	{
		parent::__construct();
		loadProjectsSession();
	}

	public function index()
	{
		$this->load->view('header', [
			'status' => $this->status
		]);	
		$this->load->view('dashboard');
		$this->load->view('footer');

		
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