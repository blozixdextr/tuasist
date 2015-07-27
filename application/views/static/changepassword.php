<div id="content" class="container">
	
		<div class="col-xs-10 col-xs-offset-1 task-form-container whiteContainer">
			<h2>Change Password</h2>
            	<?php 	$user_id =  $this->session->userdata('user_id'); ?>
			<?php echo form_open(base_url().'home/changepassword/update_pass/'.$user_id , array('class' => 'col-xs-8'));?>
				<div class="form_control_input">
					<p>Current Password</p>
					<input id="change" class="form-control" required size="50" type="password" name="old_pass">
				</div>

				<div class="form_control_input">
					<p>New Password</p>
					<input id="change" class="form-control" required size="50" type="password" name="new_pass">
				</div>

				<div class="form_control_input">
					<p>Re-enter New Password</p>
					<input id="change" class="form-control" required size="50" type="password" name="confirm_pass">
				</div>

				<input class="btn btn-orange pull-right margt15" type="submit" value="Change Password">

			</form>

			<div class="col-xs-4 otherSidebar accountPage">

				<h4>Your Account</h4>
				<ul>
                    <li><a href="<?php echo base_url();?>home/changepassword">Change Password</a></li>
                    <li><a href="<?php echo base_url();?>home/wpayment_settings">Payment Settings</a></li>
                    <!-- <li><a href="<?php echo base_url();?>home/confirm_deactivation">Deactivate Account</a></li>-->
				</ul>
				
			</div>

		</div>
	</div>