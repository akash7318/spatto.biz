<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_dashboard extends CI_Controller { 

     protected $getName;


	function __construct() 
	{

		parent::__construct();
		$this->load->model('Admin_dashboard_model');	
		$admin_session =  $this->session->userdata('admin_session');
	}



	public function index()
	{
		if($this->check_login()){
      $data['total_user'] =  $this->Admin_dashboard_model->get_total_user();
      $data['total_active_user'] =  $this->Admin_dashboard_model->get_total_active_user();
      $data['today_registration'] =  $this->Admin_dashboard_model->get_today_registration();
      $data['today_activated'] =  $this->Admin_dashboard_model->get_today_activated();
      $data['total_bussiness'] =  $this->Admin_dashboard_model->get_total_bussiness();
      
      
      
      $this->load->view('dashboard_view', $data);
		}
		else{
			redirect('Admin_login');
		}
		
	}





  public function check_login()
  {
    $user_id =  $this->session->userdata('admin_session');
    $return_model =  $this->Admin_dashboard_model->check_session_model($user_id);

    if($return_model){

          return true;
    }

    else{

    	return false;

    }
  }

public function pintransfer()
  {
    if($this->check_login())
    {
      $this->load->view('pintransfer');
    }
    else
    {
      redirect('Admin_login');
    }
  }
  
public function pintransfer_submit()
  {
    if($this->check_login())
    {
      $userid = $this->input->post('username');
      $pins = $this->input->post('pins');
      $this->Admin_dashboard_model->transferpins_model($userid, $pins);
      $data['response'] = "Pin Transferred";
      $this->load->view('pintransfer',$data);
      
    }
    else
    {
      redirect('Admin_login');
    }
  }  


public function pintransfer_history()
{
  if($this->check_login()){
 $data['pin_transfer'] = $this->Admin_dashboard_model->get_pin_history();
 //print_r($data[withdraw]);
 $this->load->view('pin_transfer_history', $data);
   }
    else{
      redirect('Admin_login');
    }
}

public function get_franchisee()
{
  if($this->check_login()){
 $data['franchisee'] = $this->Admin_dashboard_model->get_franchisee();
 //print_r($data[withdraw]);
 $this->load->view('franchisee_list', $data);
   }
    else{
      redirect('Admin_login');
    }
}

public function submit_franchisee()
{
  if($this->check_login()){
  $userid = $this->input->post('fname');
 $this->Admin_dashboard_model->add_franchisee($userid);
 //print_r($data[withdraw]);
 $this->load->view('add_franchisee');
   }
    else{
      redirect('Admin_login');
    }
}

public function add_franchisee()
{
  if($this->check_login()){
 $this->load->view('add_franchisee');
   }
    else{
      redirect('Admin_login');
    }
}

public function remove_franchisee()
{
  if($this->check_login()){
  $userid = $this->input->get('fname');
 $this->Admin_dashboard_model->delete_franchisee($userid);
 $data['franchisee'] = $this->Admin_dashboard_model->get_franchisee();
 $this->load->view('franchisee_list',$data);
   }
    else{
      redirect('Admin_login');
    }
}



public function get_news()
{
  if($this->check_login()){
 $data['news'] = $this->Admin_dashboard_model->get_news();
 //print_r($data[withdraw]);
 $this->load->view('news_list', $data);
   }
    else{
      redirect('Admin_login');
    }
}

public function submit_news()
{
  if($this->check_login()){
  $title = $this->input->post('title');
  $detail = $this->input->post('detail');
 $this->Admin_dashboard_model->add_news($title,$detail);
 //print_r($data[withdraw]);
 $this->load->view('add_news');
   }
    else{
      redirect('Admin_login');
    }
}

public function add_news()
{
  if($this->check_login()){
 $this->load->view('add_news');
   }
    else{
      redirect('Admin_login');
    }
}

public function remove_news()
{
  if($this->check_login()){
  $title = $this->input->get('title');
 $this->Admin_dashboard_model->delete_news($title);
 $data['news'] = $this->Admin_dashboard_model->get_news();
 $this->load->view('news_list',$data);
   }
    else{
      redirect('Admin_login');
    }
}

// Gift Voucher

public function get_gnews()
{
  if($this->check_login()){
 $data['news'] = $this->Admin_dashboard_model->get_gnews();
 //print_r($data[withdraw]);
 $this->load->view('gnews_list', $data);
   }
    else{
      redirect('Admin_login');
    }
}

public function submit_gnews()
{
  if($this->check_login()){
  $title = $this->input->post('title');
 $this->Admin_dashboard_model->add_gnews($title);
 //print_r($data[withdraw]);
 $this->load->view('add_gnews');
   }
    else{
      redirect('Admin_login');
    }
}

public function add_gnews()
{
  if($this->check_login()){
 $this->load->view('add_gnews');
   }
    else{
      redirect('Admin_login');
    }
}

public function remove_gnews()
{
  if($this->check_login()){
  $id = $this->input->get('id');
 $this->Admin_dashboard_model->delete_gnews($id);
 $data['news'] = $this->Admin_dashboard_model->get_gnews();
 $this->load->view('gnews_list',$data);
   }
    else{
      redirect('Admin_login');
    }
}





//Gift Voucher End

 public function activate_submit()
  {
   if($this->check_login()){
      $userid = $this->input->get('userid');
      $referralid = $this->Admin_dashboard_model->getreferralid($userid);
      $getactivate = $this->Admin_dashboard_model->geactivate_model($userid);
      $insert_admin_level_get_referral = $this->Admin_dashboard_model->insert_admin_level_model($userid, $referralid);

      if($insert_admin_level_get_referral == 4){

         $data_response4 = $this->Admin_dashboard_model->update_user_level_admin($userid,$referralid); 
      }

     // redirect('Admin_dashboard/pendinguser');

    }
    else{
      redirect('Admin_login');
    }

  }






  public function activeusers()
  {
    if($this->check_login())
    {
     $data['active_user'] = $this->Admin_dashboard_model->get_active_users();
      $this->load->view('active_user', $data);
    }
    else
    {
      redirect('Admin_login');
    }
  }



  public function pendinguser()
  {
    if($this->check_login())
    {
     $data['pending_user'] = $this->Admin_dashboard_model->get_pending_users();
      $this->load->view('pending_user', $data);
    }
    else
    {
      redirect('Admin_login');
    }
  }


  public function iwalletfunds()
  {
    if($this->check_login())
    {
     $data['pending_user'] = $this->Admin_dashboard_model->get_iwallet_request();
      $this->load->view('iwallet_request', $data);
    }
    else
    {
      redirect('Admin_login');
    }
  }
  
  public function iwalletpurchased()
  {
    if($this->check_login())
    {
     $data['approved_user'] = $this->Admin_dashboard_model->get_iwallet_approved();
      $this->load->view('iwallet_approved', $data);
    }
    else
    {
      redirect('Admin_login');
    }
  }
  
  public function iwallet_approve_action()
  {
    if($this->check_login())
    {
        $update_data  = array(
	        'status' => 'Approved'
	         );
	   $id = $this->input->get('id');       
      $this->Admin_dashboard_model->update_iwallet_request_model($update_data, $id);
      $this->Admin_dashboard_model->insert_iwallet_request_model($id);
      redirect('Admin_dashboard/iwalletfunds');
    }
    else
    {
      redirect('Admin_login');
    }
  } 
  
  public function iwallet_reject_action()
  {
    if($this->check_login())
    {
        $update_data  = array(
	        'status' => 'Rejected'
	         );
	   $id = $this->input->get('id');       
      $this->Admin_dashboard_model->update_iwallet_request_model($update_data, $id);
      redirect('Admin_dashboard/iwalletfunds');
    }
    else
    {
      redirect('Admin_login');
    }
  } 


  public function activate_user_view()
  {
    $data['id'] = $this->input->get('id');
    $data['profile'] = $this->Admin_dashboard_model->get_personal_profile_model($data['id']);
    
    $this->load->view('activation_form',$data);

  }

    
  public function allusers_bank_address()
  {
    if($this->check_login())
    {
     $data['all_user'] = $this->Admin_dashboard_model->get_all_users_bank_address();
      $this->load->view('all_user_address_bank', $data);
    }
    else
    {
      redirect('Admin_login');
    }
  }    

  public function allusers()
  {
    if($this->check_login())
    {
     $data['all_user'] = $this->Admin_dashboard_model->get_all_users();
      $this->load->view('all_user', $data);
    }
    else
    {
      redirect('Admin_login');
    }
  }
  
  public function alluserlist()
  {
    if($this->check_login())
    {
     $data['all_user'] = $this->Admin_dashboard_model->get_all_userlist();
      $this->load->view('all_user_list', $data);
    }
    else
    {
      redirect('Admin_login');
    }
  }
  
  public function allstorelist()
  {
    if($this->check_login())
    {
     $data['all_user'] = $this->Admin_dashboard_model->get_all_storelist();
      $this->load->view('all_store_list', $data);
    }
    else
    {
      redirect('Admin_login');
    }
  }
  
  public function allstorelist_pending()
  {
    if($this->check_login())
    {
     $data['all_user'] = $this->Admin_dashboard_model->get_all_storelist_pending();
      $this->load->view('all_store_list_pending', $data);
    }
    else
    {
      redirect('Admin_login');
    }
  }
  
  
  public function updatestore_status()
  {
    if($this->check_login()){
      $id = $this->input->get('sid');
        
        $update_data  = array(
	        'misc' => "Active",
	         );
	  $this->Admin_dashboard_model->update_store_status_model($update_data, $id);
        
        redirect('Admin_dashboard/allstorelist_pending');

    }
    else{
      redirect('Admin_login');
    }
  }
  
  public function allagentlist()
  {
    if($this->check_login())
    {
     $data['all_user'] = $this->Admin_dashboard_model->get_all_agentlist();
      $this->load->view('all_agent_list', $data);
    }
    else
    {
      redirect('Admin_login');
    }
  }
  
  public function allsuperviserlist()
  {
    if($this->check_login())
    {
     $data['all_user'] = $this->Admin_dashboard_model->get_all_superviserlist();
      $this->load->view('all_superviser_list', $data);
    }
    else
    {
      redirect('Admin_login');
    }
  }
  
  public function alluserlist_voucher()
  {
    if($this->check_login())
    {
     $data['all_user'] = $this->Admin_dashboard_model->get_all_userlist_voucher();
      $this->load->view('all_user_list_voucher', $data);
    }
    else
    {
      redirect('Admin_login');
    }
  }
  
  public function alluserlist_investment()
  {
    if($this->check_login())
    {
     $data['all_user'] = $this->Admin_dashboard_model->get_all_userlist_investment();
      $this->load->view('all_user_list_investment', $data);
    }
    else
    {
      redirect('Admin_login');
    }
  }
  
  public function alluserlist_withdrawal()
  {
    if($this->check_login())
    {
     $data['all_user'] = $this->Admin_dashboard_model->get_all_userlist_withdrawal();
      $this->load->view('all_user_list_withdrawal', $data);
    }
    else
    {
      redirect('Admin_login');
    }
  }


  public function edituser()
  {
     if($this->check_login()){
      
      $data['all_user'] = $this->Admin_dashboard_model->get_all_users();
      
      $this->load->view('edit_user', $data);

    }
    else{
      redirect('Admin_login');
    }
  }


  public function edituser_submit()
  {
    if($this->check_login()){
      $id = $this->input->get('id');
        $data['profile'] = $this->Admin_dashboard_model->get_personal_profile_model($id);
        $data['bank'] = $this->Admin_dashboard_model->get_bank_profile_model($id);
        $this->load->view('user_profile_view', $data);

    }
    else{
      redirect('Admin_login');
    }
  }


    public function update_user_profile()
  {

    if($this->check_login()){
      $id =  $this->input->post('id');
      $name =  $this->input->post('name');
      $email = $this->input->post('email');
      $phone = $this->input->post('phone');      
      $password = $this->input->post('password');
      $state = $this->input->post('state');
      $city = $this->input->post('city');
      $address = $this->input->post('address');
      $pincode = $this->input->post('pincode');
      
      $bname =  $this->input->post('bank_name');
      $branch =  $this->input->post('branch_name');
	  $acctno =  $this->input->post('account_no');	
	  $aname =  $this->input->post('aname');
	  $ifsc =  $this->input->post('ifsc');
	  $pancard =  $this->input->post('pancard');
	  $acard =  $this->input->post('acard');

      
	  $update_data  = array(
	        'bank_name' => $bname,
	        'branch_name' => $branch,
	        'account_no' => $acctno,
	        'aname' => $aname,
	        'ifsc' => $ifsc,
	        'pancard' => $pancard,
	        'idnumber' => $acard,
	         );
	  $this->Admin_dashboard_model->update_bank_profile_model($update_data, $id);
	  
	  $update_data  = array(
	        'name' => $name,
	        'email' => $email,
	        'phone' => $phone,
	        'password' => $password,
	        'state' => $state,
	        'city' => $city,
	        'address' => $address,
	        'pincode' => $pincode,
	         );        	
      $responce = $this->Admin_dashboard_model->update_user_profile_model($update_data, $id);

      if($responce){
         redirect('Admin_dashboard/edituser');
      }
    }
     else{
      redirect('Admin_login');
    }
  }
    
    public function idcard_request()
    {
      if($this->check_login()){
     $data['withdraw'] = $this->Admin_dashboard_model->get_idcard_model();
     //print_r($data[withdraw]);
     $this->load->view('adhaar_view', $data);
       }
        else{
          redirect('Admin_login');
        }
    }
    
    public function idcard_done()
    {
        
      $id = $this->input->get('id');
       $status = $this->input->get('id_status');
   
          if($status == 'success'){
            $res = $this->Admin_dashboard_model->update_idcard($id);

             if($res){
                  redirect('Admin_dashboard/idcard_request');
             }
          }
          elseif ($status == 'blocked') {
                $res1 = $this->Admin_dashboard_model->reject_idcard($id);
                    if($res1){
                  redirect('Admin_dashboard/idcard_request');
                    }
          }
    }
    
     public function bank_request()
    {
      if($this->check_login()){
     $data['withdraw'] = $this->Admin_dashboard_model->get_bank_approval_model();
     //print_r($data[withdraw]);
     $this->load->view('bank_view', $data);
       }
        else{
          redirect('Admin_login');
        }
    }
    
    public function bank_done()
    {
      $id = $this->input->get('id');
       $status = $this->input->get('bank_status');
   
          if($status == 'success'){
            $res = $this->Admin_dashboard_model->update_bank($id);

             if($res){
                  redirect('Admin_dashboard/bank_request');
             }
          }
          elseif ($status == 'blocked') {
                $res1 = $this->Admin_dashboard_model->reject_bank($id);
                    if($res1){
                  redirect('Admin_dashboard/bank_request');
                    }
          }
    }
    
    public function pancard_request()
    {
      if($this->check_login()){
     $data['withdraw'] = $this->Admin_dashboard_model->get_pancard_model();
     //print_r($data[withdraw]);
     $this->load->view('pancard_view', $data);
       }
        else{
          redirect('Admin_login');
        }
    }
    
    
    
    public function pancard_done()
    {
      $id = $this->input->get('id');
       $status = $this->input->get('pan_status');
   
          if($status == 'success'){
            $res = $this->Admin_dashboard_model->update_pancard($id);

             if($res){
                  redirect('Admin_dashboard/pancard_request');
             }
          }
          elseif ($status == 'blocked') {
                $res1 = $this->Admin_dashboard_model->reject_pancard($id);
                    if($res1){
                  redirect('Admin_dashboard/pancard_request');
                    }
          }
    }
    
    public function withdraw_request()
    {
      if($this->check_login()){
     $data['withdraw'] = $this->Admin_dashboard_model->get_withdraw_model();
     //print_r($data[withdraw]);
     $this->load->view('withdraw_view', $data);
       }
        else{
          redirect('Admin_login');
        }
    }

    public function withdraw_done()
    {
      $id = $this->input->get('id');
       $status = $this->input->get('withdraw_status');
   
          if($status == 'success'){
            $res = $this->Admin_dashboard_model->update_withdraw($id);

             if($res){
                  redirect('Admin_dashboard/withdraw_request');
             }
          }
          elseif ($status == 'blocked') {
                $res1 = $this->Admin_dashboard_model->delete_withdraw($id);
                    if($res1){
                  redirect('Admin_dashboard/withdraw_request');
                    }
          }
    }



     public function send_request()
    {
      if($this->check_login()){
     $data['send_withdraw'] = $this->Admin_dashboard_model->get_send_withdraw_model();
     $this->load->view('sent_withdraw_request', $data);
       }
        else{
          redirect('Admin_login');
        }
    }


    public function tree_view()
    {
      if($this->check_login()){
      $this->load->view('admin_user_tree');
       }
       else{
         redirect('Admin_login');
       }
    }


    public function get_usertree_submit()
    {
       if($this->check_login()){
      error_reporting(0);
      $username = $this->input->post('username');
      $data['down'] =   $this->input->post('username');

      if($username){
       $data['down1'] =   $this->find_users($username,'left');
       $data['down2'] =   $this->find_users($username,'right'); 

       if(is_array($data['down1'])){
         $arraydata = $data['down1'];
         $uname1 = $arraydata[0]['username'];
         $data['down11'] =   $this->find_users($uname1,'left');
         $data['down12'] =   $this->find_users($uname1,'right'); 
       }
       if(is_array($data['down2'])){
         $arraydata123 = $data['down2'];
         $uname = $arraydata123[0]['username'];
         $data['down21'] =   $this->find_users($username,'left');
         $data['down22'] =   $this->find_users($username,'right'); 

       }
     }
     else{
      echo "username not found";
         }
           $this->load->view('admin_user_tree_submit',$data);
       }
       else{
        redirect('Admin_login');
       }
    }



    public function find_users($snode,$pos) {
        $user_just_downline = $this->Admin_dashboard_model->get_user_just_downline($snode,$pos);
          return $user_just_downline;
   }


   public function table_view()
   {
    if($this->check_login()){
    $this->load->view('admin_downline_user_table');
      }
      else{
         redirect('Admin_login');
      }
   }


   public function get_downline_usertable_submit()
   {
     if($this->check_login()){
    $uname = $this->input->post('username');
    $data['sponsor_list'] = $this->Admin_dashboard_model->get_data_order($uname);
       $this->load->view('admin__downline_user_table_view',$data);
     }
     else{
         redirect('Admin_login');
     }
    }


    public function change_admin_password()
     {
    if($this->check_login()){
    $this->load->view('change_admin_password_view');
    }
    else{
       redirect('Admin_login');
    }
  }



     public function change_password_submit()
  {
    if($this->check_login()){
     $user_id_index =  $this->session->userdata('admin_session');
     $old_password =  $this->input->post('old_password');
     $new_password = $this->input->post('new_password');
       $new_password1 = $this->input->post('new_password1');

       if($new_password == $new_password1){
        $get_password = $this->Admin_dashboard_model->get_password_admin($user_id_index);
        if($get_password == $old_password){
          $update_password =  $this->Admin_dashboard_model->update_password_admin($user_id_index, $new_password);
          if($update_password){
            $this->session->set_flashdata('msg', 'password change succesful');
            redirect('Admin_dashboard/change_admin_password');
          }
          else{
           $this->session->set_flashdata('msg', 'error');
            redirect('Admin_dashboard/change_admin_password'); 
          }

        }
        else{
          $this->session->set_flashdata('msg', 'Your Old password is inccorect');
            redirect('Admin_dashboard/change_admin_password');
        }

       }
       else{

        $this->session->set_flashdata('msg', 'password don\'t match');
            redirect('Admin_dashboard/change_admin_password');

       }


      }
       else{
      redirect('Admin_login');
    }
  }


public function activate_user_action()
{
  if($this->check_login()){

	  $id = $this->input->get('id');
	  $amt = $this->input->get('amt');
	  if(substr($amt,0)=="S"){
        $package = "Silver";
        $amt = substr($amt,1);
      }
      if(substr($amt,0)=="G"){
        $package = "Gold";
        $amt = substr($amt,1);
     }
	             $up_ins = array(
	              'plan' => 1,
	              'amount' => $amt,
	               'mid' =>$id,
	               'sdate'=> date('Y-m-d'),
	               'ppercentage' => 0,
	                'dailypay' => 0,
	                 'status' => 'active',
	              );
	
	            // print_r($up_ins);
	    $inv_status = $this->Admin_dashboard_model->get_num_row_inv($id);     
	    if($inv_status>0){
	        $insert_investment_data = $this->Admin_dashboard_model->update_investment($id,$up_ins);
	    }
	    else{
	        $insert_investment_data = $this->Admin_dashboard_model->insert_investment($up_ins);
	    }
	    $name = $this->Admin_dashboard_model->get_user_name($id);
	    $email = $this->Admin_dashboard_model->get_user_email($id);
	    $username = $this->Admin_dashboard_model->get_user_id($id);
	    $code = time();
        
        $up_ins = array(
	              'username' => $username,
	              'mid' => $id,
	               'date' =>date('Y-m-d'),
	               'voucher'=> $code,
	               'reward' => NULL,
	                'position' => NULL,
	              );
        
       // $insert_contest_data = $this->Admin_dashboard_model->insert_contest($up_ins);
        
        
        $matter="";
			
$a ="<!doctype html>
<html>
<head>
<meta charset='UTF-8'>
<style type='text/css'>
body {
	background-color: #DBDBDB;
}
</style>
</head>

<body>

<table width='80%' border='0' align='center' cellpadding='0' cellspacing='0'>
  <tbody>
    <tr>
      <td height='80' align='center' bgcolor='#007DCA' style='color: #F9F9F9; font-size: 32px; font-family: Market Place Path Arial, sans-serif;'>Venjio</td>
    </tr>
    <tr>
      <td height='326' valign='top' bgcolor='#F4F4F4'><p>&nbsp;</p>
        <table width='95%' border='0' align='center' cellpadding='0' cellspacing='0'>
        <tbody>
          <tr>
            <td style='font-family: Market Place Path Arial, sans-serif; color: #525151;'><p>Dear ".$name.",<br>
              <br>
              Welcome to Venjio. We have recieved your membership request.<br><br>
              		
              You are eligible for Venjio February Lucky Draw Contest, your voucher code for the lucky draw is mentioned below : <br>
              Voucher Code : ".$code."<br>
              
			  
			 
			  </p>
              <p>Results of the draw will be notified to you and it will alos be displayed in your user panel on Venjio website.<br>
              </p>
              <p> </p>
              <p>Regards, <br>
              Venjio<br>
              <br>
              </p></td>
          </tr>
        </tbody>
      </table></td>
    </tr>
    <tr>
      <td height='32' align='center' valign='middle' style='font-family: Market Place Path Arial, sans-serif; font-size: 12px; color: #555353;'>Copyright &copy; 2019 Venjio. All rights reserved.</td>
    </tr>
  </tbody>
</table>
</body>
</html>";

			$matter .= $a;
			
			// load email library
            $this->load->library('email');
            
            // prepare email
            $this->email
                ->from('info@venjio.com', 'Venjio Travels')
                ->to($email)
                ->subject('Voucher Code for Venjio Lucky Draw Contest - February 19')
                ->message($matter)
                ->set_mailtype('html');
            
            // send email
            //$this->email->send();
			
	    
	    if($insert_investment_data){
	             
	             $update_join = $this->Admin_dashboard_model->update_join_status($id);
	             $update_join = $this->Admin_dashboard_model->update_join_package($package);
	             $this->Admin_dashboard_model->add_level_income($id);
	             
	            $this->session->set_flashdata('msg', 'Successfully Activated');
	            redirect('Admin_dashboard/pendinguser');
	     }
  
	}
	else{
	   redirect('Admin_login');
	}
}

public function delete_user_action()
{
  if($this->check_login()){

	  $id = $this->input->get('id');
        $this->Admin_dashboard_model->delete_user($id);
        
        //$this->Admin_dashboard_model->update_pending_status($id);
        $this->Admin_dashboard_model->delete_investment($id);
        $this->session->set_flashdata('msg', 'Request Successfully Deleted');
        redirect('Admin_dashboard/pendinguser');

	}
	else{
	   redirect('Admin_login');
	}
}

 public function eligiblerewards()
   {
     if($this->check_login())
     {
      $data['rewards_user'] = $this->Admin_dashboard_model->get_rewards_users();
       $this->load->view('rewards_user', $data);
     }
     else
     {
       redirect('Admin_login');
     }
   }
 
 
 
   public function sentrewards()
   {
     if($this->check_login())
     {
      $data['sent_rewards'] = $this->Admin_dashboard_model->get_sent_rewards();
       $this->load->view('sent_rewards', $data);
     }
     else
     {
       redirect('Admin_login');
     }
   }
   
   
   
   public function eligiblebooster()
     {
       if($this->check_login())
       {
        $data['booster_user'] = $this->Admin_dashboard_model->get_booster_users();
         $this->load->view('booster_user', $data);
       }
       else
       {
         redirect('Admin_login');
       }
     }
   
   public function eligible_contest_users()
     {
       if($this->check_login())
       {
        $data['contest_user'] = $this->Admin_dashboard_model->get_contest_users();
         $this->load->view('contest_users', $data);
       }
       else
       {
         redirect('Admin_login');
       }
     }
   
     public function sentbooster()
     {
       if($this->check_login())
       {
        $data['sent_booster'] = $this->Admin_dashboard_model->get_sent_booster();
         $this->load->view('sent_booster', $data);
       }
       else
       {
         redirect('Admin_login');
       }
     }
 
 
	public function submitbooster()
	  {
	    if($this->check_login()){
	      $id = $this->input->post('mid');
	        $this->Admin_dashboard_model->update_booster($id);
	        $data['booster_user'] = $this->Admin_dashboard_model->get_booster_users();
	            $this->load->view('booster_user', $data);
	
	    }
	    else{
	      redirect('Admin_login');
	    }
	  }
	  
	  public function submitreward()
	    {
	      if($this->check_login()){
	        $id = $this->input->post('mid');
	          $this->Admin_dashboard_model->update_reward($id);
	          $data['rewards_user'] = $this->Admin_dashboard_model->get_rewards_users();
	              $this->load->view('rewards_user', $data);
	  
	      }
	      else{
	        redirect('Admin_login');
	      }
	    }

public function activeusersifunds()
  {
    if($this->check_login())
    {
     $data['active_user'] = $this->Admin_dashboard_model->get_active_users_ifunds();
     $this->load->view('iwallet_funds', $data);
    }
    else
    {
      redirect('Admin_login');
    }
  }

  public function withdrawifunds()
  {
    if($this->check_login())
    {
     $mid = $this->input->post('mid');
     $wallet = $this->input->post('wallet');
     $user = $this->Admin_dashboard_model->get_username($mid);
     $data['mid'] = $mid;
     $data['wallet'] = $wallet;
     $data['user'] = $user;
     $this->load->view('withdrawifunds', $data);
    }
    else
    {
      redirect('Admin_login');
    }
  }    

  public function withdrawifunds_submit()
  {
    if($this->check_login()){
      $mid  = $this->input->post('mid');
      $user  = $this->input->post('user');
      $amount  = $this->input->post('amount');
      $remarks  = $this->input->post('remarks');
      
      $this->Admin_dashboard_model->withdrawifunds_submit($mid,$amount,$remarks);

      $this->session->set_flashdata('msg', 'Funds Withdrawn');
      redirect('Admin_dashboard/activeusersifunds');
            
    }
    else{
      redirect('admin_login');
    }
  }


public function activeusersfunds()
  {
    if($this->check_login())
    {
     $data['active_user'] = $this->Admin_dashboard_model->get_active_users_funds();
      $this->load->view('active_users_funds', $data);
    }
    else
    {
      redirect('Admin_login');
    }
  }
  
  public function withdrawfunds()
  {
    if($this->check_login())
    {
     $mid = $this->input->post('mid');
     $wallet = $this->input->post('wallet');
     $user = $this->Admin_dashboard_model->get_username($mid);
     $data['mid'] = $mid;
     $data['wallet'] = $wallet;
     $data['user'] = $user;
     $this->load->view('withdrawfunds', $data);
    }
    else
    {
      redirect('Admin_login');
    }
  }


public function withdrawfunds_submit()
  {
    if($this->check_login()){
      $mid  = $this->input->post('mid');
      $user  = $this->input->post('user');
      $amount  = $this->input->post('amount');
      $remarks  = $this->input->post('remarks');
      
      $this->Admin_dashboard_model->withdrawfunds_submit($mid,$amount,$remarks);

      $this->session->set_flashdata('msg', 'Funds Withdrawn');
      redirect('Admin_dashboard/activeusersfunds');
            
    }
    else{
      redirect('admin_login');
    }
  }


public function transfer_funds()
 {
   if($this->check_login()){
   $this->load->view('transfer_funds_admin_view');
     }
     else{
       redirect('admin_login');
     }
 }

public function allocate_funds_admin()
  {
    if($this->check_login()){
      $amount  = $this->input->post('amount');
      $allocated_user  = $this->input->post('user_id');
      $allocated_date = date('Y-m-d');
      $remarks  = $this->input->post('remarks');
      $data_response2 = $this->Admin_dashboard_model->same_user_name_check($allocated_user);

            if($data_response2){ 
              $allocate_pin_to_user = $this->Admin_dashboard_model->allocate_user_admin_funds($amount,$allocated_user,$allocated_date,$remarks);
              $pin_statment = $this->Admin_dashboard_model->generate_funds_statement($amount,$allocated_user,$allocated_date);
               $this->session->set_flashdata('msg', 'Funds Transfered to '.$allocated_user);
                redirect('Admin_dashboard/transfer_funds');
             }
             else{
              $this->session->set_flashdata('msg', 'Id not exist');
                   redirect('Admin_dashboard/transfer_funds');
             }



    }
    else{
      redirect('admin_login');
    }
  }

public function transfer_ifunds()
 {
   if($this->check_login()){
   $this->load->view('transfer_ifunds_admin_view');
     }
     else{
       redirect('admin_login');
     }
 }

public function send_gv()
 {
   if($this->check_login()){
   $this->load->view('transfer_gv_admin_view.php');
     }
     else{
       redirect('admin_login');
     }
 }

public function allocate_gv_admin()
  {
    if($this->check_login()){
      $amount  = $this->input->post('amount');
      $allocated_user  = $this->input->post('user_id');
      //$remarks  = $this->input->post('remarks');
      $validity  = $this->input->post('validity');
      $code  = $this->input->post('code');
      $allocated_date = date('Y-m-d');
      $remarks = '';
      $data_response2 = $this->Admin_dashboard_model->same_user_name_check($allocated_user);

            if($data_response2){ 
              $allocate_pin_to_user = $this->Admin_dashboard_model->allocate_user_admin_gv($amount,$allocated_user,$allocated_date,$remarks,$validity,$code);
              
              $this->session->set_flashdata('msg', 'Gift Vouchers Sent to '.$allocated_user);
                redirect('Admin_dashboard/send_gv');
             }
             else{
              $this->session->set_flashdata('msg', 'Id not exist');
                   redirect('Admin_dashboard/send_gv');
             }



    }
    else{
      redirect('admin_login');
    }
  }


public function allocate_ifunds_admin()
  {
    if($this->check_login()){
      $amount  = $this->input->post('amount');
      $allocated_user  = $this->input->post('user_id');
      $allocated_date = date('Y-m-d');
      $remarks  = $this->input->post('remarks');
      $data_response2 = $this->Admin_dashboard_model->same_user_name_check($allocated_user);

            if($data_response2){ 
              $allocate_pin_to_user = $this->Admin_dashboard_model->allocate_user_admin_ifunds($amount,$allocated_user,$allocated_date,$remarks);
              $pin_statment = $this->Admin_dashboard_model->generate_ifunds_statement($amount,$allocated_user,$allocated_date);
               $this->session->set_flashdata('msg', 'Funds Transfered to '.$allocated_user);
                redirect('Admin_dashboard/transfer_ifunds');
             }
             else{
              $this->session->set_flashdata('msg', 'Id not exist');
                   redirect('Admin_dashboard/transfer_ifunds');
             }



    }
    else{
      redirect('admin_login');
    }
  }


    public function sendsmstousers()
  {
    if($this->check_login())
    {
     $data['users_mobile'] = $this->Admin_dashboard_model->get_all_users_mobile();
      $this->load->view('send_sms', $data);
    }
    else
    {
      redirect('Admin_login');
    }
  }
  
  
  public function sms_submit()
  {
    if($this->check_login())
    {
     
     $users  = $this->input->post('users');
     $message  = $this->input->post('message');
     $message = rawurlencode($message);

     $url="http://sms.bulksmsind.in/sendSMS?username=kamalkochhar&message=".$message."&sendername=VENJIO&smstype=TRANS&numbers=".$users."&apikey=e1d2bccf-574e-42ef-b610-146a7858e60d";

    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $geocode = curl_exec($ch);
       
    if(curl_getinfo($ch, CURLINFO_HTTP_CODE) === 200) {
            // convert response
            $output = json_decode($geocode);
    }
    curl_close($ch);
     $this->session->set_flashdata('msg', 'SMS Sent Successfully');
                   redirect('Admin_dashboard/sendsmstousers');
    }
    else
    {
      redirect('Admin_login');
    }
  }

}