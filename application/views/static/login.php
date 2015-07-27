<?php
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
 
if(isset($user)) {
	$loginUrl = $facebook->getLoginUrl(array(
		'scope'		=> 'user_about_me, user_hometown, email, user_birthday',
		'redirect_uri'	=> $facebook_profile,
	));
}
?>

<div class="container">
		<div class="row">
			<div class="col-xs-5 col-centered">
				<div class="row">
					<div class="col-xs-12">
						<div class="login_logo">
						<!--<img  src="<?php echo base_url();?>uploads/login_logo.png"  alt="Image" class="img-responsive"/>-->
                <a class="navbar-brand" style="height:auto; text-align: center; float: none;" href="<?php echo base_url();?>">
                        <!-- Site Name or logo -->
						<?php 
                        if(!empty($site_logo)){ 
                            echo "<img src='".base_url()."uploads/".$site_logo."' style='max-height: 65px;'/>";
                        }else {
                            echo "<h1>".$site_name."</h1>";;
                        }
                         ?>
                        <!--Slogan -->
						<small class="slogan" style="display: inline-block;"><?php if($site_slogan_Enable==1){ echo $site_slogan; }?></small>
                        <!--Slogan --> 
                        <!-- Site Name or logo -->
                        </a>
						</div>
                        <?php if($this->session->flashdata('flash_message')): ?>
						<?=$this->session->flashdata('flash_message')?>
						<?php endif ?>
						<div class="login_controls">
							 <?php echo form_open(base_url().'home/do_login' , array('class' => 'form-signin'));?>
								<div class="form_control_input">
									<i class="fa fa-envelope fa-fw"></i>
									<input type="email" name="email" class="form-control" placeholder="Email Address" required>
								</div>
								<div class="form_control_input">
									<i class="fa fa-key fa-fw"></i>
									<input type="password" name="password" class="form-control" placeholder="Password" required>
								</div>
								<div class="form_control_input">
									<input id="submit" name="submit" type="submit" value="Sign in" class="form-control input-md btn-orange">
								</div>
							</form>
                                <?php 
				$facebook_status	=	$this->db->get_where('sitesettings' , array('type'=>'facebook_status'))->row()->description;
				if($facebook_status !=2){ ?>
				 <center> <b style="line-height: 32px;">Or</b></center>
				 <a href="<?php echo $loginUrl; ?>"><button class="btn btn-lg btn-primary btn-block btn-facebook" type="submit">Log in with Facebook </button></a>
				<?php 
				}
				?>							
						</div>
						<div class="LoginLink">
							<p> Don't have an account? <a href="<?php echo base_url();?>home/signup">Sign up</a>
                <br/>
                <a id="loginbutton" href="#forgotdiv" title="">Forgot Password?</a></p>

       <div style="display: none;">
    <div id="forgotdiv" class="fancyboxContent">
    <br/>
         <h3>&nbsp;&nbsp;&nbsp;&nbsp;Forgot Password</h3>
           
                    
                    <div align="center" >
							 <?php echo form_open(base_url().'home/forgot_password');?>  
                             <br/>
                             <div align="center">
								<input type="email" name="email" style="padding: 5px 10px;" size="50" placeholder="Email Address" required>
							</div>
								
								<div align="right">
									<input style="padding: 5px 10px; border-radius: 0; margin-top:10px; background: #ff7b54; color: #FFF;" class="btn" type="submit" value="Send" />&nbsp;&nbsp;&nbsp;&nbsp;
								</div>
							</form>
                             		
						</div>
    </div>
</div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $("#loginbutton").fancybox({
            maxWidth    : 350,
            maxHeight   : 160,
            fitToView   : false,
            width       : '70%',
            height      : '70%',
            autoSize    : false,
            closeClick  : false,
            openEffect  : 'none',
            closeEffect : 'none',
        });
    });
</script>