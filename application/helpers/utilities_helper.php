<?php

function loadProjectsSession(){
	$CI = &get_instance();
	$CI->load->model('projects_model');
	$projects = $CI->projects_model->get_all();
	$CI->session->set_userdata('projects',$projects);
}