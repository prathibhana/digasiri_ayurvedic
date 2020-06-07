<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Patients extends CI_Controller
{
	public function __construct() //construct for load data from start
	{ parent:: __construct();
		$this->load->model('PatientsModel');
		$this->load->model('CitiesModel');
		$this->load->model('DistrictsModel');
		$this->load->model('ProvincesModel');
	}

	public function index()
	{
		$data = array(
			'patients'=>$this->PatientsModel->select(),
			'cities'=>$this->CitiesModel->select(),
			'districts'=>$this->DistrictsModel->select(),
			'provinces'=>$this->ProvincesModel->select()
		);


		$this->load->view('header');
		$this->load->view('patients/patients',$data);
		$this->load->view('footer');
	}
	public function add_patient(){
		$new_patient=array(
			'salutation'=>$this->input->post('salutation'),
			'first_name'=>$this->input->post('first_name'),
			'last_name'=>$this->input->post('last_name'),
			'gender'=>$this->input->post('gender'),
			'date_of_birth'=>$this->input->post('date_of_birth'),
			'nic'=>$this->input->post('nic'),
			'telephone_no'=>$this->input->post('telephone_no'),
			'street'=>$this->input->post('street'),
			'street_two'=>$this->input->post('street_two'),
			'city'=>$this->input->post('city'),
			'postal_code'=>$this->input->post('postal_code'),
			'district'=>$this->input->post('district'),
			'province'=>$this->input->post('province'),
			'create_date'=>date('Y-m-d')
		);
		$result = $this->PatientsModel->create($new_patient);

		if ($result ==true){
			$alert =array(
				'type'=> "success",
				'massage'=>"Patient Added Successfully"
			);
			$this->session->set_flashdata('alert',$alert);

			redirect('patients/patients');
		}


	}
	public function get_postal_code(){
		$city=$this->input->post('city');
		$result=$this->CitiesModel->select_postal_code($city);
		echo json_encode($result);
	}

	public function get_province(){
		$district=$this->input->post('district');
		$result=$this->DistrictsModel->select_province($district);
		echo json_encode($result);
	}
}
