<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Schedules extends CI_Controller
{
	public function __construct() //construct for load data from start
	{
		parent:: __construct();
		$this->load->model('ChannelSchedule');
	}

	public function index()
	{
		$this->load->view('header');
		$this->load->view('schedules/schedules');
		$this->load->view('footer');
	}
}
