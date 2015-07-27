<div class="navbar navbar-top navbar-inverse">
	<div class="navbar-inner">
		<div class="container-fluid">
			<!--<a class="brand" href="<?php echo base_url();?>"><?php echo $site_name;?>
			</a>-->
			<!-- the new toggle buttons -->
			<ul class="nav pull-right">
				<li class="toggle-primary-sidebar hidden-desktop" data-toggle="collapse" data-target=".nav-collapse-primary"><button type="button" class="btn btn-navbar"><i class="icon-th-list"></i></button></li>
				<li class="hidden-desktop" data-toggle="collapse" data-target=".nav-collapse-top"><button type="button" class="btn btn-navbar"><i class="icon-align-justify"></i></button></li>
			</ul>
			<div class="nav-collapse nav-collapse-top collapse">
            		
            	<ul class="nav pull-right">
					<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Account <b class="caret"></b></a>
					<!-- Account Selector -->
                    <ul class="dropdown-menu">
                    	<li class="with-image">
                            <div class="avatar">
                                <img src="<?php echo base_url();?>template/images/icons_big/admin.png" class="avatar-medium"/>
                            </div>
                            <span><?php echo $this->session->userdata('uname');?></span>
                        </li>
                    	<li class="divider"></li>
                        
                      
						<li><a href="<?php echo base_url();?>admin/manage_profile">
                        		<i class="icon-user"></i><span>Manage Profile</span></a></li>
                        <li><a href="<?php echo base_url();?>admin/manage_profile">
                        		<i class="icon-lock"></i><span>Change Password</span></a></li>
						<li><a href="<?php echo base_url();?>admin/logout">
                        		<i class="icon-off"></i><span>Logout</span></a></li>
					</ul>
                	<!-- Account Selector -->
                   
                  
				</ul>
                
                 <ul class="nav pull-right">
					<li >
				
					<a href="<?php echo base_url();?>" target="_blank">Front Site</a>
                  
					</li>
				</ul>
					<p class="pull-right" style="font-size: 13px; margin-right: 15px; margin-top: 14px; color: #FFF;">
                    <span style="margin-right:10px;"><?php echo $_SERVER['REMOTE_ADDR']; ?></span>
                    <span ><?php
					date_default_timezone_set("Asia/Kolkata"); 
					 echo date('Y/m/d H:i:s');
					 ?></span>
                    </p>
			</div>
		</div>
	</div>
</div>