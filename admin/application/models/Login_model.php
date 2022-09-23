<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function login_submit_model($username, $password)
	{
       $q = $this->db
        ->where(['user'=>$username, 'pass'=> $password])
        ->get('user');

        if($q->num_rows()){
        return $q->row()->username;
        }

	}



	public function logout_model($username)
	{
       $q = $this->db
        ->where(['user'=>$username])
        ->get('user');

        if($q->num_rows()){
        return $q->row()->id;
        }

	}

}
