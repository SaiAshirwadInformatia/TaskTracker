<?php

class TeamsV1_model extends MY_Model
{
	public function __construct()
	{
		$this->table = 'teams';
		$this->id = 'id';
		$this->string_key = 'name';
		$this->required = [
			'name' => 'Team name required',
		];
		$this->fields = [
			'id',
			'name',
			'description'
		];

		parent::__construct(); 
	}
}

?>