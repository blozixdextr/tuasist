<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Modal extends CI_Controller {

	
	function __construct()
    {
        parent::__construct();
		$this->load->database();
		/*cache control*/
	
    }
	
	/***default functin, redirects to login page if no admin logged in yet***/
	public function index()
	{
		
	}
	
	
	function popup($param1 = '' , $param2 = '' , $param3 = '')
	{
		if($param1	==	'adminusers_profile' )
		{
			$page_data['current_manage_id']	=	$param2;
		}
		else if($param1	==	'edit_adminusers')
		{
			$page_data['edit_data']	=	$this->db->get_where('site_management_users' , array('manage_id'=>$param2))->result_array();
		}
		else if($param1	==	'edit_categories')
		{
			$page_data['edit_data']	=	$this->db->get_where('job_category' , array('category_id'=>$param2))->result_array();
		}
		else if($param1	==	'locations_country_edit')
		{	
		$page_data['edit_data']	=	$this->db->get_where('countries' , array('country_id'=>$param2))->result_array();
		}
		else if($param1	==	'locations_state_edit')
		{	
		$page_data['edit_data']	=	$this->db->get_where('states' , array('state_id'=>$param2))->result_array();
		}
		else if($param1	==	'locations_city_edit')
		{	
		$page_data['edit_data']	=	$this->db->get_where('cities' , array('city_id'=>$param2))->result_array();
		}
		else if($param1	==	'jobs_edit')
		{	
		$page_data['edit_data']	=	$this->db->get_where('jobs' , array('job_id'=>$param2))->result_array();
		}
		else if($param1	==	'jobs_view')
		{	
		$page_data['edit_data']	=	$this->db->get_where('jobs' , array('job_id'=>$param2))->result_array();
		}
		else if($param1	==	'user_edit')
		{	
		$page_data['edit_data']	=	$this->db->get_where('users' , array('user_id'=>$param2))->result_array();
		}
		else if($param1	==	'pages_edit')
		{	
			$page_data['edit_data']	=	$this->db->get_where('staticpages' , array('stpage_id'=>$param2))->result_array();
		}
		else if($param1	==	'edit_email_newsletter')
		{	
			$page_data['edit_data']	=	$this->db->get_where('email_message' , array('email_message_id'=>$param2))->result_array();
		}
		
		
				
		$page_data['page_name']		=	$param1;
		$this->load->view('admin/modal' ,$page_data);
	}
}

