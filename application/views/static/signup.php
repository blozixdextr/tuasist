<div class="container">

	<div class="row">
		<div class="col-xs-12 col-centered">
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
					<h2><?php echo lang('signup_page_title'); ?></h2>
					<div class="signupIntro">
						<p><?php echo lang('signup_title'); ?></p>
					</div>
					<?php if($this->session->flashdata('flash_message')): ?>
						<p style="color: red;text-align: center;" class='flashMsg flashSuccess'> <b><?=$this->session->flashdata('flash_message')?></b> </p>
					<?php endif ?>
					<div class="signUpTypes">
						<div class="col-xs-5">
							<h3>Become a Tasker</h3>
							<p>Respond to customer requests and get hired</p>
							<a href="<?php echo base_url();?>home/signup_tasker" class="btn btn-orange">Sign Up</a>
						</div>
						<div class="col-xs-2" style="text-align: center; padding: 50px 0 0 0">
							or
						</div>
						<div class="col-xs-5">
							<h3>I want to hire professionals</h3>
							<p>Get introduced to the right pros for your projects</p>
							<a href="<?php echo base_url();?>home/signup_client" class="btn btn-orange">Sign Up</a>
						</div>
					</div>
					<div class="LoginLink">
						<p><?php echo lang('signup_create_have_account'); ?> <a href="<?php echo base_url();?>home/login"><?php echo lang('signup_create_login'); ?></a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div><!-- /.container -->