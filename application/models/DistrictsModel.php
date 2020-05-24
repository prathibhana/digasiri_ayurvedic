<?php

class DistrictsModel extends CI_Model
{

	//GET data
	public function select()
	{
		$this->db->from('districts');    //define table
		$this->db->order_by('name_en','asd'); //order
		$query = $this->db->get();    //get all data and adding to variable
		return $query->result();    //output
	}


}
