<?php

class loginModel extends CI_Model {
	//SELECT * FROM users where email = $data['email'] && password = $data['password']
	public function select_user($data){
		$conditon = array(
			'email' => $data['email'],
			'password'=>$data['password']
		);
		//select * from usere where $condition
		$query = $this->db->select("*")->from("users")->where($conditon);

		//output
		$result = $query->get()->result_array();

		// check weather if user available
		if(count($result)==1){
			return true;
		}else {
			return false;
		}
	}


}
