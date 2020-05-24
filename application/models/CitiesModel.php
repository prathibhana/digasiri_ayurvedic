<?php

class CitiesModel extends CI_Model
{

	//GET data
	public function select()
	{
		$this->db->from('cities');    //define table
		$this->db->order_by('name_en','asd'); //order
		$query = $this->db->get();    //get all data and adding to variable
		return $query->result();    //output
	}
	//where get data
	public function select_postal_code($city){
		$this->db->from('cities');
		$this->db->where('name_en',$city);
		$result=$this->db->get();
		return $result->result();



	}


}
