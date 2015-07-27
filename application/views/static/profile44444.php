<style>
::-webkit-input-placeholder { 
	color: #e27a99 !important; 
} 
:-moz-placeholder { 
	/* Firefox 18- */ 
	color: #e27a99 !important; 
} 
::-moz-placeholder { 
	/* Firefox 19+ */ 
	color: #e27a99 !important; 
} 
:-ms-input-placeholder { 
	color: #e27a99 !important; 
}
</style>
<div class="container">
	<div class="row">
		<div class="col-xs-5 col-centered">
			<div class="row">
				<div class="col-xs-12">
					<div class="login_controls">
					<?php $user_id =  $this->session->userdata('user_id');?>
					<?php echo form_open(base_url().'home/profile/update/'.$user_id , array('class' => 'form-signin'));?>
						<?php foreach($edit_data as $data){ ?>
							<div class="form_control_input">
								<input name="user_image" class="form-control" placeholder="Add User Image" value="<?php echo $data['user_image']; ?>">
							</div>
							<div class="form_control_input">
								<input  class="form-control" placeholder="Add About" name="about_info" value="<?php echo $data['about_info']; ?>">
							</div>
							<div class="form_control_input">
								<select name="gender" class="form-control">
								<?php if($data['gender'] == '1'){?>
									<option value="1" selected>Male</option>
									<option value="2">Female</option>
								<?php }else{?>	
									<option value="1">Male</option>
									<option value="2" selected>Female</option>
								<?php } ?>	
							   </select>
						    </div>
							<div class="form_control_input">
								<input name="dob" class="form-control" placeholder="Date of Birth" value="<?php echo $data['dob']; ?>">
							</div>
							<div class="form_control_input">
								<input name="location_map" class="form-control" placeholder="Add your Location" value="<?php echo $data['location_map']; ?>">
							</div>
							<div class="form_control_input">
								<input name="skills" class="form-control" placeholder="Add yourSkill" value="<?php echo $data['skills']; ?>">
							</div>
							<div class="form_control_input">
								<input name="profile_links" class="form-control" placeholder="Add Profile Link" value="<?php echo $data['profile_links']; ?>">
							</div>
							<div class="form_control_input">
									<input id="submit" name="submit" type="submit" value="Update your Details" class="form-control input-md btn-orange">
							</div>
						<?php } ?>
					</form>	
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
