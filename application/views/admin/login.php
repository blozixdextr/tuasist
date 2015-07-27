<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
<head>
	    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
        <?php include(__DIR__."/../sitesettings_info.php"); ?>
		<?php include 'includefiles.php';?>
        <title><?php echo $page_title;?> | <?php echo $site_name;?></title>
</head>
<!--<body>-->
<?php include(__DIR__."/../controlsave_javascript.php"); ?>
	<div id="main_body">
                <div class="navbar navbar-top navbar-inverse">
                <div class="navbar-inner">
                    <div class="container-fluid">
                        
                        <a class="brand" href="<?php echo base_url();?>">
                            <?php echo $site_name;?>
                        </a>
                        
                        
                        
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="span4 offset4">
                    <div class="padded">
                     <!--------FLASH MESSAGES--->
        
		<!--<?php if($this->session->flashdata('flash_message') != ""):?>
        <div class="container-fluid padded">
        	<div class="alert alert-info">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <?php echo $this->session->flashdata('flash_message');?>
            </div>
        </div>
        <?php endif;?>-->
        
        
        <?php if($this->session->flashdata('flash_message') != ""):?>
 		<script>
			$(document).ready(function() {
				Growl.info({title:"<?php echo $this->session->flashdata('flash_message');?>",text:" "})
			});
		</script>
        <?php endif;?>
                        <center>
                             <?php
			if(!empty($site_logo)){
				echo "<img src='".base_url()."uploads/{$site_logo}' style='max-height:100px; margin:20px 0px;'/>";
			}
		?>
                        </center>
                        <div class="login box" style="margin-top: 10px;">
                            <div class="box-header">
                                <span class="title">Administrator Login</span>
                            </div>
                            <div class="box-content padded">
                        
                                <?php echo form_open(base_url().'admin/do_login' , array('class' => 'separate-sections'));?>
                                    <center>
                                        <div style="height:100px;">
                                            <div id="avatar" class="avatar">
                                                <img src="<?php echo base_url();?>template/images/icons_big/account.png" class="avatar-big"  id="account_img" style=""/>
                                            </div>
                                        </div>
                                    </center>
                               			<?php if(!empty($error)){											
											echo '<font color="#FF0000"><center><b>'.$error.'</b></center></font><br/>'; 											
											}?>
                                        <div class="input-prepend">
                                        <span class="add-on" href="#">
                                        <i class="icon-envelope"></i>
                                        </span>
                                        <input name="email" type="text" placeholder="Email Address" autocomplete="off">
                                    </div>
                                    <div class="input-prepend">
                                        <span class="add-on" href="#">
                                        <i class="icon-key"></i>
                                        </span>
                                        <input name="password" type="password" placeholder="Password" autocomplete="off">
                                    </div>
                                    
                                    <div class="row-fluid">
                                        <div class="span6">
                                            <a  data-toggle="modal" href="#modal-simple"  class="btn btn-blue btn-block" >
                                                Forgot Password
                                            </a>
                                        </div>
                                        <div class="span6">
                                            <input type="submit" class="btn btn-gray btn-block " style="height: 30px;"   value="Login"/>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                       
                        <div style="color:#a5a5a5;">
                        	<a href="" target="">
                        		<center>&copy; <?php echo date('Y').' , '.$site_name;?></center>
                            </a>
                        </div>
                            
                    </div>
                </div>
            </div>
        </div>
        <!-----------password reset form ------>
        <div id="modal-simple" class="modal hide fade" style="top:30%;">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h6 id="modal-tablesLabel">Reset Password</h6>
          </div>
          <div class="modal-body" style="padding:20px;">
            	 <?php echo form_open(base_url().'admin/forgot_password');?>
                <input type="email" name="email"  placeholder="Email Address"  style="margin-bottom: 0px !important;"/>
 		   </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
      </form>
        </div>
        
        <!-----------password reset form ------>
        <?php include(__DIR__."/../rightclick_javascript.php"); ?>
</body>
</html>