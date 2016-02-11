<?php 

class Register extends TT_Controller{

	public function __construct(){
		parent::__construct(false);
		$this->load->model('users_model');
		$this->load->view('head');
	}

	public function index(){
		$data = 
			[
				'fname' => $this->input->post('fname'),
				'lname' => $this->input->post('lname'),
				'email' => $this->input->post('email'),
				'phone' => $this->input->post('phone'),
				'username' => $this->input->post('username')
			];	
		$this->load->view('register',$data);
	}

	public function action(){
		if($this->input->post('register')){
			$fname = $this->input->post('fname');
			$lname = $this->input->post('lname');
			$email = $this->input->post('email');
			$phone = $this->input->post('phone');
			$username = $this->input->post('username');
			if($fname and $lname and $email and $phone and $username){
					$data = [
						'fname' => $fname,
						'lname' => $lname,
						'email' => $email,
						'phone' => $phone,
						'username' => $username
					];
					$ret = $this->users_model->insert($data);
					if($ret['status'] == 'OK'){
						setMessage('Successfully Registered.','success');
						//Email sending
						//We have password in $ret['password']
						echo $ret['password'];
						//sredirect('Register/validation');
					}else{
						$message = "Error({$ret['error']['code']}): " . $ret['error']['message'];
						setMessage($message, 'error');
						redirect('Register');
					}
			}else{
				setMessage('Please enter all fields','error');
				$this->index();
			}
		}
	}
}
?>