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
	public  function get_patient($patinet){
		$this->db->from('patients');
		$this->db->where('id',$patinet);
		$query = $this->db->get();    //get all data and adding to variable
		return $query->result();
	}


	public function update($patient_id,$patient)
	{
		$this->db->where('id',$patient_id);
		$this->db->update('patients',$patient);

		if ($this->db->affected_rows() == 1) {
			return true;
		} else {
			return $this->db->error();
		}

	}
	public function delete_patient($id){
		$this->db->where('id',$id);
		$this->db->delete('patients');
		if ($this->db->affected_rows() == 1) {
			return true;
		} else {
			return $this->db->error();
		}

	}

}
