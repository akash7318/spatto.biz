<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_login extends CI_Controller {

	function __construct() 
	{

		parent::__construct();
		$this->load->model('Admin_login_model');	

	}
	



	public function index()
	{
		$this->load->view('admin_login_view');
	}





	public function login_submit()
	{
		$user_id = $this->input->post('user_id');
		$user_pass = $this->input->post('user_pass');
                  //echo $user_id;

	//	echo $user_id . $user_pass;
        $return =  $this->Admin_login_model->login_submit_model($user_id, $user_pass);


        if($return){
        	$this->session->set_userdata('admin_session', $return);
        	 redirect('Admin_dashboard');
        	//echo "login successful with" . $this->session->userdata('admin_session');
        	//echo $return;
        }
        else{
        	echo "login again";
        }

	}


	public function logout()
	{

		$user_id =  $this->session->userdata('admin_session');

		if($user_id)
		{

			$return_model =  $this->Admin_login_model->logout_model($user_id);

			if($return_model)
			{
				$this->session->unset_userdata('admin_session');
				redirect('Admin_login');
			}

			else
			{
			echo "something went wrong";
			redirect('Admin_login');
			}
		}

		else
		{
			echo "already logout";
			redirect('Admin_login');
		}

	}


	

}
