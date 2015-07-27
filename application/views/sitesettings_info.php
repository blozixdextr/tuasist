<!--Site Settings -->
<?php		
		 $site_name	=	$this->db->get_where('sitesettings' , array('type'=>'site_name'))->row()->description;
		 $site_slogan	=	$this->db->get_where('sitesettings' , array('type'=>'site_slogan'))->row()->description;
		 $site_slogan_Enable	=	$this->db->get_where('sitesettings' , array('type'=>'site_slogan_Enable'))->row()->description;
		 $site_logo	=	$this->db->get_where('sitesettings' , array('type'=>'site_logo'))->row()->description;
		 $site_favicon	=	$this->db->get_where('sitesettings' , array('type'=>'site_favicon'))->row()->description;
		 $site_title	=	$this->db->get_where('sitesettings' , array('type'=>'site_title'))->row()->description;
		 $site_keywords	=	$this->db->get_where('sitesettings' , array('type'=>'site_keywords'))->row()->description;
		 $site_description	=	$this->db->get_where('sitesettings' , array('type'=>'site_description'))->row()->description;
		 $site_offline_mess	=	$this->db->get_where('sitesettings' , array('type'=>'site_offline_mess'))->row()->description;
		 $site_slideshow_Enable	=	$this->db->get_where('sitesettings' , array('type'=>'site_slideshow_Enable'))->row()->description;
		 $facebook_link	=	$this->db->get_where('sitesettings' , array('type'=>'facebook_link'))->row()->description;
		 $twitter_link	=	$this->db->get_where('sitesettings' , array('type'=>'twitter_link'))->row()->description;
		 $other_link	=	$this->db->get_where('sitesettings' , array('type'=>'other_link'))->row()->description;
?>
<!--Site Settings -->