<?php

class Releases extends TT_Controller
{

	private $currentProject;
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model([
			'releases_model'
		]);
		$this->load->library([
			'form_validation'
		]);
		$this->currentProject = $this->session->userdata('currentProject');
		if(!$this->currentProject){
			setMessage('Please create project first', 'error');
			redirect('Projects/create');
		}
		$this->load->view('header');
	}

	public function index()
	{
		$releases = $this->releases_model->get_by_project_id($this->currentProject['id']);
		$data['releases'] = $releases;
		$this->load->view('releases_list', $data);
		$this->load->view('footer');
	}

	public function create()
	{
		$data = [
			'action' => 'create_action',
			'name' => $this->input->post('name'),
			'description' => $this->input->post('description'),
			'start_date' => $this->input->post('start_date'),
			'estimated_release_date' => $this->input->post('estimated_release_date'),
			'key' => $this->input->post('key')
		];
		$this->load->view('release_form',$data);
		$this->load->view('footer');
	}

	public function create_action()
	{
		$name = $this->input->post('name');
		$start_date = $this->input->post('start_date');
		$estimated_release_date = $this->input->post('estimated_release_date');
		if($name and $key and $start_date and $estimated_release_date){
			$description = $this->input->post('description');
			$access_token = $name.$start_date.time();
			$access_token = password_hash($access_token, PASSWORD_DEFAULT);
			$is_active = 1;
			$insert = [
				'name' => $name,
				'description' => $description,
				'start_date' => $start_date,
				'estimated_release_date' => $estimated_release_date,
				'access_token' => $access_token,
				'is_active' => $is_active
			];
			$ret = $this->releases_model->insert($insert);
				if($ret['status'] === OK){
				setMessage('Added new release data successfully');
				$save = $this->input->post('save');
				switch ($save) {
					case 'saveAddNew':
						redirect(base_url('Releases/create'));
						break;
					case 'saveAddTask':
						redirect(base_url('Tasks/create/' . $ret['id']));
						break;
					case 'saveExit':
						redirect(base_url('Releases'));
						break;
					default:
						$this->create();
						break;
				}
			}else{	
				$message = "Error({$ret['error']['code']}): " . $ret['error']['message'];
				setMessage($message, 'error');
			}
		}else{
			setMessage('Something went wrong while creating release data', 'error');
			$this->create();
		}
	}

	public function update($id)
	{
		$release = $this->releases_model->get_by_id($id);
		$release['action'] = 'update_action';
		$this->load->view('release_form', $release);
		$this->load->view('footer');
	}

	public function update_action(){
		$release = $this->releases_model->get_by_id($id);
		$id = $this->input->post('id');
		$start_date = $this->input->post('start_date');
		$estimated_release_date = $this->input->post('estimated_release_date');
		$name = $this->input->post('name');

		if($id and $name){
			$description = $this->input->post('description');
			$update = [
				'name' => $name,
				'description' => $description,
				'start_date' => $start_date,
				'estimated_release_date' => $estimated_release_date,	
				'lastmodified_ts' => $lastmodified_ts
			];
			$this->releases_model->update($update, $id);
			setMessage('Successfully updated release data');
			redirect(base_url('Releases',$release));
		}else{
			//////We need to pass parameter in update function
			setMessage('Something went wrong while updating release data', 'error');
			$this->update($id);
		}
	}
}