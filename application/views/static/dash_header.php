<?php
if($this->session->userdata('checking')!=0){
 $use = $this->session->userdata('user_type');
}else{$use="";}
 ?>

<div id="header" class="navbar" role="navigation">
		<div class="container">
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-10">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					     <a class="navbar-brand" style="height:auto; text-align: center;" href="<?php echo base_url()."home/dashboard";?>">
                        <!-- Site Name or logo -->
						<?php 
                        if(!empty($site_logo)){ 
                            echo "<img src='".base_url()."uploads/".$site_logo."' style='max-height: 65px;'/>";
                        }else {
                            echo "<h1 style='color:#008b83;'>".$site_name."</h1>";;
                        }
                         ?>
                        <!--Slogan -->
						<small class="slogan" style="display: inline-block;"><?php if($site_slogan_Enable==1){ echo $site_slogan; }?></small>
                        <!--Slogan --> 
                        <!-- Site Name or logo -->
                        </a>
					</div>
					<div class="collapse navbar-collapse pull-right">
						<ul class="nav navbar-nav">
							<!--<li><a href="#">Help</a></li>
							<li><a href="#">Search</a></li>-->
                            <?php $us_id = $this->session->userdata('user_id');
					$us_img=$this->db->query("SELECT * FROM user_profiles WHERE user_id=".$us_id)->row()->user_image;
							?>
                          
							<li class="dropdown user_manage"><a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <img src="<?php echo base_url(); ?><?php if(!empty($us_img)){ echo "uploads/profiles/".$us_img;  }else{echo "template/image/user_icon.png";}?>" width="29px" height="29px" class="img-circle"> <span class="caret"></span></a>
								<ul class="dropdown-menu">
                                	<?php 
									$work = $this->session->userdata('user_type');
									if($work==1)
									{
										$work="Job Worker";	
									}elseif($work==2)
									{
										$work="Job Poster";	
									}elseif($work==0)
									{
										$work="";	
									}
									echo "<center>
										<b>Hi, ".$this->session->userdata('full_name')."</b><br/>".
										$work."									
									</center>";?>
                                	 <li class="seperator"></li>
									<li><a href="<?php echo base_url();?>home/dashboard">My Dashboard</a></li>
									<li><a href="<?php echo base_url();?>home/profile">My Profile</a></li>
									<li><a href="<?php echo base_url();?>home/account">My Account</a></li>
									<li><a href="<?php echo base_url();?>home/transaction">Transaction History</a></li>
									<!--<li><a href="<?php echo base_url();?>home/notifications">Notifications</a></li>-->
									<!--<li><a href="<?php echo base_url();?>home/credit">My Credit Card</a></li>-->
                                    <li class="seperator"></li>
                                    <?php if($use=='1'){?>
                                    <li><a href="<?php echo base_url();?>home/wrecent_jobs">New Jobs</a></li>
                                    <li><a href="<?php echo base_url();?>home/wold_jobs">Jobs</a></li>
                                    <li><a href="<?php echo base_url();?>home/wjob_assigned">Assigned jobs</a></li>
                                    <li><a href="<?php echo base_url();?>home/wconfirm_towork">Confirm jobs</a></li>
                                    <!--<li><a href="<?php echo base_url();?>home/wfavourite_jobs">Favourite Jobs</a></li>-->
                                    <li><a href="<?php echo base_url();?>home/wpast_jobs">Past Jobs</a></li>
                                    <?php }?> 
                                     <?php if($use=='2'){?>
                                    <li><a href="<?php echo base_url();?>home/post_a_job">Post a New Job</a></li>
                                    <li><a href="<?php echo base_url();?>home/openbids">Your open Bids</a></li>
                                    <li><a href="<?php echo base_url();?>home/directassign">Assign directly option</a></li>
                                    <li><a href="<?php echo base_url();?>home/whofirst">Who bids first option</a></li>
                                    <li class="seperator"></li>
                                     <li><a href="<?php echo base_url();?>home/pfavorite_jobworkers">Your favorite workers</a></li>
                                    <li><a href="<?php echo base_url();?>home/ppast_jobworkers">Past Jobworkers</a></li>
                                    <li><a href="<?php echo base_url();?>home/pview_jobworkers">View Jobworkers</a></li> 
                                    <?php }?>                                  
                                    <?php /* if($use=='1'){?><li><a href="<?php echo base_url();?>">Bidding status</a></li><?php }?>
                                    <?php if($use=='1'){?><li><a href="<?php echo base_url();?>home/recent_jobs">New Jobs</a></li><?php }?>
                                    
                                     <?php if($use=='2'){?><li><a href="<?php echo base_url();?>home/post_a_job">Post a Job</a></li><?php }?>
                                    <?php if($use=='2'){?><li><a href="<?php echo base_url();?>home/recent_job_post">Recent posted Job</a></li><?php }?>
                                    <?php if($use=='2'){?><li><a href="<?php echo base_url();?>home/job_no_bids">Bids</a></li><?php } */?>
									<li class="seperator"></li>
									<li><a href="<?php echo base_url();?>home/logout/">Logout</a></li>
								</ul>
							</li>
						</ul>
					</div><!--/.nav-collapse -->
                     <?php if($this->session->flashdata('flash_message') != ""):?>
                    <div id="messageDialogue">
						<p><?php echo $this->session->flashdata('flash_message');?></p>
					</div>
                    <?php endif;?>
				</div>
				<div class="col-md-1"></div>
			</div>
		</div>
	</div>
