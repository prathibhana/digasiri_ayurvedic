<?php

class DoctorsModel extends CI_Model
{

	//GET doctor data
	public function select()
	{
		$this->db->from('doctors');    //define table
		$query = $this->db->get();    //get all data and adding to variable
		return $query->result();    //output
	}

	public function create($new_doctor)
	{
		$this->db->insert('doctors', $new_doctor);
		if ($this->db->affected_rows() == 1) {
			return true;
		} else {
			return false;
		}
	}
}
