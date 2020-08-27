<?php

class loginModel extends CI_Model
{
//SELECT * FROM users where email = $data['email'] && password = $data['password']
public function select_user($data)
{
$conditon = array(
	'email' => $data['email'],
	'password' => $data['password']
);
$this->db->where('email', $data['email']);
$query = $this->db->get('users');

if ($query->result()) {
	$this->db->where($conditon);
	$user = $this->db->get('users');
	if ($user->result()) {
		return true; //email and password correct
	} else {
		return false; //password incorrect
	}}
else{
		return false; //email incorrect
	}
}

}
