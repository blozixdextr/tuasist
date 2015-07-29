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
						<h2><?php echo lang('signup_tasker_page_title'); ?></h2>
						<div class="signupIntro">
							<p><?php echo lang('signup_tasker_title'); ?></p>
						</div>
						<?php if($this->session->flashdata('flash_message')): ?>
						<p style="color: red;text-align: center;" class='flashMsg flashSuccess'> <b><?=$this->session->flashdata('flash_message')?></b> </p>
						<?php endif ?>
						<div class="login_controls">
							     <?php echo form_open(base_url().'home/tasker_profile_first/create' , array('class' => 'form-horizontal validatable','target'=>'_top', 'enctype' => 'multipart/form-data'));?>
								<div class="form_control_input" style="text-align: center;">
									<input type="radio" name='user_type' value="0" checked="checked" id="userTypePersonal"> <label for="userTypePersonal"><?php echo lang('signup_user_type_personal'); ?></label>
									<span style="padding: 0 10px;">&nbsp;</span>
									<input type="radio" name='user_type' value="1" id="userTypeCompany"> <label for="userTypeCompany"><?php echo lang('signup_user_type_company'); ?></label>
								</div>
								<?php echo form_error('user_type'); ?>
								<div id="signUpPersonal">
									<div class="form_control_input">
										<i class="fa fa-user fa-fw"></i>
										<input value="<?php echo set_value('first_name'); ?>" type="text" class="form-control" id="userFirstName" name='first_name' placeholder="<?php echo lang('signup_first_name_placeholder'); ?>" required="required">
									</div>
									<?php echo form_error('first_name'); ?>
									<div class="form_control_input">
										<i class="fa fa-user fa-fw"></i>
										<input value="<?php echo set_value('last_name'); ?>" type="text" class="form-control" id="userLastName" name='last_name' placeholder="<?php echo lang('signup_last_name_placeholder'); ?>" required="required">
									</div>
									<?php echo form_error('last_name'); ?>
								</div>
								<div id="signUpCompany" style="display: none;">
									<div class="form_control_input">
										<i class="fa fa-user fa-fw"></i>
										<input value="<?php echo set_value('company_name'); ?>" type="text" class="form-control" id="companyName" name='company_name' placeholder="<?php echo lang('signup_company_name_placeholder'); ?>" >
										<?php echo form_error('company_name'); ?>
									</div>
								</div>
								<div class="form_control_input">
									<i class="fa fa-envelope fa-fw"></i>
									<input value="<?php echo set_value('email'); ?>" type="email" class="form-control" name="email" placeholder="<?php echo lang('signup_email_placeholder'); ?>" required>
									<?php echo form_error('email'); ?>
								</div>
								<div class="form_control_input">
									<i class="fa fa-key fa-fw"></i>
									<input value="<?php echo set_value('password'); ?>" type="password" class="form-control" placeholder="<?php echo lang('signup_password_placeholder'); ?>" name="password" required>
									<?php echo form_error('password'); ?>
								</div>
								<div class="form_control_input">
									<i class="fa fa-map-marker fa-fw"></i>
									<select name="country" class="form-control" required>
										<option value=""><?php echo lang('signup_select_country'); ?></option>
										<?php
											if (count($countries) == 1) {
												$selectedCountry = $countries[0]['country_id'];
											} else {
												$selectedCountry = set_value('country');
											}
											foreach ($countries as $c) {
												if ($selectedCountry == $c['country_id']) {
													$checked = ' selected';
												} else {
													$checked = '';
												}
												echo '<option value="'.$c['country_id'].'"'.$checked.'>'.$c['country_name'].'</option>';
											}
										?>
									</select>
									<?php echo form_error('country'); ?>
								</div>
								<div class="form_control_input">
									<i class="fa fa-map-marker fa-fw"></i>
									<select name="state" class="form-control" required>
										<option value=""><?php echo lang('signup_select_state'); ?></option>
										<?php
										if (count($states) == 1) {
											$selectedState = $cities[0]['state_id'];
										} else {
											$selectedState = set_value('state');
										}
										foreach ($states as $s) {
											if ($selectedState == $s['state_id']) {
												$checked = ' selected';
											} else {
												$checked = '';
											}
											echo '<option value="'.$s['state_id'].'"'.$checked.'>'.$s['state_name'].'</option>';
										}
										?>
									</select>
									<?php echo form_error('state'); ?>
								</div>
								<div class="form_control_input">
									<i class="fa fa-map-marker fa-fw"></i>
									<select name="city" class="form-control" required>
										<option value=""><?php echo lang('signup_select_city'); ?></option>
										<?php
										if (count($cities) == 1) {
											$selectedCity = $cities[0]['city_id'];
										} else {
											$selectedCity = set_value('city');
										}
										foreach ($cities as $c) {
											if ($selectedCity == $c['city_id']) {
												$checked = ' selected';
											} else {
												$checked = '';
											}
											echo '<option value="'.$c['city_id'].'"'.$checked.'>'.$c['city_name'].'</option>';
										}
										?>
									</select>
									<?php echo form_error('city'); ?>
								</div>
								<div class="form_control_input">
									<i class="fa fa-legal"></i>
									<input value="<?php echo set_value('mobile'); ?>" type="text" class="form-control" placeholder="<?php echo lang('signup_mobile_placeholder'); ?>" name="mobile" required>
								</div>
								<?php echo form_error('mobile'); ?>
								<div class="form_control_input">
									<input name="submit" type="submit" value="<?php echo lang('signup_create_account'); ?>" class="form-control input-md btn-orange">
								</div>
							</form>
                                <?php 
				$facebook_status	=	$this->db->get_where('sitesettings' , array('type'=>'facebook_status'))->row()->description;
				if($facebook_status !=2){ ?>
				 <center> <b style="line-height: 32px;">Or</b></center>
				 <a href="<?php echo $loginUrl; ?>"><button class="btn btn-lg btn-primary btn-block btn-facebook" type="submit"><?php echo lang('signup_create_login_facebook'); ?></button></a>
				<?php 
				}
				?>				
				
								
						</div>
						<div class="LoginLink">
							<p><?php echo lang('signup_create_have_account'); ?> <a href="<?php echo base_url();?>home/login"><?php echo lang('signup_create_login'); ?></a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div><!-- /.container -->

<script>
	$(document).ready(function(){
		$('#userTypePersonal').change(function(e){
			if ($(this).is(':checked')) {
				$('#signUpPersonal').show();
				$('#signUpCompany').hide();
				$('#userFirstName').attr('required', 'required');
				$('#userLastName').attr('required', 'required');
				$('#companyName').removeAttr('required', 'required');

			}
		});
		$('#userTypeCompany').change(function(e){
			if ($(this).is(':checked')) {
				$('#signUpPersonal').hide();
				$('#signUpCompany').show();
				$('#userFirstName').removeAttr('required', 'required');
				$('#userLastName').removeAttr('required', 'required');
				$('#companyName').attr('required', 'required');
			}
		});
	});
</script>

<style>
	.error {
		font-weight: bold;
		color: red;
	}
</style>