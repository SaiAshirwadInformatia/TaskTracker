<?php

class Login extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		/*echo password_hash('Welcome', PASSWORD_DEFAULT);die();*/
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

	public function forgotpassword_action(){
		$email = $this->input->post('email');
		if($email){
			$this->load->library('email');

		    $this->email->from('mane.akshay1997@gmail.com', 'Akshay Mane');
		    $this->email->to($email);
		    $this->email->cc('mane.akshay1997@gmail.com');
		    $this->email->bcc('mane.akshay1997@gmail.com');

		    $this->email->subject('Sending Email from CodeIgniter with Mandrill');
		    $this->email->message('If you forgot how to do this, go ahead and refer to: <a href="http://the-amazing-php.blogspot.com/2015/05/codeigniter-send-email-with-mandrill.html">The Amazing PHP</a>.');

		    $this->email->send();
		    redirect(base_url('Dashboard'));
		}else{
			$this->forgotpassword();
		}
	}

	public function failed()
	{
		echo "Login failed";
		$this->index();
	}
}