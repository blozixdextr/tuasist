<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include('password_func.php');

class Home extends CI_Controller {

	function __construct()
    {
		
        parent::__construct();
        $this->load->database();
		$config['allowed_types'] = 'gif|jpg|jpeg|JPG|JPEG|png';
        $this->load->library('upload', $config); 
    }	
	
	/***DEFAULT NOR FOUND PAGE*****/
    function four_zero_four()
    {
        $this->load->view('four_zero_four');
    }
	
	function offline()
	{
		$this->load->view('static/underconstruction');
	}
	
	public function index()
	{
		$page_data['slideshow']   = $this->db->get('site_slideshow')->result_array();
        $page_data['head']='header.php';
        $page_data['foot']='footer.php';
        $page_data['page_name']  = 'home';
        $this->load->view('static/index',$page_data);	
	}
	
	public function how_it_works ()
	{
		$page_data['head']='header.php';
        $page_data['foot']='footer.php';
        $page_data['page_title'] = 'How it works';
		$page_data['page_name']  = 'howitworks';
        $this->load->view('static/index',$page_data);
	}

	public function become_jobrabbit ()
	{
		$page_data['head']='header.php';
        $page_data['foot']='footer.php';
		$page_data['page_name']  = 'become_jobrabbit';
        $this->load->view('static/index',$page_data);
	}
	
	public function page ()
	{
		$this->db->where('stpage_id',$this->input->get('page'));
        $page_data['staticpages']   =   $this->db->get('staticpages')->result_array();
        $page_data['head']='header.php';
        $page_data['foot']='footer.php';
		$page_data['page_name']  = 'page';
		$this->load->view('static/index',$page_data);
	}
	
	public function signup($param1 = '')
	{
		if ($param1 == 'user_create') {
        $data['full_name']       = $this->input->post('full_name');
		$data['emailid']       = $this->input->post('email');
		$data['password'] =_base64_encrypt($this->input->post('password'),'bytes789');
		$data['verify_email']       ='0';
		$data['user_type']       = '0';
		$data['signup_date']       = date('Y-m-d H:i:s');
		$data['zipcode']       = $this->input->post('zipcode');
		$data['active_status']       = '1';
		$page_data   = $this->db->get('users')->result_array();
			foreach($page_data as $row){
				if($data['emailid'] == $row['emailid'])
				{
				$this->session->set_flashdata('flash_message','User email id already Exist Try Again');
				redirect(base_url() . 'home/signup/', 'refresh');
				}
			}
		
		$this->db->trans_start();
		$this->db->insert('users', $data);
		$user_id = $this->db->insert_id();
		$this->db->query("INSERT INTO `user_profiles` (`profile_id`, `user_id`, `gender`, `dob`, `user_image`, `address`, `about_info`, `location_map`, `skills`, `profile_links`, `mobile`, `phone`, `paypal_email`)VALUES(NULL, '".$user_id."', '0', '', '', '', '', '', '', '', '', '', '') ");
		$this->db->trans_complete();
		$this->email_model->Registration($data);
		$this->session->set_flashdata('flash_message','<h3 style="color: green;text-align: center;">Successfully registered <br/>please check your emaidid</h3>');
		redirect(base_url() . 'home/login/', 'refresh');
		}
		$page_data['page_name']  = 'signup';
		$page_data['page_title'] = 'Signup';
        $this->load->view('static/index',$page_data);
	}
	
	function reg_msg(){
		$page_data['page_name']  = 'reg_msg';
		$page_data['page_title'] = 'reg_msg';
        $this->load->view('static/index',$page_data);	
	}
	
	public function login (){
		$page_data['page_name']  = 'login';
		$page_data['page_title'] = 'Login';
        $this->load->view('static/index',$page_data);
	}
	
	 function do_login(){
        $email = $this->input->post('email');
        $pass  = _base64_encrypt($this->input->post('password'),'bytes789');
		
        if($email=="" & $pass=="" ){
             $page_data['page_title'] = 'Login';
             $this->session->set_flashdata('flash_message','<p style="color: red;text-align: center;" class="flashMsg flashSuccess">Incorrect Emailid & Password</p>');
             $this->load->view('home/login',$page_data);
        }else {
            $query = $this->db->get_where('users', array('emailid' => $email,'password' => $pass));
            if ($query->num_rows() > 0) {
                $row = $query->row();
                if (!empty($row)) {
					if($row->active_status==1){
                    $this->session->set_userdata('user_login', '1');
                    $this->session->set_userdata('user_id', $row->user_id);
                    $this->session->set_userdata('full_name', $row->full_name);
                    $this->session->set_userdata('user_type', $row->user_type);
					$this->session->set_flashdata('flash_message','Welcome');
                    redirect( base_url() . 'home/dashboard', 'refresh');  
					}else {
					$this->session->set_flashdata('flash_message','<p style="color: red;text-align: center;" class="flashMsg flashSuccess">Login Failed</p>');
                    redirect(base_url() . 'home/login', 'refresh');
					}
                 }
            }else{
                    $this->session->set_flashdata('flash_message','<p style="color: red;text-align: center;" class="flashMsg flashSuccess">Login Failed</p>');
                    redirect(base_url() . 'home/login', 'refresh');
                 }    
        }
    }	
	public function facebook(){
			require 'facebook/facebook.php';
			$appId = $this->db->query("SELECT * FROM `sitesettings` WHERE `type` = 'facebook_apikey'")->row()->description;
			$secret = $this->db->query("SELECT * FROM `sitesettings` WHERE `type` = 'facebook_applicationkey'")->row()->description;
			$facebook_profile = $this->db->query("SELECT * FROM `sitesettings` WHERE `type` = 'facebook_profile'")->row()->description;
			$facebook = new Facebook(array(
			  'appId'  => $appId,
			  'secret' => $secret,
			));
			$user = $facebook->getUser();
			if ($user) {
			  try {
				$user_profile = $facebook->api('/me');
			  } catch (FacebookApiException $e) {
				error_log($e);
				$user = null;
			  }
			}
			$email = $user_profile['email'];
			
			$query = $this->db->get_where('users', array('emailid' => $email));
            if ($query->num_rows() > 0) {
                $row = $query->row();
                if (!empty($row)) {
					if($row->active_status==1){
                    $this->session->set_userdata('user_login', '1');
                    $this->session->set_userdata('user_id', $row->user_id);
                    $this->session->set_userdata('full_name', $row->full_name);
                    $this->session->set_userdata('user_type', $row->user_type);
					$this->session->set_flashdata('flash_message','Welcome');
                    redirect( base_url() . 'home/dashboard', 'refresh');  
					}
                 }
			 }else{
				$this->db->trans_start();
				$data['full_name']       = $user_profile['name'];
				$data['emailid']         = $user_profile['email'];
				$rand = rand(0000,9999);
				$data['password'] =_base64_encrypt($rand,'bytes789');
				$data['verify_email']    = '1';
				$data['user_type']       = '0';
				$data['signup_date']     = date('Y-m-d H:i:s');
				$data['active_status']   = '1';
				$this->db->insert('users', $data);
				$user_id = $this->db->insert_id();
				$this->db->query("INSERT INTO `user_profiles` (`profile_id`, `user_id`, `gender`, `dob`, `user_image`, `address`, `about_info`, `location_map`, `skills`, `profile_links`, `mobile`, `phone`)VALUES(NULL, '".$user_id."', '0', '', '', '', '', '', '', '', '', '') ");
				$this->db->trans_complete(); 
				$this->session->set_userdata('user_login', '1');
                $this->session->set_userdata('user_id', $user_id);
				$this->session->set_userdata('full_name', $data['full_name']);
				$this->session->set_userdata('user_type', '0');
				$this->session->set_flashdata('flash_message','Welcome');
                redirect( base_url() . 'home/dashboard', 'refresh'); 
			 }   
	}
	
	function logout(){
        $this->session->unset_userdata();
        $this->session->sess_destroy();
        $this->session->set_flashdata('flash_message','Successfully Logout');
        redirect( base_url() . 'home/login', 'refresh');
    }
	
	public function dashboard($param1 = '',$param2 = ''){
		if ($this->session->userdata('user_login') != 1){
        redirect(base_url() . 'home/login', 'refresh');
		}
		$type =$this->session->userdata('user_type');
		
		if($type == '0'){
			$page_data['head']='dash_header.php';
			$page_data['foot']='dash_footer.php';
			$page_data['page_name']  = 'choose_type';
			$this->load->view('static/index',$page_data);
		}else{
			
			$user_id =$this->session->userdata('user_id');
			$this->session->set_userdata('checking', '1');
			$profile = $this->db->get_where('user_profiles', array('user_id' =>$user_id))->result_array();
			/*foreach ($profile as $prof) {
				//$prof['user_image']==""
				if ($prof['gender']=="" OR $prof['dob']=="" OR $prof['about_info']=="" OR $prof['skills']==""){
					$this->session->set_flashdata('flash_message','Please Update Your profile');
					$this->session->set_userdata('checking', '0');
					redirect(base_url() . 'home/profile', 'refresh');
				}
				
				if ($prof['address']=="" OR $prof['mobile']==""){
					$this->session->set_flashdata('flash_message','Please fill Your Information');
					$this->session->set_userdata('checking', '0');
				redirect(base_url() . 'home/account', 'refresh');
				
			}
			
			if( $prof['paypal_email']==""){
				$this->session->set_flashdata('flash_message','Add Your paypal Account');
				$this->session->set_userdata('checking', '0');
				redirect(base_url() . 'home/wpayment_settings', 'refresh');
			}
				
			}*/			
			$page_data['head']='dash_header.php';
			$page_data['foot']='dash_footer.php';
			if($type=='1'){	$page_data['page_name']  = 'dash_worker'; }
			if($type=='2'){	$page_data['page_name']  = 'dash_poster'; }
			$this->load->view('static/index',$page_data);
		}	
		
			
	}
	
	function choose_type ($param1 = '')
	{
		if ($this->session->userdata('user_login') != 1)
        redirect(base_url() . 'home/login', 'refresh');
		
		if ($param1 == 'update_user') {
			$data['user_type']       = $this->input->post('user_type');
			$user_id =$this->session->userdata('user_id');
			$this->db->where('user_id', $user_id);
			$this->db->update('users', $data);
			$this->session->set_userdata('user_type', $data['user_type']);
			$this->session->set_flashdata('flash_message','Successfully Updated');
			redirect(base_url() . 'home/dashboard', 'refresh');
		}
	
	}

	public function search()
	{
		if ($this->session->userdata('user_login') != 1)
        redirect(base_url() . 'home/login', 'refresh');

	    	$title = $this->input->post('search');

		    $searchTerms = explode(' ', $title);


		    foreach($searchTerms as $term)
		    {
		    	$query = $this->db->query("SELECT * FROM `jobs` WHERE `jaddress` like '%".$term."%' AND `jwork_status` = 1 AND `jwork_status` != 2");
		    }

		  $page_data['recent_jobs'] = $query->result_array();
		  $page_data['head']='dash_header.php';
		  $page_data['foot']='dash_footer.php';
		  $page_data['page_name']  = 'wcategory_jobs';
		  $this->load->view('static/index',$page_data);
	}

	public function view_map()
	{
	  if ($this->session->userdata('user_login') != 1)
        redirect(base_url() . 'home/login', 'refresh');

	  $page_data['job_view']   = $this->db->get_where('jobs', array('jwork_status' => 1,'jwork_status !=' => 2))->result_array();
	 // $page_data['job_view'] = $this->db->get_where('jobs', array('job_id' => $param1))->result_array();		
	 // var_dump($page_data['job_view']);
	  $page_data['head']='dash_header.php';
	  $page_data['foot']='dash_footer.php';
	  $page_data['page_name']  = 'view_map';
	  $this->load->view('static/index',$page_data);
	}


	
	public function forgot_password()
	{
		$data['email']       = $this->input->post('email');
		$query = $this->db->get_where('users', array('emailid' => $data['email']));
					if ($query->num_rows() > 0) {
		$output = $this->db->query("SELECT * FROM `users` WHERE `emailid`='".$data['email']."'")->row()->password;
		$data['password'] =_base64_decrypt($output,'bytes789');
		$this->email_model->forgot_password($data);
		
		$this->session->set_flashdata('flash_message','<p style="color:green;text-align: center;" class="flashMsg flashSuccess">Please check your mail</p>');
		redirect(base_url() . 'home/login', 'refresh');
		}else{
		$this->session->set_flashdata('flash_message','<p style="color: red;text-align: center;" class="flashMsg flashSuccess">Error : Please provide correct email ID</p');
		redirect(base_url() . 'home/login', 'refresh');
		}
    }
	
	public function profile($param1 = '', $param2 = '')
	{
		if ($this->session->userdata('user_login') != 1)
        redirect(base_url() . 'home/login', 'refresh');
		
		if ($param1 == 'update') {
			$user_imagetxt       = $this->input->post('user_imagetxt');
        $data['gender']       = $this->input->post('gender');
		$data['dob']       = $this->input->post('dob');
		$data['about_info']       = $this->input->post('about_info');
		$data['location_map']       = $this->input->post('location_map');
		//$data['user_image']       = $this->input->post('user_image');
		$data['skills']       = $this->input->post('skills');
		$data['profile_links']       = $this->input->post('face').'*'.$this->input->post('twitter');
		$path=@$_FILES['user_image']['name'];
			if(!empty($path)){
				$extension = end(explode('.', $_FILES['user_image']['name']));
				$rand = mt_rand(00000,99999);
				$filename =$rand.".".$extension;
	$config['image_library'] = 'gd2';
	$config['source_image'] = $_FILES['user_image']['tmp_name'];
	$config['new_image'] = 'uploads/profiles/'.$filename;
	$config['create_thumb'] = FALSE;
	$config['maintain_ratio'] = FALSE;
	$config['width'] = 200;
	$config['height'] = 200;
	// Load the Library
	$this->load->library('image_lib', $config);
	
	// resize image
	$this->image_lib->resize();
	// handle if there is any problem
	if ( ! $this->image_lib->resize()){
		$this->session->set_flashdata('flash_message','upload Failed');
						redirect(base_url() . 'home/profile/', 'refresh');  
	}else{
		$user_id =  $this->session->userdata('user_id');
		$this->db->where('user_id', $user_id);
		$this->db->update('user_profiles', array('user_image' => $filename  )); 
		$file = "uploads/profiles/".$user_imagetxt; // get all file names
      if(is_file($file))
        unlink($file); // delete file  
	}
				/*$moved = move_uploaded_file($_FILES['user_image']['tmp_name'], 'uploads/profiles/'.$filename );
				if( $moved ) {
					$user_id =  $this->session->userdata('user_id');
						$this->db->where('user_id', $user_id);
						$this->db->update('user_profiles', array('user_image' => $filename  ));    
					} else {
						$this->session->set_flashdata('flash_message','upload Failed');
						redirect(base_url() . 'home/profile/', 'refresh');  
					}*/
			}
		
		//print_r($data);
		$this->db->from('job_category');
		$cat_count = $this->db->count_all_results();
		$ck ="";
		for($i=0;$i<=$cat_count;$i++){
			$sa= $this->input->post('ck-'.$i);
			if(!empty($sa))
			{
			$ck = $ck . $this->input->post('ck-'.$i).','; 	
			}
		}
		$data['selected_catagories']       =$ck;
		$this->db->where('user_id', $param2);
        $this->db->update('user_profiles', $data);
		 $this->session->set_flashdata('flash_message','Updated Successfully');
		  redirect(base_url() . 'home/profile/', 'refresh');
		}
		
		$user_id =  $this->session->userdata('user_id');
		$page_data['edit_data'] = $this->db->get_where('user_profiles', array(
                'user_id' => $user_id
            ))->result_array();
	
		$page_data['head']='dash_header.php';
        $page_data['foot']='dash_footer.php';
		$page_data['page_name']  = 'profile';
        $this->load->view('static/index',$page_data);
	}

	function account($param1 = '', $param2 = '') {
		if ($this->session->userdata('user_login') != 1)
        redirect(base_url() . 'home/login', 'refresh');
		if ($param1 == 'update') {
			$dat['full_name'] = $this->input->post('name');
			$dat['zipcode'] = $this->input->post('zipcode');
			$data['address'] = $this->input->post('address');
			$data['mobile'] = $this->input->post('mobile');
			$data['phone'] = $this->input->post('home_phone');
				$this->db->where('user_id', $param2);
				$this->db->update('users', $dat);
				$this->db->where('user_id', $param2);
				$this->db->update('user_profiles', $data);
				 $this->session->set_flashdata('flash_message','Updated Successfully');
				redirect(base_url() . 'home/account/', 'refresh');
		}
    	$page_data['head']='dash_header.php';
        $page_data['foot']='dash_footer.php';
		$page_data['page_name']  = 'account';
        $this->load->view('static/index',$page_data);
    }
	
	function changepassword($param1 = '', $param2 = '') {
			if ($this->session->userdata('user_login') != 1)
       		 redirect(base_url() . 'home/login', 'refresh');
			 
		if ($param1 == 'update_pass') {
			$old_pass 		=_base64_encrypt($this->input->post('old_pass'),'bytes789');
			$new_pass_en	=_base64_encrypt($this->input->post('new_pass'),'bytes789');
			$new_pass 		= $this->input->post('new_pass');
			$confirm_pass  	= $this->input->post('confirm_pass');
			if($new_pass == $confirm_pass){
				$output = $this->db->query("SELECT * FROM `users` WHERE `user_id`=".$param2)->row()->password;
				if($output == $old_pass){
					if($output != $new_pass_en)
					{
						$data['password']       = $new_pass_en;
						$this->db->where('user_id', $param2);
						$this->db->update('users', $data);
						$this->session->set_flashdata('flash_message','Password Changed!');
						redirect(base_url() . 'home/changepassword/', 'refresh');
					}else{
						$this->session->set_flashdata('flash_message','Error : Password Mismatch!');
						redirect(base_url() . 'home/changepassword/', 'refresh');
					}
				}else{
					$this->session->set_flashdata('flash_message','Error : Password Mismatch!');
					redirect(base_url() . 'home/changepassword/', 'refresh');
				}
			}else{
				$this->session->set_flashdata('flash_message','Error : Password Mismatch!');
				redirect(base_url() . 'home/changepassword/', 'refresh');
			}
		}
		
    	$page_data['head']='dash_header.php';
        $page_data['foot']='dash_footer.php';
		$page_data['page_name']  = 'changepassword';
        $this->load->view('static/index',$page_data);
    }
	
	function wpayment_settings($param1 = '', $param2 = '') {
		if ($this->session->userdata('user_login') != 1)
        redirect(base_url() . 'home/login', 'refresh');
		if ($param1 == 'update') {
			$data['user_id']				= $param2;
			$data['paypal_email'] 				= $this->input->post('paypal_email');
			$this->db->where('user_id', $param2);
        $this->db->update('user_profiles', $data);
		 $this->session->set_flashdata('flash_message','Updated Successfully');
		redirect(base_url() . 'home/wpayment_settings/', 'refresh');
		}
		$user_id =  $this->session->userdata('user_id');
		$page_data['edit_data'] = $this->db->get_where('user_profiles', array(
                'user_id' => $user_id
            ))->result_array();
    	$page_data['head']='dash_header.php';
        $page_data['foot']='dash_footer.php';
		$page_data['page_name']  = 'wpayment_settings';
        $this->load->view('static/index',$page_data);
    }
	
	function confirm_deactivation($param1 = '', $param2 = '') {
		if ($this->session->userdata('user_login') != 1)
        redirect(base_url() . 'home/login', 'refresh');
		if ($param1 == 'insert') {
			$data['user_id']				= $param2;
			$data['reason'] 				= $this->input->post('reason');
			$data['deactivate_date_time'] 	= date('Y-m-d H:i:s');
			
			$this->db->trans_start();
				$this->db->insert('deactivate_report', $data);
				$dat['active_status'] 	= '2';
				$this->db->where('user_id', $param2);
				$this->db->update('users', $dat);
			$this->db->trans_complete();
			
			$this->session->unset_userdata();
        	$this->session->sess_destroy();
			//$this->session->set_flashdata('flash_message','Deactivate Successfully');
			redirect(base_url(), 'refresh');
		}
		
    	$page_data['head']='dash_header.php';
        $page_data['foot']='dash_footer.php';
		$page_data['page_name']  = 'confirm_deactivation';
        $this->load->view('static/index',$page_data);
    }
	
	/***** Transaction *****/
	function transaction() 
	{
		if ($this->session->userdata('user_login') != 1)
        redirect(base_url() . 'home/login', 'refresh');
		
		$user_id =  $this->session->userdata('user_id');
		$this->db->order_by("invoice_id", "desc");
		$page_data['recent_invoice'] = $this->db->get_where('invoice', array('user_id' => $user_id))->result_array();
		$page_data['head']='dash_header.php';
        $page_data['foot']='dash_footer.php';
		$page_data['page_name']  = 'invoice';
        $this->load->view('static/index',$page_data);
	}
	
	 /******MANAGE BILLING / INVOICES WITH STATUS*****/
    function invoice($param1 = '', $param2 = '', $param3 = '')
    {
		if ($this->session->userdata('user_login') != 1)
        redirect(base_url() . 'home/login', 'refresh');
		
        if ($param1 == 'make_payment') {
            $invoice_id      = rand(00000,99999);
            //$system_settings = 'sushanth2005-facilitator@gmail.com';
			$system_settings = $this->db->query("SELECT * FROM sitesettings WHERE type='paypal_emailid'")->row()->description;
           
            /****TRANSFERRING USER TO PAYPAL TERMINAL****/
            $this->paypal->add_field('rm', 2);
            $this->paypal->add_field('no_note', 0);
            $this->paypal->add_field('item_name', $param2);
            $this->paypal->add_field('amount',$param3);
            $this->paypal->add_field('custom', '134');
			$this->paypal->add_field('currency_code', 'USD');
			$user_id =  $this->session->userdata('user_id');
			$output = $this->db->query("SELECT * FROM user_profiles WHERE user_id=".$user_id)->row()->paypal_email;		
			$this->paypal->add_field('login_email',$output);		
            $this->paypal->add_field('business', $system_settings);
            $this->paypal->add_field('notify_url', base_url() . 'home/invoice/paypal_ipn');
            $this->paypal->add_field('cancel_return', base_url() . 'home/invoice/paypal_cancel');
            $this->paypal->add_field('return', base_url() . 'home/invoice/paypal_success');
            
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
			//$this->session->set_flashdata('flash_message', 'Payment Cancelled');
            redirect(base_url() . 'home/cancel', 'refresh');
        }
        if ($param1 == 'paypal_success') {		
			$this->db->trans_start();
			$job_temp=$this->session->userdata('temp_job');
			$data['job_id']=$job_temp['job_id'];
			$data['user_id']   = $this->db->query("SELECT * FROM jobs WHERE job_id=".$data['job_id'])->row()->jposter_id;				
			$data['job_name']   =$job_temp['job_name'];	
			$data['transaction_id']   = $_POST['txn_id'];
			$data['status']            = $_POST['payment_status'];
			$data['amount']   = $_POST['mc_gross'];
			$data['payment_timestamp'] = date("Y-m-d");
			$data['payment_method']    = 'paypal';
			$this->db->insert('invoice', $data);
			$data1['jaccept_amt']       = $_POST['mc_gross'];
			$data1['jconformed_date']       = date('Y-m-d');
			$data1['jwork_status']       = '4';
			$data1['job_pay']       = '1';			
			$this->db->where('job_id', $data['job_id']);
			$this->db->update('jobs', $data1);
			$this->db->trans_complete();
			$data['email']   = $this->db->query("SELECT * FROM users WHERE user_id=".$data['user_id'])->row()->emailid;
			$this->email_model->paypal_success($data);
           // $this->session->set_flashdata('flash_message', 'Payment Successfully');
            redirect(base_url() . 'home/success', 'refresh');
        }
		
		$page_data['head']='dash_header.php';
		$page_data['foot']='dash_footer.php';
		$page_data['page_name']  = 'pay_disp';
		$this->load->view('static/index',$page_data);
		
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
		
		 function get_category()
    {
        $job_type = $_REQUEST['job_type'];  
        $result = $this->crud_model->get_category($job_type);        
        echo  '<select name="category" id="category" class="form-control" required="required">';
        echo  '<option value="0">-Select One-</option>';
        foreach($result as $key=>$val)
        {                
            echo '<option value="'.$key.'">'.$val.'</option>';
        }
        echo '</select>';
    }
	
	 function get_subcategory()
    {
        $category_parent_id = $_REQUEST['category_parent_id'];  
        $result = $this->crud_model->get_subcategory($category_parent_id);        
        echo  '<select name="sub_categroy" class="form-control" required="required">';
        echo  '<option value="0">-Select One-</option>';
        foreach($result as $key=>$val)
        {                
               echo '<option value="'.$key.'">'.$val.'</option>';
        }
        echo '</select>';
	}
	
	function post_a_job($param1 = '')
	 {
		if ($this->session->userdata('user_login') != 1)
        redirect(base_url() . 'home/login', 'refresh');
		
		if ($param1 == 'job_create') {
			$sa= $this->input->post('sub_categroy');
				if(empty($sa)){
					 $data['category_id']       = $this->input->post('category');
				}else {
					 $data['category_id']       = $this->input->post('sub_categroy');
				}
			   $data['jposter_id']=$this->session->userdata('user_id');
			   $data['jposted_date'] =date('Y-m-d');
			   $data['jname'] = $this->input->post('jname');
			   $data['jdescription'] =$this->input->post('jdescription');
			   $data['jact_status']       = '1';			
			   $data['jbilling_by']       = $this->input->post('jbilling_by');
			   $data['jbilling_no_hours']       = $this->input->post('jbilling_no_hours');
			   $data['jbilling_no_days'] =$this->input->post('jbilling_no_days');
			   $price="";
			   if($this->input->post('jbilling_by')==1) {
				    $data['jposter_price']       = $this->input->post('hour_price');
				    $price= $this->input->post('hour_price')*$this->input->post('jbilling_no_hours') ;
			   }elseif($this->input->post('jbilling_by')==2){
			   		$data['jposter_price']       = $this->input->post('day_price');
					$price=$this->input->post('day_price')*$this->input->post('jbilling_no_days');
			   }
			  $data['jbidding_type']    = $this->input->post('jbidding_type');
			  $data['jbidding_st_date'] =$this->input->post('jbidding_st_date');
			  $data['jbidding_ed_date'] = $this->input->post('jbidding_ed_date');
			  $data['jassign_to_work_id'] = $this->input->post('jassign_to_work_id');
			  if($this->input->post('jbidding_type')=='2'){
			  	$data['jassign_date']      = date('Y-m-d');
			  	$data['jassign_amt']       = $price;
			  	$data['jwork_status']     = '2';	
			  }else {
			  	$data['jassign_date']      = '0000-00-00';
			  	$data['jassign_amt']       = '0';  
			  	$data['jwork_status']      = '1';	
			  }
			  $data['jaccept_workid']      = '0';
			  $data['jaccept_date' ]       = '0000-00-00';
			  $data['jcancel_date']       =  '0000-00-00';
			  $data['jcancel_msg']       =  '';
			  $data['jaccept_amt']         = '0';
			  $data['jconformed_date']      = '0000-00-00';
			  $data['jcomplete_date']      = '0000-00-00';
			  $data['jcomplete_amt']       ='0';
			  $data['jfeedback']           = '';  
			  $data['jposter_fav']         = '0';
			  $data['jworker_fav']         = '0';
			  $data['jreject_date']       =  '0000-00-00';
			  $data['jreject_msg']       =  '';
			  $data['jstar_rate']       =  '0';
			  $data['job_pay']       =  '0';
			  $data['jlongitude']   = $this->input->post('lon');
			  $data['jlatitude']   = $this->input->post('lat');
			  $addres = $this->input->post('address') .', '. $this->input->post('zip');
			  $data['jaddress']  = $addres;
			  $data['jzipcode'] = $this->input->post('zip');
			  $this->db->insert('jobs', $data);
			  $zip = $this->input->post('zip');

			  $zipDB = $this->db->query("SELECT *FROM `users` WHERE `zipcode` =".$zip." AND `user_type` = 1")->result_array();
			  foreach ($zipDB as $zips) 
			  {
			  	$this->email_model->notification($zips);
			  }

			  $this->session->set_flashdata('flash_message','job posted Successfully');
				redirect(base_url() . 'home/dashboard', 'refresh');
			
		}
		$user_id =  $this->session->userdata('user_id');
		$page_data['users']   = $this->db->get_where('jobs', array('jposter_fav' => 1,'jposter_id' => $user_id))->result_array();		
		$page_data['head']='dash_header.php';
        $page_data['foot']='dash_footer.php';
		$page_data['page_name']  = 'post_a_job';
        $this->load->view('static/index',$page_data);
	 }	
	 
	 public function job_update (){
		if ($this->session->userdata('user_login') != 1)
        redirect(base_url() . 'home/login', 'refresh');
		
		$job_id      = $this->input->post('job_id');
		$data['jdescription']       = $this->input->post('jdescription');
		$this->db->where('job_id', $job_id);
		$this->db->update('jobs', $data);
		$this->session->set_flashdata('flash_message','Successfully Updated');
			redirect(base_url() . 'home/dashboard', 'refresh');
	
	}
	function reassign($param1 = '') {
		$data['jwork_status']       = '1';
		$data['jassign_to_work_id']       = '0';
		$data['jassign_date']       = '0000-00-00';
		$data['jaccept_amt']       = '0';
		$data['jassign_to_work_id']       = '0';
		$data['jassign_amt']       = '0';
		$data['jaccept_workid']       = '0';
		$data['jaccept_date']       = '0000-00-00';
	$this->db->where('job_id', $param1);
		$this->db->update('jobs', $data);	
		$this->session->set_flashdata('flash_message','Reassign Job');
			redirect(base_url() . 'home/dashboard', 'refresh');
	}
		 
	 function openbids()
    {
    	if ($this->session->userdata('user_login') != 1)
        redirect(base_url() . 'home/login', 'refresh');
		
		$user_id =  $this->session->userdata('user_id');
		$this->db->order_by("job_id", "desc");
		$this->db->where('jwork_status !=', '5');
		$this->db->where('jwork_status !=', '6'); 
		$page_data['recent_jobs']   = $this->db->get_where('jobs', array('jbidding_type' => 1,'jposter_id' => $user_id))->result_array();
		$page_data['head']='dash_header.php';
        $page_data['foot']='dash_footer.php';
		$page_data['page_name']  = 'popenbids';
        $this->load->view('static/index',$page_data);
    }
	
	function pjob_bids($param1 = '')
	{
		if ($this->session->userdata('user_login') != 1)
        redirect(base_url() . 'home/login', 'refresh');
		
		$page_data['job_view'] = $this->db->get_where('jobs', array('job_id' => $param1))->result_array();		
		$page_data['head']='dash_header.php';
        $page_data['foot']='dash_footer.php';
		$page_data['page_name']  = 'pjob_bids';
        $this->load->view('static/index',$page_data);
	}
	
	function pjob_assign($param1 = '',$param2 = '',$param3 = ''){
		if ($this->session->userdata('user_login') != 1)
        redirect(base_url() . 'home/login', 'refresh');
		//$job_name = $this->db->query("SELECT * FROM jobs WHERE job_id=".$param1)->row()->jname;
		//$data['job_id']         = $param1;
		$data['jwork_status']       = '2';
		$data['jassign_date']       = date('Y-m-d');
		$data['jassign_to_work_id']  = $param2;
		$data['jassign_amt']       =  $param3;	
		$this->db->where('job_id', $param1);
		$this->db->update('jobs', $data);
		 $this->session->set_flashdata('flash_message','Job Assigned Successfully');
		redirect(base_url() . 'home/openbids', 'refresh');		
	}
	
	function pprofile_view($param1 = '')
	{
		if ($this->session->userdata('user_login') != 1)
        redirect(base_url() . 'home/login', 'refresh');
		
		$this->db->select('*'); // Select field
		$this->db->from('users'); // from Table1
		$this->db->join('user_profiles','users.user_id = user_profiles.user_id','INNER'); // Join table1 with table2 based on the foreign key
		$this->db->where('users.user_id',$param1); 
		
		// Set Filter
		$page_data['user_profile'] = $this->db->get()->result_array();
		$this->db->order_by("job_id", "desc");
		$this->db->limit(20);
		$page_data['job_desp'] = $this->db->get_where('jobs', array('jaccept_workid' => $param1))->result_array();		
		$page_data['head']='dash_header.php';
        $page_data['foot']='dash_footer.php';
		$page_data['page_name']  = 'pprofile_view';
        $this->load->view('static/index',$page_data);
	}
	
	function pjob_conform($param1 = '',$param2 = '')
	{
		if ($this->session->userdata('user_login') != 1)
        redirect(base_url() . 'home/login', 'refresh');
		if(!empty($param1)){
		$data['job_id']       = $param1;		
		$data['jwork_status']       = '4';
		$data['job_name']= $this->db->query("SELECT * FROM jobs WHERE job_id=".$param1)->row()->jname;
		$this->session->set_userdata('temp_job', $data);	
		redirect(base_url() . 'home/invoice/make_payment/'.$data['job_name'].'/'.$param2.'/', 'refresh');		
		}
		redirect(base_url() . 'home/dashboard', 'refresh');
	}
	
	function pjob_completed($param1 = '',$param2 = '',$param3 = '')
	{
		if ($this->session->userdata('user_login') != 1)
        redirect(base_url() . 'home/login', 'refresh');
		if($param1 == 'update')
		{
			        $data1['jcomplete_date']       = date('Y-m-d');
			 		$data1['jcomplete_amt']       = $this->input->post('amt');
					$data1['jfeedback']       = $this->input->post('jfeedback');
					$data1['jwork_status']       = $this->input->post('jwork_status');
					$data1['jposter_fav']       = $this->input->post('jposter_fav');
					$data1['jstar_rate']       = $this->input->post('jstar_rate');
					$this->db->where('job_id',  $this->input->post('job_id'));
					$this->db->update('jobs', $data1);
					$data['job_id'] =$this->input->post('job_id');
					$data['jobname'] =$this->db->query("SELECT * FROM jobs WHERE job_id=".$data['job_id'])->row()->jname;
					$data['workid'] =$this->db->query("SELECT * FROM jobs WHERE job_id=".$data['job_id'])->row()->jaccept_workid;
					$data['emailid'] =$this->db->query("SELECT * FROM users WHERE user_id=".$data['workid'])->row()->emailid;
					//$data['email'] =$this->db->query("SELECT * FROM jobs WHERE job_id=".$data['job_id'])->row()->jname;						
					$this->email_model->job_complete($data1,$data);
					 $this->session->set_flashdata('flash_message','Job Completed Successfully');
			redirect(base_url() . 'home/ppast_jobworkers', 'refresh');
		}

		$page_data['job_completed'] = $this->db->get_where('jobs', array('job_id' => $param1))->result_array();		
		$page_data['head']='dash_header.php';
        $page_data['foot']='dash_footer.php';
		$page_data['page_name']  = 'pjob_completed';
        $this->load->view('static/index',$page_data);
	}
	
	function ppast_jobworkers()
	{
		if ($this->session->userdata('user_login') != 1)
        redirect(base_url() . 'home/login', 'refresh');
		$user_id =  $this->session->userdata('user_id');
		//$this->db->where("jcomplete_date !='0000-00-00'");
		$page_data['recent_jobs'] = $this->db->get_where('jobs', array('jwork_status' => 6,'jposter_id' => $user_id))->result_array();		
		$page_data['head']='dash_header.php';
        $page_data['foot']='dash_footer.php';
		$page_data['page_name']  = 'ppast_jobworkers';
        $this->load->view('static/index',$page_data);
	}
	function pjobworkers($param1 = '')
	{
		if ($this->session->userdata('user_login') != 1)
        redirect(base_url() . 'home/login', 'refresh');
		
		$user_id =  $this->session->userdata('user_id');
		//$this->db->where("jcomplete_date !='0000-00-00'");
		$page_data['recent_jobs'] = $this->db->get_where('jobs', array('job_id' => $param1))->result_array();		
		$page_data['head']='dash_header.php';
        $page_data['foot']='dash_footer.php';
		$page_data['page_name']  = 'pjobworkers';
        $this->load->view('static/index',$page_data);
	}
	function pfavorite_jobworkers()
	{
		if ($this->session->userdata('user_login') != 1)
        redirect(base_url() . 'home/login', 'refresh');
		
		$user_id =  $this->session->userdata('user_id');
		$page_data['recent_jobs'] = $this->db->get_where('jobs', array('jposter_id' => $user_id,'jposter_fav'=>1,'jwork_status' => 6))->result_array();		
		$page_data['head']='dash_header.php';
        $page_data['foot']='dash_footer.php';
		$page_data['page_name']  = 'pfavorite_jobworkers';
        $this->load->view('static/index',$page_data);
	}
	
	function pview_jobworkers()
	{
		if ($this->session->userdata('user_login') != 1)
        redirect(base_url() . 'home/login', 'refresh');
		$page_data['users'] = $this->db->get_where('users', array('user_type' => 1))->result_array();
		$page_date['jobs'] = $this->db->get_where('jobs',array('jposter_fav' => 0))->result_array();		
		$page_data['head']='dash_header.php';
        $page_data['foot']='dash_footer.php';
		$page_data['page_name']  = 'pview_jobworkers';
        $this->load->view('static/index',$page_data);
	}

	function directassign()
    {
  //   	if ($this->session->userdata('user_login') != 1)
  //       redirect(base_url() . 'home/login', 'refresh');
		
		// $user_id =  $this->session->userdata('user_id');
		// $this->db->order_by("job_id", "desc");
		// $this->db->where('jwork_status !=', '5');
		// $this->db->where('jwork_status !=', '6'); 	
		// $page_data['recent_jobs']   = $this->db->get_where('jobs', array('jbidding_type' => 2,'jposter_id' => $user_id))->result_array();
		// $user_id =  $this->session->userdata('user_id');
		// $page_data['users']   = $this->db->get_where('jobs', array('jposter_fav' => 1,'jposter_id' => $user_id))->result_array();
		// $page_data['head']='dash_header.php';
  //       $page_data['foot']='dash_footer.php';
		// $page_data['page_name']  = 'pdirectassign';
  //       $this->load->view('static/index',$page_data);
    	if ($this->session->userdata('user_login') != 1)
        redirect(base_url() . 'home/login', 'refresh');
		
		$user_id =  $this->session->userdata('user_id');
		$this->db->order_by("job_id", "desc");
		$this->db->where('jwork_status !=', '5');
		$this->db->where('jwork_status !=', '6');
		$page_data['recent_jobs']   = $this->db->get_where('jobs', array('jbidding_type' => 2,'jposter_id' => $user_id))->result_array();
		$page_data['head']='dash_header.php';
        $page_data['foot']='dash_footer.php';
		$page_data['page_name']  = 'pdirectassign';
        $this->load->view('static/index',$page_data);
    }
	
	function whofirst()
    {
    	if ($this->session->userdata('user_login') != 1)
        redirect(base_url() . 'home/login', 'refresh');
		
		$user_id =  $this->session->userdata('user_id');
		$this->db->order_by("job_id", "desc");
		$this->db->where('jwork_status !=', '5');
		$this->db->where('jwork_status !=', '6');
		$page_data['recent_jobs']   = $this->db->get_where('jobs', array('jbidding_type' => 3,'jposter_id' => $user_id))->result_array();
		$page_data['head']='dash_header.php';
        $page_data['foot']='dash_footer.php';
		$page_data['page_name']  = 'pwhofirst';
        $this->load->view('static/index',$page_data);
    }
	
	function pjob_cancel($param1 = '')
	{
		if ($this->session->userdata('user_login') != 1)
        redirect(base_url() . 'home/login', 'refresh');
		if(!empty($param1)){
		$data1['jcancel_date']       = date('Y-m-d');
		$data1['jwork_status']       = '5';
		$this->db->where('job_id', $param1);
		$this->db->update('jobs', $data1); 
		 $this->session->set_flashdata('flash_message','Job Canceled');
		redirect(base_url() . 'home/dashboard', 'refresh');

		}
		redirect(base_url() . 'home/dashboard', 'refresh');
	}
	
	
	function wrecent_jobs()
	{
		if ($this->session->userdata('user_login') != 1)
        redirect(base_url() . 'home/login', 'refresh');
		
		$this->db->order_by("job_id", "desc");
		$page_data['recent_jobs']   = $this->db->get_where('jobs', array('jwork_status' => 1,'jbidding_type !=' => 2),10)->result_array();
		$page_data['head']='dash_header.php';
        $page_data['foot']='dash_footer.php';
		$page_data['page_name']  = 'wrecent_jobs';
        $this->load->view('static/index',$page_data);
	}
	
	function wold_jobs()
	{
		if ($this->session->userdata('user_login') != 1)
        redirect(base_url() . 'home/login', 'refresh');
		
		$this->db->order_by("job_id", "desc");
		$this->db->where('jwork_status', '1'); 
		$page_data['recent_jobs'] = $this->db->get('jobs')->result_array();			
		$page_data['head']='dash_header.php';
        $page_data['foot']='dash_footer.php';
		$page_data['page_name']  = 'wold_jobs';
        $this->load->view('static/index',$page_data);
	}
	
	function wjob_view($param1 = '')
	{
		if ($this->session->userdata('user_login') != 1)
        redirect(base_url() . 'home/login', 'refresh');
		
		$page_data['job_view'] = $this->db->get_where('jobs', array('job_id' => $param1))->result_array();		
		$page_data['head']='dash_header.php';
        $page_data['foot']='dash_footer.php';
		$page_data['page_name']  = 'wjob_view';
        $this->load->view('static/index',$page_data);
	}
	
	function wjob_bid($param1 = '')
	{
		if ($this->session->userdata('user_login') != 1)
        redirect(base_url() . 'home/login', 'refresh');
		
		
		$page_data['job_bid'] = $this->db->get_where('jobs', array('job_id' => $param1))->result_array();		
		$page_data['head']='dash_header.php';
        $page_data['foot']='dash_footer.php';
		$page_data['page_name']  = 'wjob_bid';
        $this->load->view('static/index',$page_data);
	}
	
	function wbid($param1 = '')
	{
		if ($this->session->userdata('user_login') != 1)
        redirect(base_url() . 'home/login', 'refresh');
		$this->db->trans_start();
    		$job=$this->input->post('job_id');
        		if(!empty($job)){
				$data['job_id']       =$this->input->post('job_id');
				$data['userid']       = $this->session->userdata('user_id');
				$data['bid_amt']       = $this->input->post('bid_price');
				$data['biding_dt']       = date('Y-m-d');
				$data['bid_commands']       = $this->input->post('commands');
				$this->db->insert('job_bids', $data);
				$first_bid = $this->db->query("SELECT * FROM jobs WHERE job_id=".$job)->row()->jbidding_type;
				if($first_bid=='3'){
					$data1['jassign_date']       = date('Y-m-d');
			 		$data1['jassign_amt']       = $this->input->post('bid_price');
			   		$data1['jwork_status']       = '2';	
					$data1['jassign_to_work_id']       = $this->session->userdata('user_id');
					$this->db->where('job_id', $job);
					$this->db->update('jobs', $data1); 
				}	
				$this->db->trans_complete();			
				redirect(base_url() . 'home/dashboard', 'refresh');
			}else{
				redirect(base_url() . 'home/dashboard', 'refresh');
			}
		
	}
	
	function wjob_assigned($param1 = '',$param2 = '')
	{
		if ($this->session->userdata('user_login') != 1)
        redirect(base_url() . 'home/login', 'refresh');
		$user_id =  $this->session->userdata('user_id');
		
		$page_data['recent_jobs'] = $this->db->get_where('jobs',array('jassign_to_work_id' => $user_id,'jwork_status' => '2'))->result_array();		
		$page_data['head']='dash_header.php';
        $page_data['foot']='dash_footer.php';
		$page_data['page_name']  = 'wjob_assigned';
        $this->load->view('static/index',$page_data);
	}
	
	function directassign_change(){
			if ($this->session->userdata('user_login') != 1)
        redirect(base_url() . 'home/login', 'refresh');
		
		$job_id      = $this->input->post('job_id');
		$data['jassign_to_work_id']       = $this->input->post('work_id');
		$data['jwork_status']       = '2';
		$this->db->where('job_id', $job_id);
		$this->db->update('jobs', $data);
		$this->session->set_flashdata('flash_message','Successfully Updated');
			redirect(base_url() . 'home/dashboard', 'refresh');
	}
	
	function job_accept($param1 = '',$param2 = '',$param3 = ''){
		if ($this->session->userdata('user_login') != 1)
        redirect(base_url() . 'home/login', 'refresh');
    	$user_id =  $this->session->userdata('user_id');
		if($param2=='1')
		{
		$data = array( 'jaccept_workid' => $user_id,'jaccept_date' => date('Y-m-d'),'jwork_status' => '3','jaccept_amt' => $param3 );
		$this->db->where('job_id', $param1);
		$this->db->update('jobs', $data);
		$data1['jname'] = $this->db->query("SELECT * FROM jobs WHERE job_id=".$param1)->row()->jname;
		$data1['jposter_id']= $this->db->query("SELECT * FROM jobs WHERE job_id=".$param1)->row()->jposter_id;
		$data1['tomail'] = $this->db->query("SELECT * FROM users WHERE user_id=".$data1['jposter_id'])->row()->emailid;
		$this->email_model->job_accept($data1);	
		}elseif($param2=='2')
		{
		$data = array( 'jaccept_workid' => $user_id,'jaccept_date' => date('Y-m-d'),'jwork_status' => '8' );
		$this->db->where('job_id', $param1);
		$this->db->update('jobs', $data);
		$data1['jname'] = $this->db->query("SELECT * FROM jobs WHERE job_id=".$param1)->row()->jname;
		$data1['jposter_id']= $this->db->query("SELECT * FROM jobs WHERE job_id=".$param1)->row()->jposter_id;
		$data1['tomail'] = $this->db->query("SELECT * FROM users WHERE user_id=".$data1['jposter_id'])->row()->emailid;
		$this->email_model->job_reject($data1);		
		}
		  $this->session->set_flashdata('flash_message','Updated Successfully');
		  redirect(base_url() . 'home/wjob_assigned', 'refresh');
	}
	
	function wconfirm_towork($param1 = '')
	{
		if ($this->session->userdata('user_login') != 1)
        redirect(base_url() . 'home/login', 'refresh');
		$user_id =  $this->session->userdata('user_id');		
		$page_data['recent_jobs'] = $this->db->get_where('jobs',array('jassign_to_work_id' => $user_id,'jwork_status' => '4'))->result_array();		
		$page_data['head']='dash_header.php';
        $page_data['foot']='dash_footer.php';
		$page_data['page_name']  = 'wconfirm_towork';
        $this->load->view('static/index',$page_data);
	}
	
	function wpast_jobs($param1 = '')
	{   if ($this->session->userdata('user_login') != 1)
        redirect(base_url() . 'home/login', 'refresh');
		
		$user_id =  $this->session->userdata('user_id');
		$page_data['pastjob'] = $this->db->get_where('jobs', array('jaccept_workid' => $user_id,'jcomplete_date !='=>'0000-00-00'))->result_array();				
		$page_data['head']='dash_header.php';
        $page_data['foot']='dash_footer.php';
		$page_data['page_name']  = 'wpast_jobs';
        $this->load->view('static/index',$page_data);
	}
	
	function wjobworkers($param1 = '')
	{
		if ($this->session->userdata('user_login') != 1)
        redirect(base_url() . 'home/login', 'refresh');
		
		$user_id =  $this->session->userdata('user_id');
		//$this->db->where("jcomplete_date !='0000-00-00'");
		$page_data['recent_jobs'] = $this->db->get_where('jobs', array('job_id' => $param1))->result_array();		
		$page_data['head']='dash_header.php';
        $page_data['foot']='dash_footer.php';
		$page_data['page_name']  = 'wjobworkers';
        $this->load->view('static/index',$page_data);
	}
	
		function wselect_categories($param1 = '')
	{		
			 if ($this->session->userdata('user_login') != 1)
       		 redirect(base_url() . 'home/login', 'refresh');
			 
			$this->db->where('category_job_type', $param1);
			$page_data['categories']   = $this->db->get('job_category')->result_array();
			$page_data['head']='dash_header.php';
			$page_data['foot']='dash_footer.php';
			$page_data['page_name']  = 'job_type_categories';
			$page_data['sel_category']  = $param1;
			$this->load->view('static/index',$page_data);
			
	}
	
	function wcategory_jobs($param1 = ''){
		if ($this->session->userdata('user_login') != 1)
        redirect(base_url() . 'home/login', 'refresh');
			//$page_data['recent_jobs']   = $this->db->get_where('jobs', array('category_id' => $param1,'jwork_status' => 1,'jwork_status !=' => 2,'jbidding_ed_date >' => date("Y-m-d")))->result_array();
			$page_data['recent_jobs']   = $this->db->get_where('jobs', array('category_id' => $param1,'jwork_status' => 1,'jwork_status !=' => 2))->result_array();
			$page_data['head']='dash_header.php';
			$page_data['foot']='dash_footer.php';
			$page_data['page_name']  = 'wcategory_jobs';
			$this->load->view('static/index',$page_data);
	
	}

	// function testEmail()
	// {
	// 	$zip = 560099;
	// 	$zipDB = $this->db->query("SELECT *FROM `users` WHERE `zipcode` =".$zip." AND `user_type` = 1")->result_array();
	//   foreach ($zipDB as $zips) 
	//   {
	//   	$this->email_model->notification($zips);
	//   }
	// }
		
	
	
}