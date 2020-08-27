<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		$this->load->model('loginModel');
	}
	public function index()
	{
		$this->load->view('login/login');
	}

	public function signup(){
	//	check email or pw valid


		$data =array(
			'email' => $this->input->post('email'),
			'password' => $this->input->post('password')
		);
		$query_result = $this->loginModel->select_user($data);

		$this->session->set_userdata('name','Prathibhana Sachintha');
		if ($query_result= true){
			redirect('dashboard');
		}else { $this->session->set_flashdata('error',true);
			redirect('login/login');

		}
	}
	public function logout(){
		redirect('login/login');
	}

}
