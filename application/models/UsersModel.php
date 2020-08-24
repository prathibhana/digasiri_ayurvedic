<?php

class UsersModel extends CI_Model
{

	//GET users data
	public function select()
	{
		$this->db->from('users');    //define table
		$query = $this->db->get();    //get all data and adding to variable
		return $query->result();    //output
	}

	public function create($new_user)
	{
		$this->db->insert('users', $new_user);
		if ($this->db->affected_rows() == 1) {
			return true;
		} else {
			return false;
		}
	}
	public function active_user($id){
		$this->db->where('id',$id);
		$this->db->update('users',array('status'=>1));
		redirect('users/users');
	}
	public function inactive_user($id){
		$this->db->where('id',$id);
		$this->db->update('users',array('status'=>0));
		redirect('users/users');
	}
}
