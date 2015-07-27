<div id="content" class="container">
	
		<div class="col-xs-10 col-xs-offset-1 task-form-container whiteContainer">
			<h2>Edit Member: <?php echo  $this->session->userdata('full_name');?></h2>
            <?php 
				$user_id =  $this->session->userdata('user_id');
				$query = $this->db->query("SELECT * FROM users WHERE user_id=".$user_id);
				$row = $query->row_array();
				$query = $this->db->query("SELECT * FROM user_profiles WHERE user_id=".$user_id);
				$row2 = $query->row_array();
			?>
						<?php echo form_open(base_url().'home/account/update/'.$user_id , array('class' => 'col-xs-8'));?>
				<div class="form_control_input">
					<p>Full Name</p>
					<input id="change" class="form-control" required size="50" type="text" placeholder="Name" name='name' value='<?php echo $row['full_name'];?>'>
				</div>

				<div class="form_control_input">
					<p>Home Address</p>
					<input id="change" class="form-control" required size="50" type="text" placeholder="Address Line" name='address' value='<?php echo $row2['address'];?>'>
				</div>

				<div class="form_control_input">
					<p>Zipcode</p>
					<input id="change" class="form-control" required size="50" type="text" placeholder="Zipcode" name='zipcode' value='<?php echo $row['zipcode'];?>'>
				</div>

				<div class="form_control_input">
					<p>Mobile Phone</p>
					<input id="change" class="form-control" required size="50" type="text" placeholder="(+91) 98xxx 98xxx" name='mobile' value='<?php echo $row2['mobile'];?>'>
				</div>

				<div class="form_control_input">
					<p>Home Phone</p>
					<input id="change" class="form-control" required size="50" type="text" placeholder="(+91) 0444-1234xxx" name='home_phone' value='<?php echo $row2['phone'];?>'>
				</div>

				<input class="btn btn-orange pull-right margt15" type="submit" value="Update">

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