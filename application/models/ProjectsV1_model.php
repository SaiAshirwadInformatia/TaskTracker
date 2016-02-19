<?php

class ProjectsV1_model extends MY_Model
{
	
	public function __construct()
	{
		$this->table = 'projects';
		$this->id = 'id';
		$this->string_key = 'key';
		$this->required = [
			'name' => 'Project name required',
			'key' => 'Project key required',
			'color' => 'Project color required'
		];
		$this->all = [
			'id',
			'name',
			'description',
			'key',
			'color',
			'start_ts',
			'access_token',
			'is_active',
			'creation_ts',
			'lastmodified_ts'
		];
		parent::__construct();
	}
	/*
	public function get($param = null)
	{
		// character checking validation
		// if true call base function
		// else directly throw exception
		$ret = parent::get($param);
		return ['output' => $ret];
	}
	*/

}