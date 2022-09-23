<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_dashboard_model extends CI_Model {

	public function check_session_model($user_id) 
	{
       $q = $this->db
        ->where(['user'=>$user_id])
        ->get('user');

        if($q->num_rows()){
        return $q->row()->id;
        }
        return null;

    }

    public function get_token_value() 
	{
        $q = $this->db->query("SELECT `token_value` FROM `token_value` order by id desc limit 1");
        if($q->num_rows()){
        return $q->row()->token_value;
        }
        return 0;

    }

    public function get_iwallet_all() 
	{
        $q = $this->db->query("SELECT SUM(`comm`) as comm FROM inv_transactions WHERE `remarks` like 'iWallet%' and `remarks`!='iWallet Deposit Bonus' and `remarks` != 'iWallet Deposit Weekly Payout' and `remarks` != 'iWallet Deposit Trading Incentive'");
        if($q->num_rows()){
        return $q->row()->comm;
        }
        return 0;

    }
    
    public function get_iwallet_all_withdrawal() 
	{
        $q = $this->db->query("SELECT sum(`amount`) as comm  FROM withdraw WHERE `wtype` like 'iWallet%'");
        if($q->num_rows()){
        return $q->row()->comm;
        }
        return 0;

    }


  public function get_confirmed_wallet() 
	{
      $q = $this->db->select('SUM(comm) AS comm')
        ->where(['status!='=>'Unconfirmed'])
        ->where(['remarks!='=>'Wallet Transfer '])
        ->not_like(['remarks'=>'iWallet'])
        ->get('inv_transactions');    

        if($q->num_rows()){
        return $q->row()->comm;
        }
        return 0;

    }
    
    public function get_wallet1() 
	{
        $q = $this->db->query("SELECT SUM(comm) AS comm FROM `inv_transactions` where status != 'Unconfirmed' and `remarks` != 'Wallet Transfer ' and `remarks` NOT LIKE 'iWallet%' and `remarks` NOT LIKE 'Token%' and `remarks` NOT LIKE 'Monthly Cashback Income'");
        if($q->num_rows()){
        return $q->row()->comm;
        }
        return 0;

    }
    
    public function get_wallet2() 
	{
        $q = $this->db->query("SELECT SUM(comm) AS comm FROM `inv_transactions` where `remarks`='Wallet Transfer ' or `remarks` = 'Fund Transfer from Admin'");
        if($q->num_rows()){
        return $q->row()->comm;
        }
        return 0;

    }
    
    public function get_wallet3() 
	{
        $q = $this->db->query("SELECT SUM(comm) AS comm FROM `inv_transactions` where (`remarks`='iWallet Deposit Bonus' or `remarks` = 'iWallet Deposit Weekly Payout' or `remarks` = 'iWallet Deposit Trading Incentive') and status='Confirmed'");
        if($q->num_rows()){
        return $q->row()->comm;
        }
        return 0;

    }
    
    public function get_wallet4() 
	{
        $q = $this->db->query("SELECT SUM(comm) AS comm FROM `inv_transactions` where status != 'Unconfirmed' and `remarks` LIKE 'Monthly Cashback Income'");
        if($q->num_rows()){
        return $q->row()->comm;
        }
        return 0;

    }
    
    
    public function get_funds_wallet() 
	{
      $q = $this->db->select('SUM(comm) AS comm')
        ->where(['status!='=>'Unconfirmed'])
        ->where(['remarks'=>'Wallet Transfer '])
        ->not_like(['remarks'=>'Fund Transfer from Admin'])
        ->get('inv_transactions');    

        if($q->num_rows()){
        return $q->row()->comm;
        }
        return 0;

    }
    
    
public function get_unconfirmed_wallet() 
	{
      $q = $this->db->select('SUM(comm) AS comm')
        ->where(['status'=>'unconfirmed'])
        ->get('inv_transactions');    

        if($q->num_rows()){
        return $q->row()->comm;
        }
        return 0;

    }    

public function get_withdrawal_wallet() 
	{
      $q = $this->db->select('SUM(amount) AS amount')
        ->not_like(['wtype'=>'iWallet'])
        ->get('withdraw');    

        if($q->num_rows()){
        return $q->row()->amount;
        }
        else{
        return 0;
        }
    }
    
    public function get_withdrawal_wallet_month() 
	{
      $q = $this->db->select('SUM(amount) AS amount')
        ->not_like(['wtype'=>'iWallet'])
        ->where('MONTH(wdate)', date('m'))
        ->get('withdraw');    

        if($q->num_rows()){
        return $q->row()->amount;
        }
        else{
        return 0;
        }
    }
    
    public function get_withdrawal_wallet_bank() 
	{
      $q = $this->db->select('SUM(amount) AS amount')
        ->where(['wtype'=>'Bank'])
        ->get('withdraw');    

        if($q->num_rows()){
        return $q->row()->amount;
        }
        return 0;

    }
    
    public function get_withdrawal_wallet_wallet() 
	{
      $q = $this->db->select('SUM(amount) AS amount')
        ->where(['wtype'=>'Wallet Transfer'])
        ->get('withdraw');    

        if($q->num_rows()){
        return $q->row()->amount;
        }
        return 0;

    }

  public function get_total_user()
  {
    $q = $this->db
        ->get('join');

        if($q->num_rows()){
        return $q->num_rows();
        }
  }

    public function get_total_active_user()
      {
       $q = $this->db
        ->where(['misc'=>'active'])
        ->get('join');
    
       if($q){
        return $q->num_rows();
      }

    }
     public function get_today_registration()
      {
        $today_date =  @date('Y-m-d');
       $q = $this->db
        ->like('jdate', $today_date)
        ->get('join');
    
       if($q){
        //print_r($q->result_array());
        return $q->num_rows();
      }

    }


    public function get_today_activated()
    {
       $today_date =  @date('Y-m-d');
       $q = $this->db
        ->like('sdate', $today_date)
        ->where(['status'=>'active'])
        ->get('investment');

        if($q){
        //print_r($q->result_array());
        return $q->num_rows();
      }
    }

    public function get_total_bussiness()
    {
        /*$today_date =  date('Y-m-d');*/
       $q = $this->db->select_sum('amount')
       /* ->like('sdate', $today_date)*/
        ->where(['status'=>'active'])
        ->get('investment');

        if($q){
        return $q->result_array();
      }
    }
    
    public function get_all_users_mobile()
    {
        $q = $this->db->select('phone')
        ->where(['misc'=>'active'])
        ->get('join');

        if($q){
        return $q->result_array();
      }   
    }

    public function get_activated_by_admin()
    {
       $q = $this->db
        ->where(['status'=>'active'])
        ->get('investment');

        if($q){
        $ttl =  $q->num_rows();

        $q1 = $this->db
        ->get('crypto_payments');
          
          if($q1){
            $tt2 = $q1->num_rows();

            return  $ttl - $tt2;
          }
      }

    }



    public function get_active_users()
    {
      $q = $this->db->query("SELECT * FROM `join`,`investment`  WHERE `join`.id = investment.mid AND `join`.misc = 'active'");

        if($q){
        return $q->result_array();
      }
    }

    public function get_iwallet_request()
    {
       $q = $this->db->query("select `join`.*,`iwallet_request`.slip,`iwallet_request`.trno,`iwallet_request`.amt,`iwallet_request`.cdate,`iwallet_request`.id as wid from `join` LEFT JOIN `iwallet_request` ON `join`.id = iwallet_request.jid where `iwallet_request`.status='Pending'");
        //->where(['status'=>'pending'])
        //->get('join');

        if($q){
        return $q->result_array();
      }
    }
    
    public function get_iwallet_approved()
    {
       $q = $this->db->query("select `join`.*,`iwallet_request`.slip,`iwallet_request`.trno,`iwallet_request`.amt,`iwallet_request`.cdate,`iwallet_request`.id as wid from `join` LEFT JOIN `iwallet_request` ON `join`.id = iwallet_request.jid where `iwallet_request`.status='Approved'");
        //->where(['status'=>'pending'])
        //->get('join');

        if($q){
        return $q->result_array();
      }
    }
    
    public function update_iwallet_request_model($update_data, $id)
    {
      $this->db->where('id', $id)->update('iwallet_request', $update_data);
      
      
    }
    
    public function insert_iwallet_request_model($id)
    {
      
      $q = $this->db->select('jid,amt')
        ->where(['id'=>$id])
        ->get('iwallet_request');

        
        $mid = $q->row()->jid;
        $amt = $q->row()->amt;
      
      $idate = date("Y-m-d");
      $q =  $this->db->query("INSERT INTO `inv_transactions` (`id`, `mid`, `amt`, `comm`, `remarks`, `ttime`, `level`, `rname`,`tleft`,`tright`,`status`) VALUES (NULL, '$mid', '0', '$amt', 'iWallet Funds', '$idate', NULL, NULL,NULL,NULL,NULL);");
           if($q){
            return true;
           }
    }

     public function get_pending_users()
    {
       $q = $this->db->query("select `join`.*,`investment`.slip,`investment`.hashcode from `join` LEFT JOIN `investment` ON `join`.id = investment.mid where `join`.misc='pending'");
        //->where(['status'=>'pending'])
        //->get('join');

        if($q){
        return $q->result_array();
      }
    }

    public function get_all_users_bank_address()
    {

       //$q = $this->db->get('join');
		$q = $this->db->query("SELECT *,j.id FROM `join` as j left join bank b on b.jid = j.id left join investment i on i.mid = j.id" );
        if($q){
        return $q->result_array();
      }
    }

     public function get_all_users()
    {

       //$q = $this->db->get('join');
		$q = $this->db->query("SELECT *,j.id FROM `join` as j left join bank b on b.jid = j.id left join investment i on i.mid = j.id" );
        if($q){
        return $q->result_array();
      }
    }
    
    public function get_all_userlist()
    {
       //$q = $this->db->get('join');
    	$q = $this->db->query("SELECT * FROM `join` as j left join bank b on b.jid = j.id left join investment i on i.mid = j.id" );
        if($q){
        return $q->result_array();
      }
    }
    
    public function get_all_storelist()
    {
       //$q = $this->db->get('join');
    	$q = $this->db->query("SELECT * FROM `join_store` as j left join bank_store b on b.jid = j.id" );
        if($q){
        return $q->result_array();
      }
    }
    
    
    public function get_all_storelist_pending()
    {
       //$q = $this->db->get('join');
    	$q = $this->db->query("SELECT j.*,`bank_name`, `branch_name`, `account_no`, `account_type`, `aname`, `jid`, `ifsc`, `pancard`, `paytm`, `phonepe`, `googlepay`, `upi`, `panimage`, `afront`, `aback`, `idnumber`, `idtype`, `panstatus`, `idstatus`, `bank_status` FROM `join_store` as j right join bank_store b on b.jid = j.id where misc='pending'" );
        if($q){
        return $q->result_array();
      }
    }
    
    public function update_store_status_model($update_data, $id)
    {
      $q = $this->db->where('id', $id)
                ->update('join_store', $update_data);

           if($q){
            return true;
           }
    }
    
    public function get_all_agentlist()
    {
       //$q = $this->db->get('join');
    	$q = $this->db->query("SELECT * FROM `join_agent` as j left join bank_agent b on b.jid = j.id" );
        if($q){
        return $q->result_array();
      }
    }
    
    public function get_all_superviserlist()
    {
       //$q = $this->db->get('join');
    	$q = $this->db->query("SELECT * FROM `join_superviser` as j left join bank_superviser b on b.jid = j.id" );
        if($q){
        return $q->result_array();
      }
    }
    
    public function get_all_userlist_voucher()
    {
       //$q = $this->db->get('join');
    	$q = $this->db->query("SELECT * FROM `join` as j left join bank b on b.jid = j.id left join investment i on i.mid = j.id where i.plan = 'voucher'" );
        if($q){
        return $q->result_array();
      }
    }
    
    public function get_all_userlist_investment()
    {
       //$q = $this->db->get('join');
    	$q = $this->db->query("SELECT * FROM `join` as j left join bank b on b.jid = j.id left join investment i on i.mid = j.id where i.plan like '%investment%'" );
        if($q){
        return $q->result_array();
      }
    }
    
    public function get_all_userlist_withdrawal()
    {
       //$q = $this->db->get('join');
    	$q = $this->db->query("SELECT *,sum(w.amount) as wamt FROM `join` as j, withdraw as w where w.jid = j.id and MONTH(w.wdate) = MONTH(CURRENT_DATE())
AND YEAR(w.wdate) = YEAR(CURRENT_DATE()) GROUP BY w.jid" );
        if($q){
        return $q->result_array();
      }
    }
    
    


    public function get_personal_profile_model($id)
    {
      $q = $this->db
       ->where(['id'=>$id])
        ->get('join');

        if($q){
           
        return $q->row();
      }
    }
    
    public function get_bank_profile_model($id)
        {
          $q = $this->db
           ->where(['jid'=>$id])
            ->get('bank');
    
            if($q){
            return $q->row();
          }
        }



    public function update_user_profile_model($update_data, $id)
    {
      $q = $this->db->where('id', $id)
                ->update('join', $update_data);

           if($q){
            return true;
           }
    }
    
    public function update_bank_profile_model($update_data, $id)
        {
          $q = $this->db->where('jid', $id)
                    ->update('bank', $update_data);
    
               if($q){
                return true;
               }
        }



    public function get_withdraw_model()
    {
        $q = $this->db->query("SELECT `withdraw`.id as wid,username,name,email,phone,amount,withdraw.status,`bank`.jid,`withdraw`.account,`withdraw`.wtype, bank.*,`withdraw`.wdate FROM `join`,`withdraw`,`bank` WHERE `join`.id = withdraw.jid and `join`.id = bank.jid AND `withdraw`.status = 'pending' ");

        if($q){
        return $q->result_array();
      }
    }
    
    public function get_pancard_model()
    {
        $q = $this->db->query("SELECT `bank`.id as bid,username,name,email,phone, bank.* FROM `join`,`bank` WHERE `join`.id = bank.jid AND `bank`.panstatus = 'Awaiting Approval' ");

        if($q){
        return $q->result_array();
      }
    }
    
    public function update_pancard($id)
    {
       $q = $this->db
                 ->set('panstatus', 'Approved')
                 ->where('id', $id)
                 ->update('bank');

                 if($q){
                    return true;
                 }

    }


    public function reject_pancard($id)
    {
       $q = $this->db
                 ->set('panstatus', 'Rejected')
                 ->where('id', $id)
                 ->update('bank');

                 if($q){
                    return true;
                 }
    }
    
    public function get_idcard_model()
    {
        $q = $this->db->query("SELECT `bank`.id as bid,username,name,email,phone, bank.* FROM `join`,`bank` WHERE `join`.id = bank.jid AND `bank`.idstatus = 'Awaiting Approval' ");

        if($q){
        return $q->result_array();
      }
    }
    
    public function update_idcard($id)
    {
       $q = $this->db
                 ->set('idstatus', 'Approved')
                 ->where('id', $id)
                 ->update('bank');

                 if($q){
                    return true;
                 }

    }


    public function reject_idcard($id)
    {
       $q = $this->db
                 ->set('idstatus', 'Rejected')
                 ->where('id', $id)
                 ->update('bank');

                 if($q){
                    return true;
                 }
    }
    
    public function get_bank_approval_model()
    {
        $q = $this->db->query("SELECT `bank`.id as bid,username,name,email,phone, bank.* FROM `join`,`bank` WHERE `join`.id = bank.jid AND `bank`.bank_status = 'Awaiting Approval' ");

        if($q){
        return $q->result_array();
      }
    }
    
    public function update_bank($id)
    {
       $q = $this->db
                 ->set('bank_status', 'Approved')
                 ->where('id', $id)
                 ->update('bank');

                 if($q){
                    return true;
                 }

    }


    public function reject_bank($id)
    {
       $q = $this->db
                 ->set('bank_status', 'Rejected')
                 ->where('id', $id)
                 ->update('bank');

                 if($q){
                    return true;
                 }
    }
    
public function get_pin_history()
    {
        $q = $this->db->query("SELECT pin,`to`,`from`,tdate,misc FROM `pintransfer` ");

        if($q){
        return $q->result_array();
      }
    }

    public function update_withdraw($id)
    {
       $q = $this->db
                 ->set('status', 'approved')
                 ->where('id', $id)
                 ->update('withdraw');

                 if($q){
                    return true;
                 }

    }


    public function delete_withdraw($id)
    {
       $q = $this->db->where('id', $id)
                ->delete('withdraw');

                 if($q){
                    return true;
                 }
    }


    public function get_send_withdraw_model()
    {
       $q = $this->db->query("SELECT * FROM `join`,`withdraw` WHERE `join`.id = withdraw.jid AND `withdraw`.status = 'approved' and `wtype` != 'iWallet Withdrawal'");

                 if($q){
                    return $q->result_array();
                 }
    }


    public function get_user_just_downline($snode,$pos)
    {
      $q = $this->db->select('id,username,status')
       ->where(['sponsor'=>$snode, 'position'=>$pos])
        ->get('join');

        if($q){
        return $q->result_array();
      }
    }


    public function get_data_order($snode)
    {
      $q = $this->db
                ->where(['dreferal'=>$snode])
                ->get('join');

                if($q){
                  return $q->result_array();
                  }
    }



    public function get_amt_status($id){
        $q = $this->db
                ->where(['mid'=>$id])
                ->get('join');

                if($q){
                  return $q->result_array();
                  }
    }


     public function get_password_admin($username)
        {
          $q = $this->db
             ->where(['user'=>$username])
                 ->get('user');

                 if($q->num_rows()){
                  return $q->row()->pass;
                  }
        }


        public function update_password_admin($username, $new_password)
        {
          $q = $this->db
              ->set('pass', $new_password)
              ->where(['user'=> $username])
              ->update('user');  

        if($q){
          return true;
          }
        }


        public function get_num_row_inv($id){
            $q = $this->db
             ->where(['mid'=>$id])
                 ->get('investment');

                 if($q->num_rows()){
                  return $q->num_rows();
                  }
        }
        
        public function get_num_row_dreferal($username){
            $q = $this->db
             ->where(['dreferal'=>$username])
             ->where(['misc'=>'active'])
                 ->get('join');

                 if($q->num_rows()){
                  return $q->num_rows();
                  }
        }


        public function update_investment($id,$up_ins)
        {
           $q = $this->db->where('mid', $id)
                ->update('investment', $up_ins);

           if($q){
            return true;
           }
        }


        public function update_join_status($id)
        {
          $q = $this->db
              ->set('misc', 'active')
              ->where(['id'=> $id])
              ->update('join');  
        }
        
        public function update_join_package($package)
        {
          $q = $this->db
              ->set('package', $package)
              ->where(['id'=> $id])
              ->update('join');  
        }
    
        public function update_pending_status($id)
        {
          $q = $this->db
              ->set('misc', 'pending')
              ->where(['id'=> $id])
              ->update('join');  
        }

        public function insert_investment($up_ins){

        $q =  $this->db->insert('investment', $up_ins);
           if($q){
             return true;
           }
        }
        
        public function delete_investment($id){

        $q = $this->db->where('mid', $id)
                ->delete('investment');
        $q = $this->db->where('mid', $id)
                ->delete('investment');
                 if($q){
                    return true;
                 }

        }
        
        

         
    public function get_rewards_users()
        {
          $q = $this->db->query("SELECT j.id,j.username,j.name,j.mobile,j.email,b.bdate,b.amount,b.status,b.rank FROM `join` as j,`rewards` as b WHERE j.id=b.mid AND b.status = 'pending'");
    
            if($q){
            return $q->result_array();
          }
        }
        
    public function get_franchisee()
        {
          $q = $this->db->query("SELECT * FROM `franchisee` ");
    
            if($q){
            return $q->result_array();
          }
        }    
    
    
    
    public function add_franchisee($fname)
    {
       $q = $this->db->query("INSERT INTO `franchisee` (`id`, `name`) VALUES (NULL, '$fname');");
       if($q){
        return true;
       }
    }
    
    public function delete_franchisee($fname)
    {
       $q = $this->db->query("DELETE from `franchisee` where `name` = '$fname'");
       if($q){
        return true;
       }
    }
    
    
    
    public function get_news()
        {
          $q = $this->db->query("SELECT * FROM `news` ");
    
            if($q){
            return $q->result_array();
          }
        }    
    
    
    
    public function add_news($title,$detail)
    {
    $ndate = date("Y-m-d");
    $detail = htmlspecialchars($detail);
       $q = $this->db->query("INSERT INTO `news` (`id`, `title`, `detail`, `ndate`) VALUES (NULL, '$title', '$detail', '$ndate');");
       if($q){
        return true;
       }
    }
    
    public function delete_news($title)
    {
       $q = $this->db->query("DELETE from `news` where `title` = '$title'");
       if($q){
        return true;
       }
    }
    
    // Gift Voucher
    
    public function get_gnews()
        {
          $q = $this->db->query("SELECT * FROM `gnews` ");
    
            if($q){
            return $q->result_array();
          }
        }    
    
    
    
    public function add_gnews($title)
    {
    $ndate = date("Y-m-d");
    $title = htmlspecialchars($title);
       $q = $this->db->query("INSERT INTO `gnews` (`id`, `title`, `ndate`) VALUES (NULL, '$title', '$ndate');");
       if($q){
        return true;
       }
    }
    
    public function delete_gnews($id)
    {
       $q = $this->db->query("DELETE from `gnews` where `id` = '$id'");
       if($q){
        return true;
       }
    }
    
    public function get_contest_users()
        {
          $q = $this->db->query("SELECT j.id,j.username,j.name,j.mobile,j.email,(select count(id) from `join` where dreferal = 'username' where jdate = CURDATE()) FROM `join` as j WHERE misc = 'active'");
    
            if($q){
            return $q->result_array();
          }
        }
    
    // Gift Voucher End
    
    public function get_booster_users()
        {
          $q = $this->db->query("SELECT j.id,j.username,j.name,j.mobile,j.email,b.bdate,b.amount,b.status FROM `join` as j,`booster` as b WHERE j.id=b.mid AND b.status = 'pending'");
    
            if($q){
            return $q->result_array();
          }
        }
    
    
    
         public function get_sent_booster()
        {
           $q = $this->db->query("SELECT j.username,j.name,j.mobile,j.email,b.bdate,b.amount,b.status FROM `join` as j,`booster` as b WHERE j.id=b.mid AND b.status = 'completed'");
            //->where(['status'=>'pending'])
            //->get('join');
    
            if($q){
            return $q->result_array();
          }
        }
        
        public function update_booster($id)
            {
              $q = $this->db
                  ->set('status', 'completed')
                  ->where(['mid'=> $id])
                  ->update('booster');
        
                   if($q){
                    return true;
                   }
            }
            
        public function update_reward($id)
            {
              $q = $this->db
                  ->set('status', 'completed')
                  ->where(['mid'=> $id])
                  ->update('rewards');
        
                   if($q){
                    return true;
                   }
            }
             
         public function transferpins_model($user,$pins){
         $tdate = date("Y-m-d");
         
	         for($ctr=0;$ctr<$pins;$ctr++){
	         
	         //$var = uniqid() . '_' . md5(mt_rand()); 
	         $var = rand(1111111111,9999999999);
	         $pin = "RDC".$var;
	         
	         	$this->db->where('username', $user);
	         	$q = $this->db->get('join');
	         	$data = $q->result_array();
	         	
	         	$uid = $data[0]['id'];
	         
	            $q = $this->db->query("INSERT INTO `walletpin` (`id`, `pin`, `misc`) VALUES (NULL, '$pin', '$uid');");
	            $q = $this->db->query("INSERT INTO `pintransfer` (`id`, `pin`, `to`, `from`, `tdate`, `misc`) VALUES (NULL, '$pin', '$user', 'Admin', '$tdate', '0');");
	         }
         
         }              

		
public function add_level_income($id)
    {
       $this->db->where('id', $id);
       	$q = $this->db->get('join');
       	$data = $q->result_array();
       	
       	$this->db->where('mid', $id);
       	$q = $this->db->get('investment');
       	$inv = $q->result_array();
       	$amt = $inv[0]['amount'];
       	$username = $data[0]['username'];
        $rname = $data[0]['username'];

			        $cnt = 1;
			        $amount = $amt/100;
			        	while ($username!="" && $username!="0"){
			        				
			        				$this->db->where('username', $username);
		        					$sp = $this->db->get('join');
		        					$spdata = $sp->result_array();	
		        					
			        				$sponsor = $spdata[0]['dreferal'];
			        				$income = "Level Income";
			        				if($cnt==1){
			        				$pp = $amount*10;
			        				$income = "Direct Income";
			        				}
			        				if($cnt==2){
			        				$pp = $amount*5;	
			        				}
			        				if($cnt==3){
			        				$pp = $amount*3;	
			        				}
			        				if($cnt==4){
			        				$pp = $amount*2;	
			        				}
			        				if($cnt==5){
			        				$pp = $amount*2;	
			        				}
			        				if($cnt==6){
			        				$pp = $amount*2;	
			        				}
			        				if($cnt>6 && $cnt<=16){
			        				$pp = $amount*1;	
			        				}
			        				
			        				$username = $sponsor;
			        				$idate = date("Y-m-d");
			        				
			        				//$spidsql = $this->db->query("select id from `join` where `username` = '$sponsor'");
			        				//$spiddata = array_shift($spidsql->result_array());
			        				$spiddata = $this->db->select('id')->from('join')->where('username', $sponsor)->limit(1)->get()->row_array();
			        				
			        				$spid = $spiddata['id'];
			        				
			        				$drows = 0;

			        				$drows = $this->get_num_row_dreferal($sponsor);
			        				
			        				if($drows>1){
			        				    $status = "Confirmed";
			        				}
			        				else{
			        				    $status = "Unconfirmed";
			        				}
			        				
							        if($spid>0 && $cnt<=17){
							          $this->db->query("INSERT INTO `inv_transactions` (`id`, `mid`, `amt`, `comm`, `remarks`, `ttime`, `level`, `rname`,`tleft`,`tright`,`status`) VALUES (NULL, '$spid', '$amt', '$pp', '$income', '$idate', '$cnt', '$rname',NULL,NULL,'$status');");
							         //echo "INSERT INTO `inv_transactions` (`id`, `mid`, `amt`, `comm`, `remarks`, `ttime`, `level`, `rname`) VALUES (NULL, '$spid', '$amt', '$pp', '$income', '$idate', '$cnt', '$rname');<br>"; 		
							        }
			        			$cnt++	;
			        	}

    }		
		
		
		
public function get_user_name($id)
        {
          $q = $this->db
             ->where(['id'=>$id])
                 ->get('join');

                 if($q->num_rows()){
                  return $q->row()->name;
                  }
        }

public function get_user_email($id)
        {
          $q = $this->db
             ->where(['id'=>$id])
                 ->get('join');

                 if($q->num_rows()){
                  return $q->row()->email;
                  }
        }
        
public function get_user_id($id)
        {
          $q = $this->db
             ->where(['id'=>$id])
                 ->get('join');

                 if($q->num_rows()){
                  return $q->row()->username;
                  }
        }        



public function insert_contest($up_ins){

        $q =  $this->db->insert('contest', $up_ins);
           if($q){
             return true;
           }
        }

public function delete_user($id)
{
   $this->db->where('id', $id);
   $this->db->delete('join'); 
   $q = $this->db->where('jid', $id)->delete('bank');
}

public function get_userid($username)
    {
      $q = $this->db
         ->where(['username'=>$username])
             ->get('join');

             if($q->num_rows()){
              return $q->row()->id;
              }
    }

public function get_username($id)
    {
      $q = $this->db
         ->where(['id'=>$id])
             ->get('join');

             if($q->num_rows()){
              return $q->row()->username;
              }
    }

public function same_user_name_check($user_id)
    {

    $q1 = $this->db
     ->where(['username'=>$user_id])
         ->get('join');

         if($q1->num_rows()){
          return true;
         }

    }

public function get_active_users_ifunds()
    {
      $q = $this->db->query("SELECT mid,username,name,(select sum(comm) from inv_transactions where mid=investment.mid and remarks like 'iWallet Fund Transfer from Admin%') as AFund,(select sum(comm) from inv_transactions where mid=investment.mid and remarks like 'iWallet Fund Transfer from User') as UFund,(select sum(comm) from inv_transactions where mid=investment.mid and remarks like 'iWallet Funds') as iFundRequest,(select sum(comm) from inv_transactions where mid=investment.mid and remarks like 'iWallet Transfer%') as iFundTransfer,(select sum(amount) from withdraw where jid=investment.mid and wtype like 'iWallet%' ) as withdraw FROM `investment`,`join` WHERE STATUS = 'active' and investment.mid=`join`.id GROUP BY mid");

        if($q){
        return $q->result_array();
      }
    }

public function get_active_users_funds()
    {
      $q = $this->db->query("SELECT mid,username,name,(select sum(comm) from inv_transactions where mid=investment.mid and remarks like '%Level Income') as levelincome,(select sum(comm) from inv_transactions where mid=investment.mid and remarks like 'Cashback%') as cashback,(select sum(comm) from inv_transactions where mid=investment.mid and remarks like 'Direct Income') as directincome,(select sum(comm) from inv_transactions where mid=investment.mid and (remarks like 'Fund Transfer from Admin' or `remarks` like 'VTC%')) as AFund,(select sum(comm) from inv_transactions where mid=investment.mid and remarks like 'Wallet%') as UFund,(SELECT SUM(`comm`) FROM inv_transactions WHERE mid=investment.mid and (`remarks`='iWallet Deposit Bonus' or `remarks` = 'iWallet Deposit Weekly Payout' or `remarks` = 'iWallet Deposit Trading Incentive')) as iFund,(SELECT SUM(`comm`) FROM inv_transactions WHERE mid=investment.mid and `remarks` = 'Round Table Bonus') as RoundTable,(select sum(amount) from withdraw where jid=investment.mid and (`wtype` IS NULL OR `wtype` NOT LIKE 'iWallet%') and `wtype` not like 'Token' ) as withdraw FROM `investment`,`join` WHERE STATUS = 'active' and investment.mid=`join`.id GROUP BY mid");

        if($q){
        return $q->result_array();
      }
    }

    public function withdrawifunds_submit($mid,$amount,$remarks)
          {
            $cdate = date("Y-m-d");
                $q =   $this->db->query("INSERT INTO `withdraw` (`id`, `jid`, `amount`, `status`, `wdate`, `account`, `txn_id`,`wtype`,`amount_ded`,`remark`) VALUES (NULL, '$mid', '$amount', 'Approved', '$cdate', '$remarks', NULL,'iWallet Withdrawal',NULL,'Admin Withdrawal');");

               return true;
                          
        }
        
    public function withdrawfunds_submit($mid,$amount,$remarks)
          {
            $cdate = date("Y-m-d");
            $remarks = "Admin Withdrawal ".$remarks;
                $q =   $this->db->query("INSERT INTO `withdraw` (`id`, `jid`, `amount`, `status`, `wdate`, `account`, `txn_id`, `wtype`, `amount_ded`, `remark`) VALUES (NULL, '$mid', '$amount', 'Approved', '$cdate', '$remarks', NULL,'Wallet Withdrawal',NULL,'$remarks');");

               return true;
                          
        }


public function allocate_user_admin_funds($amount,$allocate_user,$allocated_date,$remarks)
    {
      
           $mid = $this->get_userid($allocate_user);
           $q = $this->db->query("INSERT INTO `inv_transactions` (`id`, `mid`, `comm`, `amt`, `remarks`, `ttime`, `level`, `rname`, `tleft`, `tright`) VALUES (NULL, '$mid', '$amount', '0', '$remarks', '$allocated_date', NULL, NULL, NULL, NULL);");
                         
        return true;

    }

public function generate_funds_statement($amount,$allocate_user,$allocated_date)
{

    $q =   $this->db->query("INSERT INTO `wallettrans` (`id`, `from`, `to`, `amount`, `edate`, `remarks`) VALUES (NULL, 'Admin', '$allocate_user', '$amount', '$allocated_date', 'Fund Transfer from Admin');");

    return true;
              
}

public function allocate_user_admin_ifunds($amount,$allocate_user,$allocated_date,$remarks)
    {
      
           $mid = $this->get_userid($allocate_user);
           $q = $this->db->query("INSERT INTO `inv_transactions` (`id`, `mid`, `comm`, `amt`, `remarks`, `ttime`, `level`, `rname`, `tleft`, `tright`) VALUES (NULL, '$mid', '$amount', '0', '$remarks', '$allocated_date', NULL, NULL, NULL, NULL);");
                         
        return true;

    }

public function allocate_user_admin_gv($amount,$allocate_user,$allocated_date,$remarks,$validity,$code)
    {
      
           $mid = $this->get_userid($allocate_user);
           $q = $this->db->query("INSERT INTO `gift_vouchers` (`id`, `mid`, `comm`, `remarks`, `ttime`, `status`, `validity`, `code`,`userid`) VALUES (NULL, '$mid', '$amount', '$remarks', '$allocated_date', 'Completed','$validity','$code','$allocate_user');");                 
        return true;

    }


public function generate_ifunds_statement($amount,$allocate_user,$allocated_date)
{

    $q =   $this->db->query("INSERT INTO `wallettrans` (`id`, `from`, `to`, `amount`, `edate`, `remarks`) VALUES (NULL, 'Admin', '$allocate_user', '$amount', '$allocated_date', 'iWallet Fund Transfer from Admin');");

    return true;
              
}


}
