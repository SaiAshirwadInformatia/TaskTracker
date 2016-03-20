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
		$this->fields = [
			'id',
			'fname',
			'lname',
			'email',
			'username',
			'password',
			'phone'

		];
		parent::__construct();
	}

	/**
	 * More functionality other than Base REST Model 
	 */
	public function mysearch($post_data = []){
		
	}

	public function uploadDisplayPicture()
	{
		// TODO
	}

}