<?php

class UsersV1_model extends MY_Model
{

	public function __construct()
	{
		$this->table = 'users';
		$this->id = 'id';
		$this->string_key = 'username';
		$this->required = [
			'fname' => 'First name required',
			'lname' => 'Last name required',
			'username' => 'Username required',
			'email' => 'Email ID required'
		];
		$this->all = [
			'id',
			'fname',
			'lname',
			'email',
			'username',
			'password',
			'phone',
			'creation_ts',
			'lastmodified_ts',
			'is_active',
			'access_token'

		];
		parent::__construct();
	}

	/**
	 * More functionality other than Base REST Model 
	 */
	public function mysearch($post_data = []){
		
	}

}