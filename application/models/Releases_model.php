<?php

class Releases_model extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_all()
	{
		return $this->db->get('releases')->result_array();
	}

	public function get_by_project_id($project_id)
	{
		$this->db->where('project_id', $project_id);
		return $this->db->get('releases')->result_array();
	}

	public function project_count_releases($project_id){
		$this->db->where('project_id',$project_id);
		$this->db->where('is_released','0');
		$this->db->from('releases');
		return $this->db->count_all_results();
	}

	public function fetch_releases($limit,$start){
		$this->db->limit($limit, $start);
        $query = $this->db->get("releases");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
	}

	public function get_by_id($id)
	{
		$this->db->where('id', $id);
		return $this->db->get('releases')->row_array();
	}

	public function insert($data)
	{
		$status = $this->db->insert('releases', $data);
		if($status){
			$ret = [
				'status'	=> OK,
				'id' 		=> $this->db->insert_id()
			];
		}else{
			$ret = [
				'status' => KO,
				'error' => $this->db->error() 
			];
		}
		return $ret;
	}

	public function update($data, $id)
	{
		$data['lastmodified_ts'] = date('Y/m/d h:m:s');
		if($this->db->update('releases', $data, ['id' => $id])){
			return [
				'status' => OK
			];
		}else{
			return [
				'status' => KO,
				'error' => $this->db->error()
			];
		}

	}
}