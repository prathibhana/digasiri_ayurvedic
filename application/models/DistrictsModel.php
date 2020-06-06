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
//	public function select_province($district){
//		$this->db->from('districts');
//		$this->db->where('name_en',$district);
//		$result=$this->db->get();
//		return $result->result();
//	}
	public function select_province($district){
		$this->db->from('districts d');
		$this->db->join('provinces p','d.province_id=p.id','left');
		$this->db->where('d.name_en',$district);
		$result=$this->db->get();
		return $result->result();
	}
}
