<?php


class PatientsModel extends CI_Model
{

	//GET patient data
	public function select()
	{
		$this->db->from('patients');    //define table
		$query = $this->db->get();    //get all data and adding to variable
		return $query->result();    //output
	}

	public function create($new_patient)
	{
		$this->db->insert('patients', $new_patient);
		if ($this->db->affected_rows() == 1) {
			return true;
		} else {
			return false;
		}
	}
}
