<?php $user_id =  $this->session->userdata('user_id'); ?>

<div id="content" class="container">
	
		<div class="col-xs-10 col-xs-offset-1 task-form-container whiteContainer">
			<h2>Deactivate My Account</h2>
            <?php echo form_open(base_url().'home/confirm_deactivation/insert/'.$user_id , array('class' => 'col-xs-8'));?>
				<div class="form_control_input">
					<p>Reason for Deactivation:</p>
					<textarea id="change" class="form-control" required rows="10" name="reason"></textarea>
				</div>

				<input class="btn btn-orange pull-right margt15" type="submit" value="Deactivate Account" onclick="return confirm('Are Sure to Deactivate')">

			</form>

			<div class="col-xs-4 otherSidebar accountPage">

				<h4>Your Account</h4>
				<ul>
					 <li><a href="<?php echo base_url();?>home/changepassword">Change Password</a></li>
                    <li><a href="<?php echo base_url();?>home/wpayment_settings">Payment Settings</a></li>
                    <li><a href="<?php echo base_url();?>home/confirm_deactivation">Deactivate Account</a></li>
				</ul>
				
			</div>

		</div>
	</div>