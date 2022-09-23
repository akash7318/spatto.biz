<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model { 
 
	public function check_session_model($username)
	{
       $q = $this->db
        ->where(['username'=>$username])
        ->get('join');

        if($q->num_rows()){
        return $q->row()->id;
        }
        return null;

    }


    public function get_id($username)
     {
        $q = $this->db
        ->where(['username'=>$username])
        ->get('join');

        if($q->num_rows()){
        return $q->row()->id;
        }
        return null;
      }

      public function insert_amount_into_join($amt,$getid)
      {
        $q = $this->db
              ->set('package', $amt)
              ->where(['id'=> $getid])
              ->update('join');  

        if($q){
          return true;
          }
      }


      public function insert_into_investment($inst_data)
      {
         $q =  $this->db->insert('investment', $inst_data);
           if($q){
            return true;
           }
      }


      public function get_tid_model($get_id)
      {
         $q = $this->db
        ->where(['mid'=>$get_id, 'status' => 'pending'])
        ->get('investment');

        if($q->num_rows()){
        return $q->row()->id;
        }
      }

/*

      public function get_bank_profile_model($user_id)
     {
         if($user_id){
            $user_data_get = $this->db->select('id, bank_name, ifsc_code, account_number, account_holder_name, branch_name')
                                 ->where(['user_id'=> $user_id])
                                 ->get('bank_profile');

              return $user_data_get->row();
           }
            return false;
      }

      public function update_user_profile_model($data_update, $user_id){
        $update_profile = $this->db->where('user_id', $user_id)
                                   ->update('user', $data_update);
                                 

                        if($update_profile){
                           return true;
                           }


      }




       public function update_bank_profile_model($data_update, $user_id){
        $update_profile = $this->db->where('user_id', $user_id)
                                   ->update('bank_profile', $data_update);
                                 

                        if($update_profile){
                           return true;
                         }


      }


      public function user_tree_model(){
        $q = $this->db
                  ->get('user_level');

             if($q->num_rows()){
             return $q->result_array();
            }
      }



        public function getuserstatus($user_id)
        {

            $q = $this->db
             ->where(['user_id_fk'=>$user_id])
                 ->get('user_status');

                 if($q->num_rows()){
                  return $q->row()->user_status;
                  }
        }




        public function get_user_list($user_id)
        {
         // $q = $this->db
          //   ->where(['referral_id'=>$user_id])
            //     ->get('user_level');
                 $q = $this->db->query("SELECT * FROM user, user_level WHERE user.user_id = user_level.user_id_fk AND user_level.referral_id = '$user_id'");

                 if($q->num_rows()){
                  return $q->result_array();
                  }
        }



        public function getdownuser($user_id)
        {
             $q = $this->db->query("SELECT * FROM user, user_level, user_status WHERE user.user_id = user_level.user_id_fk AND user.user_id = user_status.user_id_fk AND user_level.referral_id = '$user_id'");

                 if($q->num_rows()){
                  return $q->result_array();
                  }
        }

        public function getuserwallet($user_id)
        {
           $q = $this->db
             ->where(['user_id_fk'=>$user_id])
                 ->get('user_wallet');

                 if($q->num_rows()){
                  return $q->row()->amount;
                  }
        }

        public function get_password($user_id)
        {
          $q = $this->db
             ->where(['user_id'=>$user_id])
                 ->get('user');

                 if($q->num_rows()){
                  return $q->row()->user_pass;
                  }
        }

        public function update_password($user_id, $new_password)
        {
          $q = $this->db
              ->set('user_pass', $new_password)
              ->where(['user_id'=> $user_id])
              ->update('user');  

        if($q){
          return true;
          }
        }

        public function update_withdraw_request($user_id, $wallet_amount,$withdraw_type)
        {
          $sub_data =  array(
            'user_id_fk' => $user_id,
            'amount' => $wallet_amount,
             'date' => date("d-m-Y"),
             'pro_cash' => $withdraw_type,
             'withdraw_status' => 'pending',
             );
           $q2 =  $this->db->insert('withdraw_request', $sub_data);
           if($q2){
            return true;
           }
        }

        public function empty_wallet($user_id)
        {
           $q = $this->db
              ->set('amount', "00")
              ->where(['user_id_fk'=> $user_id])
              ->update('user_wallet');  

        if($q){
          return true;
          }
        }




        public function get_bank()
        {
          $q = $this->db
                 ->get('manage_bank');

                 if($q->num_rows()){
                  return $q->result_array();
                  }
        }


        public function get_news()
        {
          $q = $this->db
                 ->get('manage_news');

                 if($q->num_rows()){
                  return $q->result_array();
                  }
        }

        */








}
