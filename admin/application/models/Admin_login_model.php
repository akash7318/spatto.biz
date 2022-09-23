<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_login_model extends CI_Model {

	public function login_submit_model($user_id, $user_pass)
	{
       $q = $this->db
        ->where(['user'=>$user_id, 'pass'=> $user_pass])
        ->get('user');

        if($q->num_rows()){
        return $q->row()->user;
        }

	}



	public function logout_model($user_id)
	{
       $q = $this->db
        ->where(['user'=>$user_id])
        ->get('user');

        if($q->num_rows()){
        return $q->row()->id;
        }

	}

}
