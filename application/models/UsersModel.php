<?php

class UsersModel extends CI_Model {

	//GET users data
	public function select(){
		$this->db->from('users'); 	//define table
		$query=$this->db->get();	//get all data and adding to variable
		return $query->result();	//output
	}
	public function create($new_user){
		$this->db->insert('users', $new_user);
		if($this->db->affected_rows()==1){
			return true;
		}else {
			return false;
		}
	}
}
