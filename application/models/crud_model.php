<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Crud_model extends CI_Model {
	
	function __construct()
    {
        parent::__construct();
    }
	
	function clear_cache()
	{
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
	}
function get_country()
{
$query	=	$this->db->get('countries');
return $query->result_array();
}
function get_state()
{
$query	=	$this->db->get('states');
return $query->result_array();
}




 function get_category($jobtype = null)
    {
        $this->db->select('category_id,category_name,category_parent_id');
        if($jobtype != NULL)
        {
			$array = array('category_job_type' => $jobtype, 'category_parent_id' => '0');
            $this->db->where($array);
        }
        $query = $this->db->get('job_category');
        if($query->num_rows() >0)
        {
            $states = array();   
            if($query->result())
            {
                foreach($query->result() as $category)
                {
                    $categories[$category->category_id] = $category->category_name;
                }
                return $categories;
            }
            else
            {
                return FALSE;
            }
        }
    }
   
    function get_subcategory($category_parent_id = null)
    {
        $this->db->select('category_id,category_name');
        if($category_parent_id != NULL)
        {
            $this->db->where('category_parent_id',$category_parent_id);
        }
        $query = $this->db->get('job_category');
        $sub_categories = array();
        if($query->num_rows() > 0)
        {
            foreach($query->result() as $category)
                {
                     $sub_categories[$category->category_id] = $category->category_name;
                }
                return $sub_categories;
        }
        else
        {
            return FALSE;
        }
    }
		
	
	////////BACKUP RESTORE/////////
	function create_backup($type)
	{
		$this->load->dbutil();
		
		
		$options = array(
                'format'      => 'txt',             // gzip, zip, txt
                'add_drop'    => TRUE,              // Whether to add DROP TABLE statements to backup file
                'add_insert'  => TRUE,              // Whether to add INSERT data to backup file
                'newline'     => "\n"               // Newline character used in backup file
              );
		
		 
		if($type == 'all')
		{
			$tables = array('');
			$file_name	=	'system_backup';
		}
		else 
		{
			$tables = array('tables'	=>	array($type));
			$file_name	=	'backup_'.$type;
		}

		$backup =& $this->dbutil->backup(array_merge($options , $tables)); 


		$this->load->helper('download');
		force_download($file_name.'.sql', $backup);
	}
	
	
	/////////RESTORE TOTAL DB/ DB TABLE FROM UPLOADED BACKUP SQL FILE//////////
	function restore_backup()
	{
		move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/backup.sql');
		$this->load->dbutil();
		
		$prefs = array(
            'filepath'						=> 'uploads/backup.sql',
			'delete_after_upload'			=> TRUE,
			'delimiter'						=> ';'
        );
		$restore =& $this->dbutil->restore($prefs); 
		unlink($prefs['filepath']);
	}
	
	/////////DELETE DATA FROM TABLES///////////////
	function truncate($type)
	{
		if($type == 'all')
		{
		/*
			$this->db->truncate('student');
			$this->db->truncate('mark');
			$this->db->truncate('teacher');
			$this->db->truncate('subject');
			$this->db->truncate('class');
			$this->db->truncate('exam');
			$this->db->truncate('grade');
		*/
		}
		else
		{	
			$this->db->truncate($type);
		}
	}
	
	
	////////IMAGE URL//////////
	function get_image_url($type = '' , $id = '')
	{
		if(file_exists('uploads/'.$type.'_image/'.$id.'.jpg'))
			$image_url	=	base_url().'uploads/'.$type.'_image/'.$id.'.jpg';
		else
			$image_url	=	base_url().'uploads/user.jpg';
			
		return $image_url;
	}
}

