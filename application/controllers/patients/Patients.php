<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Patients extends CI_Controller
{
	public function __construct() //construct for load data from start
	{ parent:: __construct();
		$this->load->model('PatientsModel');
	}

	public function index()
	{
		$data = array(
			'patients'=>$this->PatientsModel->select()
		);

		$this->load->view('header');
		$this->load->view('patients/patients',$data);
		$this->load->view('footer');
	}
	public function add_patient(){
		$new_patient=array(
			'pat_fname'=>$this->input->post('pat_fname'),
			'pat_lname'=>$this->input->post('pat_lname'),
			'pat_gender'=>$this->input->post('pat_gender'),
			'pat_dob'=>$this->input->post('pat_dob'),
			'pat_nic'=>$this->input->post('pat_nic'),
			'pat_tele_no'=>$this->input->post('pat_tele_no'),
			'pat_address'=>$this->input->post('pat_address'),
			'create_date'=>date('Y-m-d')
		);
		$result = $this->PatientsModel->create($new_patient);

		if ($result ==true){
			redirect('patients/patients');
		}

	}
}
