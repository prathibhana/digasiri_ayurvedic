<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{
	public function __construct() //construct for load data from start
	{
		parent:: __construct();
		$this->load->model('UsersModel');
	}

	public function index()
	{
		$data = array(
			'users' => $this->UsersModel->select()
		);

		$this->load->view('header');
		$this->load->view('users/users', $data);
		$this->load->view('footer');
	}

	public function add_user()
	{
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < 10; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		$new_user = array(
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'email' => $this->input->post('email'),
			'password' => sha1($randomString),
			'create_date' => date('Y-m-d')
		);
		$email_settings = array(
			'protocol' => 'smtp',
			'smtp_host' => 'smtp.googlemail.com',
			'smtp_port' => '587',
			'smtp_user' => 'testyasipro@gmail.com',
			'smtp_pass' => 'Yasiru@[1234]',
			'mail_type' => 'html',
			'smtp_crypto' => 'tls',
			'charset' => 'utf-8',
			'new_line' => "\r\n"
		);
		$this->load->library('email', $email_settings); //load email library
		$this->email->from('admin@digasiriayurvedic.com', 'Digasiri Ayurvedic');
		$this->email->to($new_user['email']);
		$this->email->set_mailtype('html');
		$this->email->subject('Invitation');
		$this->email->message('
			<p>Hi Dear ' . $new_user['first_name'] . ' ' . $new_user['last_name'] . ',</p>
			<p>Welcome to Digasiri Ayurvedic, Please find your password as below.</p>
			<p>Password ' . $randomString . ',</p>
			<p>Be with us always.</p>
			<p>Thank You!</p>
		');

		$result = $this->UsersModel->create($new_user);

		if ($result == true) {
			$this->email->send();
			redirect('users/users');
		}

	}

	public function active_user()
	{
		$id = $this->input->post('id');
		$result = $this->UsersModel->active_user($id);
		if ($result == true) {
			$alert = array(
				'type' => "success",
				'massage' => "Successfully activated",
			);
			$this->session->set_flashdata('alert', $alert);
			redirect('users/users');


		}

	}

	public function inactive_user()
	{
		$id = $this->input->post('id');
		$result = $this->UsersModel->inactive_user($id);
		if ($result == true) {
			$alert = array(
				'type' => "danger",
				'massage' => "Successfully Deactivated",
			);
			$this->session->set_flashdata('alert', $alert);
			redirect('users/users');

		}


	}
	public function check_email(){
		$email = $this->input->post('email');
		$result = $this->UsersModel->check_email($email);
		if ($result == true){
			echo json_encode($result);
		}
	}
}
