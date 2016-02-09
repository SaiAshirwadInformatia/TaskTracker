<?php

function loadProjectsSession()
{
	$CI = &get_instance();
	$CI->load->model('projects_model');
	$projects = $CI->projects_model->get_all();
	$CI->session->set_userdata('projects', $projects);
	if(!$CI->session->userdata('flag')){
		if(isset($projects[0])){
			$CI->session->set_userdata('currentProject', $projects[0]);
		}
		$flag = 1;
		$CI->session->set_userdata('flag',$flag);
	}
}

function setMessage($message, $type = 'success')
{
	$CI = &get_instance();
	$CI->session->set_flashdata('message', $message);
	$CI->session->set_flashdata('message_type', $type);
}		
