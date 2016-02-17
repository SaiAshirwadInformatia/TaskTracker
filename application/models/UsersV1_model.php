<?php

class UsersV1_model extends MY_Model
{

	public function __construct()
	{
		$this->table = 'users';
		$this->id = 'id';
		$this->string_key = 'username';
		parent::__construct();
	}

	/**
	 * More functionality other than Base REST Model 
	 */
	public function mysearch($post_data = []){

	}

}