<?php


class API extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	}

	public function index(){

	}

	/**
	 *	$module == Actual REST Model name
	 *	$param  == Param can contain a function name or a parameter to be passed to basic function 
	 */
	public function V1($module = 'meta', $param = null){

		$classname = ucfirst($module).'V1_model';
		
		$method = $this->input->method();
		$ret = [];
		if(file_exists(APPPATH . 'models/' . $classname . '.php')) {
			$this->load->model($classname);
			if(method_exists($this->$classname, $param)){
				// Other than basic REST CRUD, additional operation 
				if($method == 'post'){
					$data = $this->input->post();
					$ret = $this->$classname->$param($data);
				}else{
					$ret = [
						'error_msg' => "Only POST Request Method allowed"
					];
				}
			}else{
				// Execute basic REST CRUD Operation
				// HTTP_GET => get() > retrieve data
				// HTTP_POST => post() > create data
				// HTTP_PUT => put() > update data
				// HTTP_DELETE => delete() > delete data
				if($method == 'post'){
					$param = $this->input->post();
				}
				if(method_exists($this->$classname, $method)){
					$ret = $this->$classname->$method($param);
				}else{
					$ret = [
						'error_msg' => 'Invalid action call'
					];
				}
			}
		}else{
			$ret = [
				'error_msg' => 'No such API available'
			];
		}
		if($ret and count($ret) > 0){
			if(isset($ret['error_code']))
			{
				$this->output->set_status_header(500);
			}
			$this->output->set_content_type('application/json')->set_output(json_encode($ret));
		}
	}
}

?>