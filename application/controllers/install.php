<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include('password_func.php');

class Install extends CI_Controller {

	function __construct()
    {
        parent::__construct();	
		$this->load->helper('url');
		$this->load->helper('file');
		// Cache control
		$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
	}
	
	function index()
	{
		$this->load->view('install/index');
	}
	
	// -----------------------------------------------------------------------------------
	
	/*
	 * Install the script here
	 */
	function do_install()
	{
		$db_verify				=	1;
		$purchase_verify		=	1;
		
		if($purchase_verify == true && $db_verify == true)
		{
			// Replace the database settings
			$data = read_file('./application/config/database.php');
			$data = str_replace('db_name',		$this->input->post('db_name'),		$data);
			$data = str_replace('db_uname',		$this->input->post('db_uname'),		$data);
			$data = str_replace('db_password',	$this->input->post('db_password'),	$data);						
			$data = str_replace('db_hname',		$this->input->post('db_hname'),		$data);
			write_file('./application/config/database.php', $data);
			
			// Replace new default routing controller
			$data2 = read_file('./application/config/routes.php');
			$data2 = str_replace('install','home',$data2);
			write_file('./application/config/routes.php', $data2);
			
			
			// Run the installer sql schema		
			$this->load->database();
			
			$schema = read_file('./uploads/database.sql');
  		
			$query = rtrim( trim($schema), "\n;");
			$query_list = explode(";", $query);
			
			foreach($query_list as $query)
				 $this->db->query($query);
				 
				 
			// Replace the admin login credentials
 			$pass  = _base64_encrypt($this->input->post('password'),'bytes789');
			$this->db->where('manage_id' , 1);
			$this->db->update('site_management_users' , array(
												'admintype' =>'1',
												'uname'	=>	$this->input->post('ad_name'),
												'emailid'	=>	$this->input->post('email'),
												'password'	=>	$pass,
												'status' =>'1'));	

			// Replace the system name						
			$this->db->where('type', 'site_name');
			$this->db->update('sitesettings', array(
				'description' => $this->input->post('system_name')
			));
			
			// Replace the system title
			$this->db->where('type', 'site_name');
			$this->db->update('sitesettings', array(
				'description' => $this->input->post('system_name')
			));
			
			// Replace the system keywords
			$this->db->where('type', 'site_keywords');
			$this->db->update('sitesettings', array(
				'description' => $this->input->post('system_keyword')
			));
			
			// Replace the system description
			$this->db->where('type', 'site_description');
			$this->db->update('sitesettings', array(
				'description' => $this->input->post('system_description')
			));
			
		/*	// Replace the system logo
			
						$path=@$_FILES['site_logo']['name'];
						if(!empty($path)){
						 $filename='logo.png';
						  $moved = move_uploaded_file($_FILES['site_logo']['tmp_name'], 'uploads/'.$filename );
							if( $moved ) {
								$this->db->where('type', 'site_logo');
								$this->db->update('sitesettings', array('description' => $filename  ));             
							} else {
								$this->session->set_flashdata('flash_message','upload Failed');
								redirect(base_url().'install' , 'refresh');
							}
						}
						
						*/
			// Redirect to dashboard page after completing installation
			$this->session->set_userdata('admin_login', '1');			
			$this->session->set_userdata('admintype', '1');
			$this->session->set_userdata('manage_id', '1');
			$this->session->set_userdata('uname', $this->input->post('ad_name'));
			$this->session->set_userdata('status', '1');
			$this->session->set_flashdata('installation_result' , 'Successfully Installed');
			redirect(base_url().'admin/dashboard' , 'refresh');
		}
		else 
		{
			$this->session->set_flashdata('installation_result' , 'failed');
			redirect(base_url().'install' , 'refresh');
		}
	}
	
	// -------------------------------------------------------------------------------------------------
	
	/* 
	 * Database validation check from user input settings
	 */
	function check_db_connection()
	{
		$link	=	@mysql_connect($this->input->post('db_hname'),
						$this->input->post('db_uname'),
							$this->input->post('db_password'));
		if(!$link)
		{
			@mysql_close($link);
		 	return false;
		}
		
		$db_selected	=	mysql_select_db($this->input->post('db_name'), $link);
		if (!$db_selected)
		{
			@mysql_close($link);
		 	return false;
		}
		
		@mysql_close($link);
		return true;
	}
	

	
}
