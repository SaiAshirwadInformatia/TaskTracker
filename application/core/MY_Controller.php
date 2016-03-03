<?php

class TT_Controller extends CI_Controller
{
	protected $paginationConfig;

	protected $status;

	public function __construct($checkLogin = true)
	{
		parent::__construct();
		if($checkLogin){
			if(!$this->session->userdata('logged')){
				redirect(base_url('Login'));
			}
		}
		$this->paginationConfig = [
	       'full_tag_open' => '<ul class="pagination">',
	       'full_tag_close' => '</ul>',
	       'num_tag_open' => '<li>',
	       'num_tag_close' => '</li>',
	       'cur_tag_open' => '<li class="disabled"><li class="active"><a href="#">',
	       'cur_tag_close' => '<span class="sr-only"></span></a></li>',
	       'next_tag_open' => '<li>',
	       'next_tagl_close' => '</li>',
	       'prev_tag_open' => '<li>',
	       'prev_tagl_close' => '</li>',
	       'first_tag_open' => '<li>',
	       'first_tagl_close' => '</li>',
	       'last_tag_open' => '<li>',
	       'last_tagl_close' => '</li>',
	       'per_page' => 1,
	       'uri_segment' => 3
		];
		$this->status = [
			'open' => ['need_info', 'duplicate', 'assigned', 'rejected'],
			'assigned' => ['need_info', 'inprogress'],
			'inprogress' => ['need_info', 'complete'],
			'complete' => ['closed', 'failed', 'reopen'],
			'close' => ['failed', 'reopen'],
			'failed' => ['need_info'],
			'reopen' => ['need_info'],
			'need_info' => ['open']
		];
	}

}
