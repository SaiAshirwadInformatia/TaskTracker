<?php

class TT_Controller extends CI_Controller
{
	public function __construct($checkLogin = true)
	{
		parent::__construct();
		if($checkLogin){
			if(!$this->session->userdata('logged')){
				redirect(base_url('Login'));
			}
		}
	}
}
