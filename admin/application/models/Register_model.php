<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_model extends CI_Model { 
 
   public function check_avalibility($sponser)
   {

   $q = $this->db
        ->where(['username'=>$sponser])
        ->get('join');

        if($q->num_rows()){
        return $q->row()->id;
        }
   }

   public function same_user_name_check($username)
   {
    $q = $this->db
        ->where(['username'=>$username])
        ->get('join');

        if($q->num_rows()){
        return $q->row()->id;
        }
   }

   public function same_email_check($email)
   {
    $q = $this->db
        ->where(['email'=>$email])
        ->get('join');

        if($q->num_rows()){
        return $q->row()->id;
        }
   }

   public function getpostion($snode, $pos)
   {
      $q =$this->db->query("SELECT * FROM `join` WHERE `sponsor` = '$snode' and `position` = '$pos'");

        if($q->num_rows()){
        return  $q->num_rows();
        }
   }

    public function getpostion_user($snode, $pos)
   {
      $q =$this->db->query("SELECT * FROM `join` WHERE `sponsor` = '$snode' and `position` = '$pos'");

        if($q->num_rows()){
        return $q->row()->username;
        }
   }


   public function insert_join_model($insert_data)
   {
    $q =  $this->db->insert('join', $insert_data);
           if($q){
            return true; 
           }
   }
	

}



