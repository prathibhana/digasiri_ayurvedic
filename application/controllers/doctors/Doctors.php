<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Doctors extends CI_Controller
{
	public function __construct() //construct for load data from start
	{ parent:: __construct();
		$this->load->model('DoctorsModel');
	}

	public function index()
	{
		$data = array(
			'doctors'=>$this->DoctorsModel->select()
		);

		$this->load->view('header');
		$this->load->view('doctors/doctors',$data);
		$this->load->view('footer');
	}
	public function add_doctor(){
		$new_doctor=array(
			'doc_name'=>$this->input->post('doc_name'),
			'gender'=>$this->input->post('gender'),
			'doc_spec'=>$this->input->post('doc_spec'),
			'create_date'=>date('Y-m-d')
		);
		$result = $this->DoctorsModel->create($new_doctor);

		if ($result ==true){
			redirect('doctors/doctors');
		}

	}
}
