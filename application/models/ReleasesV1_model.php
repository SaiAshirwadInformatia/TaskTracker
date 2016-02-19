<?php

class ReleasesV1_model extends MY_Model
{
	public function __construct()
	{
		$this->table = 'releases';
		$this->id = 'id';
		$this->string_key = 'name';
		$this->required = [
			'name' => 'Release name required',
			'project_id' => 'Project ID required',
			'start_data' => 'Release start date required'
		];
		$this->all = [
			'id',
			'name',
			'description',
			'project_id',
			'start_date',
			'estimated_release_date',
			'actual_release_date',
			'is_released',
			'access_token',
			'is_active',
			'creation_ts',
			'lastmodified_ts'
		];

		parent::__construct(); 
	}
}

?>