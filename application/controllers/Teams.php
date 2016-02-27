<?php

class Teams extends TT_Controller{

	protected $currentUser;

	public function __construct(){
		parent::__construct();
		$this->load->model([
				'teams_model',
				'users_model',
				'projects_model',
				'tasks_model'
			]);
		loadProjectsSession();
		$this->load->view('header');
		$this->load->library('pagination');
		$this->currentUser = $this->session->userdata("user");
	}

	public function index($start = 0){
		$members = [];
		$projects = [];
		$this->paginationConfig['base_url'] = base_url('Teams/index');
		$this->paginationConfig['total_rows'] = count($this->teams_model->get_by_user_id($this->currentUser['id']));
		$this->pagination->initialize($this->paginationConfig);
		$teams = $this->teams_model->get_by_user_id($this->currentUser['id'],$this->paginationConfig['per_page'],$start);
		foreach ($teams as  $team) {
			$members[$team['id']] = $this->users_model->get_members_by_team_id($team['id']);
			$projects[$team['id']] = $this->projects_model->get_projects_by_team_id($team['id']);
		}
		$data = [
			'teamsList' => $teams,
			'members' => $members,
			'projects' => $projects,
			'links' => $this->pagination->create_links()
		];
		$this->load->view('teams_list',$data);
		$this->load->view('footer');
	}

	public function view($team_id){
		if($team_id){
			$task = [];
			$team = $this->load->teams_model->get_by_id($team_id);
			$projects = $this->load->projects_model->get_projects_by_team_id($team_id);
			$members = $this->load->users_model->get_members_by_team_id($team_id);
			foreach ($projects as $project) {

				$task[$project['id']] = $this->tasks_model->project_count_tasks($project['id']);
			}
			foreach ($members as $member) {
				$task[$member['fname']] = count($this->tasks_model->get_by_state(false,'open',false,false,$member['id']));
			}
			$data = [
				'team' => $team,
				'membersList' => $members,
				'projectsList' => $projects,
				'task' => $task
			];
			$this->load->view('team_view',$data);
			$this->load->view('footer');	
		}
	}

	public function create(){

		$data = [
			'action' => 'create_action',
			'members' => [
					0 => $this->currentUser

				]
		];
		$this->load->view('team_form',$data);
		$this->load->view('footer');
	}

	public function create_action(){
		$members_id = $this->input->post('members_id');
		$key = $this->input->post('key');
		$role = $this->input->post('role');
		$name = $this->input->post('name');
		$description = $this->input->post('description');
		$team_id = $this->teams_model->insert([
			'name' => $name,
			'description' => $description,
			'key' => $key
		]);
		if($team_id > 0)
		{
			$this->teams_model->link_members($team_id, $members_id, $role);
		}
	}

	public function update($team_id){
		if($team_id){
			$team = $this->teams_model->get_by_id($team_id);
			$members = $this->users_model->get_members_by_team_id($team_id);
			$data = [
				'team' => $team,
				'members' => $members,
				'action' => 'update_action'
			];
			$this->load->view('team_form',$data);
		}else{
			refirect(base_url('Teams'));
		}
	}

	public function update_action(){
		$team_id = $this->input->post('id');
		$members_id = $this->input->post('members_id');
		$role = $this->input->post('role');
		$name = $this->input->post('name');
		$description = $this->input->post('description');
		$data = [
			'name' => $name,
			'description' => $description
		];
		//$team_id = $this->teams_model->update($team_id,$data);
		if($team_id > 0)
		{
			$deletedMembers = [];
			$newMembers = [];
			$oldMembers = [];
			$oldMembersID = [];
			$oldMembersRole = [];
			$newMembersMembersRole = [];
			$members = $this->users_model->get_members_by_team_id($team_id);
			foreach ($members as $member) {
				if(!in_array($member['id'], $members_id)){
					$deletedMembers[] = $member['id'];
				}else{
					$oldMembers[] = $member;
					$oldMembersID[] = $member['id'];
					$oldMembersRole[$member['id']] = $role[array_search($member['id'], $members_id)];
				}
			}

			$newMembers = array_diff($members_id, $oldMembersID);
			foreach ($newMembers as $newMember) {
				$newMembersRole[] = $role[array_search($newMember, $members_id)];
			}
			$valid = [];
			if(count($oldMembers) > 0){	
				$valid[] = $this->teams_model->link_members_update($team_id, $oldMembers, $oldMembersRole);
			}
			if(count($newMembers) > 0){
				$valid[] = $this->teams_model->link_members($team_id, $newMembers, $role);
			}
			if(count($deletedMembers) > 0){
				$valid[] = $this->teams_model->link_members_delete($team_id, $deletedMembers);
			}
			redirect(base_url('Teams'));
		}
	}
}
