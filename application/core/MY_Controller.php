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
		$this->nextStatus = [
			OPEN => [
				'next' => [NEED_INFO, DUPLICATE, ASSIGNED, REJECTED],
				'icon' => 'fa fa-check',
			],
			ASSIGNED => [
				'next' => [NEED_INFO, INPROGRESS],
				'icon' => 'fa fa-arrow-left'
			],
			INPROGRESS => [
				'next' => [NEED_INFO, COMPLETE],
				'icon' => 'fa fa-check'
			],
			COMPLETE => [
				'next' => [CLOSED, FAILED, REOPEN],
				'icon' => 'fa fa-check'
			],
			CLOSED => [
				'next' => [FAILED, REOPEN],
				'icon' => 'fa fa-times'
			],
			FAILED => [
				'next' => [NEED_INFO],
				'icon' => 'fa fa-exclamation-triangle'
			],
			NEED_INFO => [
				'next' => [ASSIGNED,CLOSED],
				'icon' => 'fa fa-info'
			],
			DUPLICATE => [
				'next' => [REOPEN],
				'icon' => 'fa fa-files-o'
			],
			REOPEN => [
				'next' => [ASSIGNED,REJECTED],
				'icon' => 'fa fa-repeat'
			],
			REJECTED => [
				'next' => [NEED_INFO,REOPEN,CLOSED],
				'icon' => 'fa fa-trash'
			]
		];
	}

}
