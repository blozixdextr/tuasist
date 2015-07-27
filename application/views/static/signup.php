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
						<div class="signupIntro">
							<p>Outsource household tasks to our trusted JobRabbits.</p>
						</div>
						<?php if($this->session->flashdata('flash_message')): ?>
						<p style="color: red;text-align: center;" class='flashMsg flashSuccess'> <b><?=$this->session->flashdata('flash_message')?></b> </p>
						<?php endif ?>
						<div class="login_controls">
							     <?php echo form_open(base_url().'home/signup/user_create' , array('class' => 'form-horizontal validatable','target'=>'_top', 'enctype' => 'multipart/form-data'));?>
								<div class="form_control_input">
									<i class="fa fa-user fa-fw"></i>
									<input type="text" class="form-control" name='full_name' placeholder="Full Name" required>
								</div>
								<div class="form_control_input">
									<i class="fa fa-envelope fa-fw"></i>
									<input type="email" class="form-control" name="email" placeholder="Email Address" required>
								</div>
								<div class="form_control_input">
									<i class="fa fa-key fa-fw"></i>
									<input type="password" class="form-control" placeholder="Password" name="password" required>
								</div>
								<div class="form_control_input">
									<i class="fa fa-map-marker fa-fw"></i>
									<input type="text" class="form-control" placeholder="Zip Code" name="zipcode" required>
								</div>
								<div class="form_control_input">
									<input name="submit" type="submit" value="Create your account" class="form-control input-md btn-orange">
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
							<p>Have an account? <a href="<?php echo base_url();?>home/login">Log in</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div><!-- /.container -->