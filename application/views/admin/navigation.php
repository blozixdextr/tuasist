<div class="sidebar-background">
	<div class="primary-sidebar-background">
	</div>
</div>
<div class="primary-sidebar">
	<!-- Main nav -->
    <br />
    <div style="text-align:center;">
    	 
       <!--  <a class="navbar-brand" href="<?php echo base_url();?>">  -->
          <a class="navbar-brand" href="#">
                        <!-- Site Name or logo -->
						<?php 
                        if(!empty($site_logo)){ 
                            echo "<img src='".base_url()."uploads/".$site_logo."' style='max-height:100px; max-width:100px;'/>";
                        }else {
                            echo "<h1 style='display: block; margin-bottom: 0;'>".$site_name."</h1>";;
                        }
                         ?>
                        <!--Slogan -->
						<small class="slogan" style="display: inline-block; margin-left: 75px;"><?php if($site_slogan_Enable==1){ echo $site_slogan; }?></small>
                        <!--Slogan --> 
                        <!-- Site Name or logo -->
                        </a>
    </div>
   	<br />
	<ul class="nav nav-collapse collapse nav-collapse-primary">
    
        
        <!------dashboard----->
		<li class="<?php if($page_name == 'dashboard')echo 'dark-nav active';?>">
			<span class="glow"></span>
				<a href="<?php echo base_url();?>admin/dashboard" >
					<!--<i class="icon-desktop icon-1x"></i>-->
                    <img src="<?php echo base_url();?>template/images/icons/home.png" />
					<span>Dashboard</span>
				</a>
		</li>
        
          <!------Users settings------>
		<li class="dark-nav <?php if(	$page_name == 'admin_users' 		||
										 $page_name == 'users' ) echo 'active';?>">
			<span class="glow"></span>
            <a class="accordion-toggle  " data-toggle="collapse" href="#users_submenu" rel="tooltip" data-placement="right" 
                >
                <!--<i class="icon-wrench icon-1x"></i>-->
                <img src="<?php echo base_url();?>template/images/icons/settings.png" />
                <span>User Management<i class="icon-caret-down"></i></span>
            </a>
            
            <ul id="users_submenu" class="collapse <?php if(	$page_name == 'admin_users' 		||
																$page_name == 'users' )echo 'in';?>">
             <?php if($admin_prem ==1){?>
                <li class="<?php if($page_name == 'admin_users')echo 'active';?>">
                  <a href="<?php echo base_url();?>admin/admin_users">
                  		<!--<i class="icon-h-sign"></i>-->
                  		<img src="<?php echo base_url();?>template/images/icons/system_settings.png" />&nbsp; Administrator
                  </a>
                </li>
                <?php }?>
               
                <li class="<?php if($page_name == 'users')echo 'active';?>">
                  <a href="<?php echo base_url();?>admin/users">
                      	<!--<i class="icon-download-alt"></i>-->
                    	<img src="<?php echo base_url();?>template/images/icons/backup.png" />&nbsp; Users
                  </a>
                </li>
            </ul>
		</li>
        	<!------Category Management----->
		<li class="<?php  if($page_name == 'categories')echo 'dark-nav active';?>">
			<span class="glow"></span>
				<a href="<?php echo base_url();?>admin/categories">
					<!--<i class="icon-desktop icon-1x"></i>-->
                    <img src="<?php echo base_url();?>template/images/icons/category.png" />
					<span>Categories</span>
				</a>
		</li>
          <!------Location Management----->
		<li class="<?php  if($page_name == 'locations')echo 'dark-nav active';?>">
			<span class="glow"></span>
				<a href="<?php echo base_url();?>admin/locations">
					<!--<i class="icon-desktop icon-1x"></i>-->
                    <img src="<?php echo base_url();?>template/images/icons/location.png" />
					<span>Locations</span>
				</a>
		</li>
           <!------Job Management----->
		<li class="<?php  if($page_name == 'jobs')echo 'dark-nav active';?>">
			<span class="glow"></span>
				<a href="<?php echo base_url();?>admin/jobs">
					<!--<i class="icon-desktop icon-1x"></i>-->
                    <img src="<?php echo base_url();?>template/images/icons/home.png" />
					<span>Jobs</span>
				</a>
		</li>
           <!-- ----Commission Tracking--- 
		<li class="<?php  if($page_name == 'commission_tracking')echo 'dark-nav active';?>">
			<span class="glow"></span>
				<a href="<?php echo base_url();?>admin/commission_tracking">
					<!--<i class="icon-desktop icon-1x"></i>
                    <img src="<?php echo base_url();?>template/images/icons/home.png" />
					<span>Commission Tracking</span>
				</a>
		</li>-->
         
         <!------Payment ----->
		<li class="<?php  if($page_name == 'payment')echo 'dark-nav active';?>">
			<span class="glow"></span>
				<a href="<?php echo base_url();?>admin/payment">
					<!--<i class="icon-desktop icon-1x"></i>-->
                    <img src="<?php echo base_url();?>template/images/icons/payment.png" />
					<span>Payment</span>
				</a>
		</li>
             
     
          
          <!------system settings------>
		<li class="dark-nav <?php if(	$page_name == 'system_settings' 		|| 
									     $page_name == 'email_settings' 		||
									     $page_name == 'pages' 		||
										
										$page_name == 'backup_restore' )echo 'active';?>">
			<span class="glow"></span>
            <a class="accordion-toggle  " data-toggle="collapse" href="#settings_submenu" rel="tooltip" data-placement="right" 
                >
                <!--<i class="icon-wrench icon-1x"></i>-->
                <img src="<?php echo base_url();?>template/images/icons/settings.png" />
                <span>Settings<i class="icon-caret-down"></i></span>
            </a>
            
            <ul id="settings_submenu" class="collapse <?php if(	$page_name == 'system_settings' 		|| 
																   $page_name == 'email_settings' 		||
																   $page_name == 'pages' 		||
																$page_name == 'backup_restore' )echo 'in';?>">
                <?php if($admin_prem ==1){?>
                <li class="<?php if($page_name == 'system_settings')echo 'active';?>">
                  <a href="<?php echo base_url();?>admin/system_settings">
                  		<!--<i class="icon-h-sign"></i>-->
                  		<img src="<?php echo base_url();?>template/images/icons/system_settings.png" />&nbsp; Site Settings
                  </a>
                </li>
               <?php }?>
               <!-- <li class="<?php if($page_name == 'email_settings')echo 'active';?>">
                  <a href="<?php echo base_url();?>admin/email_newsletter">
                      	<!--<i class="icon-download-alt"></i>
                    	<img src="<?php echo base_url();?>template/images/icons/payment.png" />&nbsp; Email & New Letter
                  </a>
                </li>-->
                
                 <li class="<?php if($page_name == 'pages')echo 'active';?>">
                  <a href="<?php echo base_url();?>admin/pages">
                      	<!--<i class="icon-download-alt"></i>-->
                    	<img src="<?php echo base_url();?>template/images/icons/home.png" />&nbsp; Pages
                  </a>
                </li>
               <?php if($admin_prem ==1){?>
                <li class="<?php if($page_name == 'backup_restore')echo 'active';?>">
                  <a href="<?php echo base_url();?>admin/backup_restore">
                      	<!--<i class="icon-download-alt"></i>-->
                    	<img src="<?php echo base_url();?>template/images/icons/backup.png" />&nbsp; Backup & Restore
                  </a>
                </li>
                <?php }?>
            
            </ul>
		</li>
		
	</ul>
	
</div>