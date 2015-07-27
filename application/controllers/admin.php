<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include('password_func.php');
class Admin extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
		$config['allowed_types'] = 'gif|jpg|jpeg|JPG|JPEG|png';
        $this->load->library('upload', $config);
		 $this->load->library('gcharts');
    }
    public function index()
    {
        $page_data['page_title'] = 'Administrator Login';
        $this->load->view('admin/login',$page_data);
	}
	
    function login(){
        $page_data['page_title'] = 'Administrator Login';
        $this->load->view('admin/login',$page_data);
    }
	/*******LOGIN FUNCTION *******/
    function do_login(){
        $email = $this->input->post('email');
        $pass  = _base64_encrypt($this->input->post('password'),'bytes789');
		
        if($email=="" & $pass=="" ){
             $page_data['page_title'] = 'Administrator Login';
             $this->session->set_flashdata('flash_message','Incorrect Emailid & Password');
             $this->load->view('admin/login',$page_data);
        }else {
            $query = $this->db->get_where('site_management_users', array('emailid' => $email,'password' => $pass,'status' =>'1'));
            if ($query->num_rows() > 0) {
                $row = $query->row();
                if (!empty($row)) {
                    $this->session->set_userdata('admin_login', '1');
                    $this->session->set_userdata('manage_id', $row->manage_id);
                    $this->session->set_userdata('uname', $row->uname);
					$this->session->set_userdata('status', $row->status);
                    $this->session->set_userdata('admintype', $row->admintype);
					$this->session->set_flashdata('flash_message','Welcome');
                    redirect( base_url() . 'admin/dashboard', 'refresh');  
                 }
            }else{
                    $this->session->set_flashdata('flash_message','Login Failed');
                    redirect(base_url() . 'admin/login', 'refresh');
                 }    
        }
    }
	
	public function forgot_password()
	{
		$email = $this->input->post('email');

		$query = $this->db->get_where('users', array('emailid' => $email));
					if ($query->num_rows() > 0) {
		$output = $this->db->query("SELECT * FROM `users` WHERE `emailid`='".$email."'")->row()->password;
		$password =_base64_decrypt($output,'bytes789');

		$mailgun_fromemail = $this->db->query("SELECT * FROM sitesettings WHERE type='mailgun_fromemail'")->row()->description;

		$this->load->library('email');
		$this->email->from($mailgun_fromemail, 'Your Name');
		$this->email->to($email);
		$this->email->subject('Your Password');
		$this->email->message('Your password : '.$password);	
		$this->email->send();
		$this->session->set_flashdata('flash_message','Please check your mail');
		redirect(base_url() . 'admin/login', 'refresh');
		}else{
		$this->session->set_flashdata('flash_message','Error : Please provide correct email ID');
		redirect(base_url() . 'admin/login', 'refresh');
		}
    }
	 /*******LOGOUT FUNCTION*******/
    function logout(){
        $this->session->unset_userdata();
        $this->session->sess_destroy();
        $this->session->set_flashdata('flash_message','Successfully Logout');
        redirect( base_url() . 'admin/login', 'refresh');
    }
	/*******Dashboard*******/
    function dashboard() {
		if ($this->session->userdata('admin_login') != 1)
        redirect(base_url() . 'admin/login', 'refresh');
		
		$output = $this->db->query("SELECT * FROM `sitesettings` WHERE `type`='paypal_emailid'")->row()->description;
		if (empty($output)){
		$this->session->set_flashdata('flash_message','Add Paypal email id');
        redirect(base_url() . 'admin/payment', 'refresh');
		}
		$this->gcharts->load('DonutChart');
			$this->db->where("jbidding_type = '1'");
			$this->db->from('jobs');
		$d1 = $this->db->count_all_results();
			$this->db->where("jbidding_type = '2'");
			$this->db->from('jobs');
		$d2 = $this->db->count_all_results();
			$this->db->where("jbidding_type = '3'");
			$this->db->from('jobs');
		$d3 = $this->db->count_all_results();
			
        
        $this->gcharts->DataTable('Foods')
                      ->addColumn('string', 'Foods', 'food')
                      ->addColumn('string', 'Amount', 'amount')
                      ->addRow(array('Open Bidding', $d1))
                      ->addRow(array('Direct Assign', $d2))
					  ->addRow(array('Who First Bid', $d3));

        $config1 = array(
            'title' => 'Job Type',
            'pieHole' => .4
        );
		
		$this->gcharts->load('ColumnChart');
		
		$d1 = $this->db->count_all_results('users');
			$this->db->where("user_type = '2'");
			$this->db->from('users');
		$d2 = $this->db->count_all_results();
			$this->db->where("user_type = '1'");
			$this->db->from('users');
		$d3 = $this->db->count_all_results();
		$d4 = $this->db->count_all_results('deactivate_report');

		$this->gcharts->DataTable('Inventory')
					  ->addColumn('string', 'Classroom', 'class')
					  ->addColumn('number', 'Users', 'users')
					  ->addColumn('number', 'Posters', 'posters')
					  ->addColumn('number', 'Workers', 'workers')
					  ->addColumn('number', 'Deactive', 'deactive')
					  ->addRow(array(
						  'Users',
						  $d1,
						  $d2,
						  $d3,
						  $d4,
					  ));
		
		$config = array(
			'title' => 'Users'
		);
		
		$this->gcharts->ColumnChart('Inventory')->setConfig($config);
 		$this->gcharts->DonutChart('Foods')->setConfig($config1);
        $page_data['page_name']  = 'dashboard';
        $page_data['page_title'] = 'Administrator Dashboard';
        $this->load->view('admin/index',$page_data);
		
		
    }
	     function admin_users($param1 = '', $param2 = '', $param3 = '')
    {
         if ($this->session->userdata('admin_login') != 1)
         redirect(base_url() . 'admin/login', 'refresh');
		 if ($param1 == 'create') {
            $data['uname']       = $this->input->post('uname');
			$data['password'] =_base64_encrypt($this->input->post('password'),'bytes789');
            $data['admintype']   = $this->input->post('admintype');
            $data['emailid']     = $this->input->post('email');
            $data['status']      = $this->input->post('status');
            $this->db->insert('site_management_users', $data);
            redirect(base_url() . 'admin/admin_users/', 'refresh');        
         }
         if ($param1 == 'do_update') {
            $data['uname']        = $this->input->post('uname');
			$data['password'] =_base64_encrypt($this->input->post('password'),'bytes789');
            $data['admintype']         = $this->input->post('admintype');
            $data['emailid']     = $this->input->post('email');
            $data['status']       = $this->input->post('status');          
            $this->db->where('manage_id', $param2);
            $this->db->update('site_management_users', $data);
           // move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/admin_image/' . $param2 . '.jpg');
            redirect(base_url() . 'admin/admin_users/', 'refresh');
        } else if ($param1 == 'adminusers_profile') {
            $page_data['adminusers_profile']   = true;
            $page_data['current_manage_id'] = $param2;
        } else if ($param1 == 'edit') {
              $page_data['edit_data'] = $this->db->get_where('site_management_users', array(
                'manage_id' => $param2
            ))->result_array();
        }
         if ($param1 == 'delete') {
            $this->db->where('manage_id', $param2);
            $this->db->delete('site_management_users');
            redirect(base_url() . 'admin/admin_users/', 'refresh');
        }
                
        $page_data['admin_users']   = $this->db->get('site_management_users')->result_array();
        $page_data['page_name']  = 'admin_users';
        $page_data['page_title'] = 'Administrator User Management';
        $this->load->view('admin/index', $page_data);
    }
	
	/*** Users ***/
	 function users($param1 = '', $param2 = '', $param3 = '')
    {
		if ($this->session->userdata('admin_login') != 1)
        redirect(base_url() . 'admin/login', 'refresh');
		
		if ($param1 == 'user_create') {
		$data['full_name']       = $this->input->post('full_name');
		$data['emailid']       = $this->input->post('email');
		$data['password'] =_base64_encrypt($this->input->post('password'),'bytes789');
		$data['verify_email']       ='0';
		$data['user_type']       = $this->input->post('user_type');
		$data['signup_date']       = date('Y-m-d H:i:s');
		$data['zipcode']       = $this->input->post('zipcode');
		$data['active_status']       = $this->input->post('active_status');
		$page_data   = $this->db->get('users')->result_array();
			foreach($page_data as $row){
				if($data['emailid'] == $row['emailid'])
				{
				$this->session->set_flashdata('flash_message','User email id already Exist Try Again');
				redirect(base_url() . 'admin/users/', 'refresh');
				}
			}
		$this->db->insert('users', $data);
		$this->session->set_flashdata('flash_message','User Add Successfully');
		redirect(base_url() . 'admin/users/', 'refresh');
		}
		if ($param1 == 'user_delete') {
		$this->db->where('user_id', $param2);
					$this->db->delete('users');
					redirect(base_url() . 'admin/users/', 'refresh');
		}
		if ($param1 == 'user_update') {
		$data['full_name']       = $this->input->post('full_name');
		$data['emailid']       = $this->input->post('email');
		$data['password'] =_base64_encrypt($this->input->post('password'),'bytes789');
		$data['verify_email']       ='1';
		$data['user_type']       = $this->input->post('user_type');
		$data['signup_date']       = date('Y-m-d');
		$data['zipcode']       = $this->input->post('zipcode');
		$data['active_status']       = $this->input->post('active_status');
		$this->db->where('user_id', $param2);
					$this->db->update('users', $data);
					redirect(base_url() . 'admin/users/', 'refresh');
		}
		$this->db->order_by("user_id", "desc");
		$page_data['users']   = $this->db->get('users')->result_array();
		$page_data['page_name']  = 'users';
		$page_data['page_title'] = 'Users';
		$this->load->view('admin/index',$page_data);
	}

     /*** Categories ***/
	   
   function categories($param1 = '', $param2 = '', $param3 = '')
	{
        		if ($param1 == 'create') {
 			 $rand = rand(0000, 9999);
			 @$path=$_FILES['category_image']['name'];
			 $extension = pathinfo($path,PATHINFO_EXTENSION);
			 $filename=$rand .'.'. $extension;
			 if(!empty($path) ){
				  $moved = move_uploaded_file($_FILES['category_image']['tmp_name'], 'uploads/categories/'.$filename );
					if( $moved ) {
						$data['category_image']       = $filename;       
					} else {
						$this->session->set_flashdata('flash_message','upload Failed');
						redirect(base_url() . 'admin/categories/', 'refresh');  
					}   
			 }
					$data['category_job_type']       = $this->input->post('category_job_type');
					$data['category_parent_id']       = $this->input->post('category_parent_id');
					$data['category_name']    = $this->input->post('category_name');
					$data['category_status']   = $this->input->post('category_status');
					/*$data['category_description']      = $this->input->post('category_description');
					$data['category_average_price']      = $this->input->post('category_average_price');*/
					$this->db->insert('job_category', $data);
					$this->session->set_flashdata('flash_message','Category Add Successfully');
					redirect(base_url() . 'admin/categories/', 'refresh');        
         }
		 if ($param1 == 'edit') {
              $page_data['edit_data'] = $this->db->get_where('job_category', array(
                'category_id' => $param2
            ))->result_array();
        }
		 
		 if ($param1 == 'delete') {
			/*$path = $this->db->query("SELECT * FROM job_category WHERE category_id='".$param2."'")->row()->category_image;
			$path= 'uploads/categories/'.$path;
			if (!empty($path)) {
				unlink($path);
			  }*/
            $this->db->where('category_id', $param2);
            $this->db->delete('job_category');
			$this->session->set_flashdata('flash_message','Category deleted Successfully');
            redirect(base_url() . 'admin/categories/', 'refresh');
         }
		$this->db->order_by("category_id","desc");
		$page_data['categories']   = $this->db->get('job_category')->result_array();
        $page_data['page_name']  = 'categories';
        $page_data['page_title'] = 'Category Management';
        $this->load->view('admin/index',$page_data);
	}
	
		function locations($param1 = '', $param2 = '', $param3 = '')
	    {	
	if ($param1 == 'country_create') {
	$data['country_name']       = $this->input->post('country_name');
	$data['country_status']       = $this->input->post('status');
	$this->db->insert('countries', $data);
	            redirect(base_url() . 'admin/locations/', 'refresh');
	}
	if ($param1 == 'state_create') {
	$data['country_id']       = $this->input->post('country_id');
	$data['state_name']       = $this->input->post('state_name');
	$data['state_status']       = $this->input->post('state_status');
	$this->db->insert('states', $data);
	            redirect(base_url() . 'admin/locations/', 'refresh');
	}
	if ($param1 == 'city_create') {
	$data['country_id']       = $this->input->post('country_id');
	$data['state_id']       = $this->input->post('state_id');
	$data['city_name']       = $this->input->post('city_name');
	$data['city_status']       = $this->input->post('city_status');
	$this->db->insert('cities', $data);
	            redirect(base_url() . 'admin/locations/', 'refresh');
	}
	if ($param1 == 'country_delete') {
	$this->db->where('country_id', $param2);
	            $this->db->delete('country');
	            redirect(base_url() . 'admin/locations/', 'refresh');
	}
	if ($param1 == 'state_delete') {
	$this->db->where('state_id', $param2);
	            $this->db->delete('state');
	            redirect(base_url() . 'admin/locations/', 'refresh');
	}
	if ($param1 == 'city_delete') {
	$this->db->where('city_id', $param2);
	            $this->db->delete('city');
	            redirect(base_url() . 'admin/locations/', 'refresh');
	}
	if ($param1 == 'country_update') {
	$data['country_name']       = $this->input->post('country_name');
	$data['country_status']       = $this->input->post('status');
	$this->db->where('country_id', $param2);
	            $this->db->update('country', $data);
	            redirect(base_url() . 'admin/locations/', 'refresh');
	}
	if ($param1 == 'state_update') {
	$data['country_id']       = $this->input->post('country_id');
	$data['state_name']       = $this->input->post('state_name');
	$data['state_status']       = $this->input->post('state_status');
	$this->db->where('state_id', $param2);
	            $this->db->update('state', $data);
	            redirect(base_url() . 'admin/locations/', 'refresh');
	}
	if ($param1 == 'city_update') {
	$data['country_id']       = $this->input->post('country_id');
	$data['state_id']       = $this->input->post('state_id');
	$data['city_name']       = $this->input->post('city_name');
	$data['city_status']       = $this->input->post('city_status');
	$this->db->where('city_id', $param2);
	            $this->db->update('city', $data);
	            redirect(base_url() . 'admin/locations/', 'refresh');
	}
	$page_data['countries']   = $this->db->get('countries')->result_array();
	$page_data['states']   = $this->db->get('states')->result_array();
	$page_data['cities']   = $this->db->get('cities')->result_array();
	$page_data['page_name']  = 'locations';
	        $page_data['page_title'] = 'Location Management';
	        $this->load->view('admin/index',$page_data);
	    }


		
	function jobs($param1 = '', $param2 = '', $param3 = '')
    {
		
		
if ($param1 == 'job_comission') {
$job_comission      = $this->input->post('job_comission');
	$this->db->where('type', 'job_comission');
	$this->db->update('sitesettings', array('description' => $job_comission));   
$this->session->set_flashdata('flash_message','job Comission is Updated');
redirect(base_url() . 'admin/jobs/', 'refresh');  
}
		
/*if ($param1 == 'jobs_delete') {
$this->db->where('job_id', $param2);
            $this->db->delete('jobs');
            redirect(base_url() . 'admin/jobs/', 'refresh');
}
if ($param1 == 'jobs_update') {	
$data['job_name']       = $this->input->post('job_name');
$data['job_url_name']       = $this->input->post('job_url_name');
$data['job_description']       = $this->input->post('job_description');
$data['job_to_price']       = $this->input->post('job_to_price');
$data['job_price']       = $this->input->post('job_price');
$data['more_details']       = $this->input->post('more_details');
$data['category_id']       = $this->input->post('category_id');
$data['city_id']       = $this->input->post('city_id');
$data['user_id']       = $this->input->post('user_id');
$data['job_worker_id']       = $this->input->post('job_worker_id');
$data['job_post_date']       = $this->input->post('job_post_date');
$data['job_assigned_date']       = $this->input->post('job_assigned_date');
$data['job_complete_date']       = $this->input->post('job_complete_date');
$data['job_close_date']       = $this->input->post('job_close_date');
$data['job_cancel_date']       = $this->input->post('job_cancel_date');
$data['job_status']       = $this->input->post('job_status');
$data['job_activity_status']       = $this->input->post('job_activity_status');
$data['job_assing_worker']       = $this->input->post('job_assing_worker');
$data['job_start_day']       = $this->input->post('job_start_day');
$data['job_start_time']       = $this->input->post('job_start_time');
$data['job_end_day']       = $this->input->post('job_end_day');
$data['job_end_time']       = $this->input->post('job_end_time');
$data['job_auto_assignment']       = $this->input->post('job_auto_assignment');
$data['job_is_private']       = $this->input->post('job_is_private');
$data['job_repeat']       = $this->input->post('job_repeat');
$data['job_repeat_week']       = $this->input->post('job_repeat_week');
$data['job_online']       = $this->input->post('job_online');
$data['job_large_vehicals']       = $this->input->post('job_large_vehicals');
$data['poster_agree']       = $this->input->post('poster_agree');
$data['worker_agree']       = $this->input->post('worker_agree');
$data['extra_cost']       = $this->input->post('extra_cost');
$data['extra_cost_description']       = $this->input->post('extra_cost_description');
$data['other_cost']       = $this->input->post('other_cost');
$data['other_cost_description']       = $this->input->post('other_cost_description');
$data['job_ip']       = $_SERVER['REMOTE_ADDR'];
$this->db->where('job_id', $param2);
            $this->db->update('jobs', $data);
            redirect(base_url() . 'admin/jobs/', 'refresh');
}*/
        $page_data['rjobs']   = $this->db->get('jobs')->result_array();
$page_data['page_name']  = 'jobs';
        $page_data['page_title'] = 'Jobs';
        $this->load->view('admin/index',$page_data);
    }

 /*function commission_tracking($param1 = '', $param2 = '', $param3 = '')
    {
		$page_data['users']   = $this->db->get('users')->result_array();
		$page_data['page_name']  = 'commission_tracking';
        $page_data['page_title'] = 'Commission Tracking';
        $this->load->view('admin/index',$page_data);
	}*/
	function pay_passign_job($param1 = '',$param2 = '',$param3 = ''){
		
		$job_name = $this->db->query("SELECT * FROM jobs WHERE job_id=".$param1)->row()->jname;
		$data['job_id']         = $param1;
		$data['jaccept_workid']  = $param2;	
		$data['jname']=$job_name;	
		$this->session->set_userdata('temp_assign', $data);
		redirect(base_url() . 'admin/invoice/make_payment/'.$job_name.'/'.$param2.'/'.$param3.'/', 'refresh');		
	}
	
	
	 /******MANAGE BILLING / INVOICES WITH STATUS*****/
    function invoice($param1 = '', $param2 = '', $param3 = '',$param4='')
    {
		
        if ($param1 == 'make_payment') {
            $invoice_id      = rand(00000,99999);
            //$system_settings = 'sushanth2005-facilitator@gmail.com';
			$system_settings = $this->db->query("SELECT * FROM sitesettings WHERE type='paypal_emailid'")->row()->description;
           
            /****TRANSFERRING USER TO PAYPAL TERMINAL****/
            $this->paypal->add_field('rm', 2);
            $this->paypal->add_field('no_note', 0);
            $this->paypal->add_field('item_name', $param2);
            $this->paypal->add_field('amount',$param4);
            $this->paypal->add_field('custom', '134');
			$this->paypal->add_field('currency_code', 'USD');
			$output = $this->db->query("SELECT * FROM user_profiles WHERE user_id=".$param3)->row()->paypal_email;		
			$this->paypal->add_field('login_email',$system_settings);		
            $this->paypal->add_field('business', $output);
            $this->paypal->add_field('notify_url', base_url() . 'admin/invoice/paypal_ipn');
            $this->paypal->add_field('cancel_return', base_url() . 'admin/invoice/paypal_cancel');
            $this->paypal->add_field('return', base_url() . 'admin/invoice/paypal_success');
            
            $this->paypal->submit_paypal_post();
            // submit the fields to paypal
        }
        if ($param1 == 'paypal_ipn') {
            if ($this->paypal->validate_ipn() == true) {
                $ipn_response = '';
                foreach ($_POST as $key => $value) {
                    $value = urlencode(stripslashes($value));
                    $ipn_response .= "\n$key=$value";
                }
             /*   $data['payment_details']   = $ipn_response;
                $data['payment_timestamp'] = strtotime(date("m/d/Y"));
                $data['payment_method']    = 'paypal';
                $data['status']            = 'paid';
                $invoice_id                = $_POST['custom'];
                $this->db->where('invoice_id', $invoice_id);
                $this->db->update('invoice', $data);
				$this->db->trans_start();
				$sample[] = $this->session->userdata('temp_job');
				$this->db->insert('jobs', $sample);
				$job_id = $this->db->insert_id();
				$data['job_id']   = '$job_id';
                $data['user_id']   = $this->session->userdata('user_id');				
				$data['job_name']   =$sample['jname'];
				$data['transaction_id']   = $_POST['txn_id'];
				$data['status']            = $_POST['payment_status'];
				$data['amount']   = $_POST['mc_gross'];
                $data['payment_timestamp'] = date("Y-m-d");
                $data['payment_method']    = 'paypal';
				$this->db->insert('invoice', $data);
				$this->db->trans_complete(); */
            }
        }
        if ($param1 == 'paypal_cancel') {
			$this->session->set_flashdata('flash_message', 'Payment Cancelled');
            redirect(base_url() . 'admin/payment', 'refresh');
        }
        if ($param1 == 'paypal_success') {
			
			$this->db->trans_start();
			$assign_sample = $this->session->userdata('temp_assign');
			    $data['user_id']   = $assign_sample['jaccept_workid'];				
				$data['job_name']   =$assign_sample['jname'];
				$data['transaction_id']   = $_POST['txn_id'];
				$data['status']            = $_POST['payment_status'];
				$data['amount']   = $_POST['mc_gross'];
                $data['payment_timestamp'] = date("Y-m-d");
                $data['payment_method']    = 'paypal';
				$this->db->insert('invoice', $data);
			$this->db->trans_complete();
			$this->session->set_userdata('temp_assign', '');
            $this->session->set_flashdata('flash_message', 'Paided Successfully');
            redirect(base_url() . 'admin/payment', 'refresh');
        }
		
		$page_data['head']='dash_header.php';
		$page_data['foot']='dash_footer.php';
		$page_data['page_name']  = 'pay_disp';
		$page_data['page_title'] = '';
		$this->load->view('admin/index',$page_data);
		
    }
	
		function success(){
		$page_data['head']='dash_header.php';
        $page_data['foot']='dash_footer.php';
		$page_data['page_name']  = 'pay_success';
        $this->load->view('static/index',$page_data);
		}
		
		function cancel(){
		$page_data['head']='dash_header.php';
        $page_data['foot']='dash_footer.php';
		$page_data['page_name']  = 'pay_cancel';
        $this->load->view('static/index',$page_data);
		}
	
	
	
	/*****payment***********/
	 function payment($param1 = '', $param2 = '', $param3 = '')
    {
		if ($param1 == 'paypal_setting') {
		    $paypal_emailid      = $this->input->post('paypal_emailid');
			$this->db->where('type', 'paypal_emailid');
			$this->db->update('sitesettings', array('description' => $paypal_emailid  ));   
		$this->session->set_flashdata('flash_message','update successfully');
		redirect(base_url() . 'admin/payment/', 'refresh');  
		}
		$page_data['users']   = $this->db->get('users')->result_array();
	 	$page_data['transaction']   = $this->db->get('invoice')->result_array();
		$page_data['page_name']  = 'payment';
        $page_data['page_title'] = 'Payment';
        $this->load->view('admin/index',$page_data);
    }
	
	/*****Settings**********/
	function system_settings($param1 = '', $param2 = '', $param3 = '')
	{
		if ($this->session->userdata('admin_login') != 1)
        redirect(base_url() . 'admin/login', 'refresh');
		
		if ($param1 == 'add_side') {
			$rand = rand(0000, 9999);
			$path=$_FILES['slideshow_image']['name'];
			$extension = pathinfo($path,PATHINFO_EXTENSION);
			$filename=$rand .'.'. $extension;
			$moved = move_uploaded_file($_FILES['slideshow_image']['tmp_name'], 'uploads/slideshow/'.$filename );
			if( $moved ) {
				$data['slideshow_image']       = $filename;  
				$data['slideshow_title']       = $this->input->post('slideshow_title');
				$data['slideshow_description']    = $this->input->post('slideshow_description');
				$this->db->insert('site_slideshow', $data);  
				$this->session->set_flashdata('flash_message','Slide Image is Added');
				redirect(base_url() . 'admin/system_settings/', 'refresh');                
			} else {
				$this->session->set_flashdata('flash_message','upload Failed');
				redirect(base_url() . 'admin/system_settings/', 'refresh');  
			}
		}
	
		if ($param1 == 'image_delete') {
			$path = $this->db->query("SELECT * FROM site_slideshow WHERE slideshow_id='".$param2."'")->row()->slideshow_image;
			$path= 'uploads/slideshow/'.$path;
			if (!empty($path)) { unlink($path);}
			$this->db->where('slideshow_id', $param2);
			$this->db->delete('site_slideshow');
			$this->session->set_flashdata('flash_message','Slide image deleted Successfully');
			redirect(base_url() . 'admin/system_settings/', 'refresh');
		}
	
		if ($param2 == 'do_update') {
			$path=@$_FILES['site_logo']['name'];
			if(!empty($path)){
				$filename='logo.png';
				$moved = move_uploaded_file($_FILES['site_logo']['tmp_name'], 'uploads/'.$filename );
					if( $moved ) {
						$this->db->where('type', 'site_logo');
						$this->db->update('sitesettings', array('description' => $filename  ));             
					} else {
						$this->session->set_flashdata('flash_message','upload Failed');
						redirect(base_url() . 'admin/system_settings/', 'refresh');  
					}
			}
			
		$path=@$_FILES['site_favicon']['name'];
		if(!empty($path)){
			$filename='favicon.png';
			$moved = move_uploaded_file($_FILES['site_favicon']['tmp_name'], 'uploads/'.$filename );
				if( $moved ) {
					$this->db->where('type', 'site_favicon');
					$this->db->update('sitesettings', array('description' => $filename  ));           
				} else {
					$this->session->set_flashdata('flash_message','upload Failed');
					redirect(base_url() . 'admin/system_settings/', 'refresh');  
				}
		}
			
		foreach( $this->input->post() as $stuff => $val ) {
			if(! is_array( $stuff ) ) {
				if($stuff=='site_logo' OR $stuff=='site_favicon'){
				}else{
						if($stuff=='clr_site_logo' OR $stuff=='clr_site_favicon'){
							$clr=$this->input->post('clr_site_logo');
							if($clr=='clear'){
								$this->db->where('type', 'site_logo');
								$this->db->update('sitesettings', array('description' => '' ));
							}
							$clr=$this->input->post('clr_site_favicon');
							if($clr=='clear'){
								$this->db->where('type', 'site_favicon');
								$this->db->update('sitesettings', array('description' => '' ));
							}						
						}else{
							$this->db->where('type', $stuff);
							$this->db->update('sitesettings', array('description' => $val  ));
						}
				}
			}
		}    
	   
		$this->session->set_flashdata('flash_message','Settings Updated');
		redirect(base_url() . 'admin/system_settings/', 'refresh'); 
		}
		$page_data['slideshows']   = $this->db->get('site_slideshow')->result_array();
		$page_data['page_name']  = 'system_settings';
		$page_data['page_title'] = 'Site Management Settings';
		$this->load->view('admin/index',$page_data);    
	}
	/*** New Letter ***/
	function email_newsletter($param1 = '', $param2 = '', $param3 = '')
    {
		if ($this->session->userdata('admin_login') != 1)
        redirect(base_url() . 'admin/login', 'refresh');
		if ($param1 == 'delete') {
			$this->db->where('email_newsletter_id', $param2);
            $this->db->delete('email_newsletter');
            redirect(base_url() . 'admin/email_newsletter/', 'refresh');
		}
		if ($param1 == 'delete_mail_send') {
			$this->db->where('email_message_id', $param2);
            $this->db->delete('email_message');
            redirect(base_url() . 'admin/email_newsletter/', 'refresh');
		}
		if ($param1 == 'mail_send') {
			$data['subject']       = $this->input->post('subject');
			$data['title']       = $this->input->post('title');
			$data['content']       = $this->input->post('content');			
			$page_data   = $this->db->get('email_newsletter')->result_array();
			foreach($page_data as $row){
				$to      = $row['email'];
				$subject = $data['subject'];
				$message = $data['content'];
				$headers = 'From: webmaster@example.com' . "\r\n" .
								'Reply-To: webmaster@example.com' . "\r\n" .
								'X-Mailer: PHP/' . phpversion();
				mail($to, $subject, $message, $headers);
			}
			$this->db->insert('email_message', $data);
			redirect(base_url() . 'admin/email_newsletter/', 'refresh');
		}
		if ($param1 == 'update_email_message') {
			$data['subject']       = $this->input->post('subject');
			$data['title']       = $this->input->post('title');
			$data['content']       = $this->input->post('content');	
			$page_data   = $this->db->get('email_newsletter')->result_array();
			foreach($page_data as $row){
				$to      = $row['email'];
				$subject = $data['subject'];
				$message = $data['content'];
				$headers = 'From: webmaster@example.com' . "\r\n" .
								'Reply-To: webmaster@example.com' . "\r\n" .
								'X-Mailer: PHP/' . phpversion();
				mail($to, $subject, $message, $headers);
			}
			$this->db->where('email_message_id', $param2);
            $this->db->update('email_message', $data);
		}
		$page_data['emails']   = $this->db->get('email_newsletter')->result_array();
		$page_data['send_mails']   = $this->db->get('email_message')->result_array();
		$page_data['page_name']  = 'email_newsletter';
        $page_data['page_title'] = 'Email & Newsletter';
        $this->load->view('admin/index',$page_data);
    }
	
	/*** Dynamic Pages ***/
		function pages($param1 = '', $param2 = '', $param3 = '')
    {
		if ($this->session->userdata('admin_login') != 1)
        redirect(base_url() . 'admin/login', 'refresh');
		
		if ($param1 == 'create') {
			$data['stpage_name']       = $this->input->post('stpage_name');
			$data['stpage_title']       = $this->input->post('stpage_title');
			$data['stpage_content']       = $this->input->post('stpage_content');
			$data['stpage_status']       = $this->input->post('stpage_status');
			$this->db->insert('staticpages', $data);
			redirect(base_url() . 'admin/pages/', 'refresh');
		}
		if ($param1 == 'update') {
			$data['stpage_name']       = $this->input->post('stpage_name');
			$data['stpage_title']       = $this->input->post('stpage_title');
			$data['stpage_content']       = $this->input->post('stpage_content');
			$data['stpage_status']       = $this->input->post('stpage_status');
			$this->db->where('stpage_id', $param2);
            $this->db->update('staticpages', $data);
			redirect(base_url() . 'admin/pages/', 'refresh');
		}
		if ($param1 == 'delete') {
			$this->db->where('stpage_id', $param2);
            $this->db->delete('staticpages');
            redirect(base_url() . 'admin/pages/', 'refresh');
		}
	
		$page_data['pages']   = $this->db->get('staticpages')->result_array();
		$page_data['page_name']  = 'pages';
        $page_data['page_title'] = 'pages';
        $this->load->view('admin/index',$page_data);
    }

        /*****BACKUP / RESTORE / DELETE DATA PAGE**********/
	function backup_restore($operation = '', $type = '')
	{
		if ($this->session->userdata('admin_login') != 1)
        redirect(base_url() . 'admin/login', 'refresh');
		
		if ($operation == 'create') {
		$this->crud_model->create_backup($type);
		}
		if ($operation == 'restore') {
		$this->crud_model->restore_backup();
		$this->session->set_flashdata('backup_message', 'Backup Restored');
		redirect(base_url() . 'admin/backup_restore/', 'refresh');
		}
		if ($operation == 'delete') {
		$this->crud_model->truncate($type);
		$this->session->set_flashdata('backup_message', 'Data removed');
		redirect(base_url() . 'admin/backup_restore/', 'refresh');
		}
	$page_data['page_name']  = 'backup_restore';
	$page_data['page_title'] = 'Backup &amp; Restore';
	$this->load->view('admin/index',$page_data);
	}
	
	/******MANAGE OWN PROFILE AND CHANGE PASSWORD***/
    function manage_profile($param1 = '', $param2 = '', $param3 = '')
    {
		/*if ($this->session->userdata('admin_login') != 1)
        redirect(base_url() . 'admin/login', 'refresh');
		
		$page_data['page_name']  = 'manage_profile';
        $page_data['page_title'] = 'Manage Profile';
        $this->load->view('admin/index',$page_data);*/
		
		if ($this->session->userdata('admin_login') != 1)
        redirect(base_url() . 'admin/login', 'refresh');
		
        if ($param1 == 'update_profile_info') {
            $data['uname']  = $this->input->post('name');
            $data['emailid'] = $this->input->post('email');
            
            $this->db->where('manage_id', $this->session->userdata('manage_id'));
            $this->db->update('site_management_users', $data);
            $this->session->set_flashdata('flash_message', 'Account Updated');
            redirect(base_url() . 'admin/manage_profile/', 'refresh');
        }
        if ($param1 == 'change_password') {
			$data['password']  = _base64_encrypt($this->input->post('password'),'bytes789');
            $data['new_password']         = $this->input->post('new_password');
            $data['confirm_new_password'] = $this->input->post('confirm_new_password');
				$data['pass']  = _base64_encrypt($data['new_password'] ,'bytes789');
            
            $current_password = $this->db->get_where('site_management_users', array(
                'manage_id' => $this->session->userdata('manage_id')
            ))->row()->password;
			
            if ($current_password == $data['password'] && $data['new_password'] == $data['confirm_new_password']) {
                $this->db->where('manage_id', $this->session->userdata('manage_id'));
                $this->db->update('site_management_users', array(
                    'password' => $data['pass']
                ));
                $this->session->set_flashdata('flash_message','Password Updated');
            } else {
                $this->session->set_flashdata('flash_message', 'Password Mismatch');
            }
            redirect(base_url() . 'admin/manage_profile/', 'refresh');
        }
		
		$page_data['page_name']  = 'manage_profile';
        $page_data['page_title'] = 'Manage Profile';
        $page_data['edit_data']  = $this->db->get_where('site_management_users', array(
            'manage_id' => $this->session->userdata('manage_id')
        ))->result_array();
           $this->load->view('admin/index',$page_data);
    }
	
}
