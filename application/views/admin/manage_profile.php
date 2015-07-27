<div class="box">
	<div class="box-header">
    
    	<!------CONTROL TABS START------->
		<ul class="nav nav-tabs nav-tabs-left">

			<li class="active">
            	<a href="#list" data-toggle="tab"><i class="icon-align-justify"></i> 
                Manage Profile
				</a></li>
		</ul>
    	<!------CONTROL TABS END------->
        
	</div>
	<div class="box-content padded">
		<div class="tab-content">
        	<!----EDITING FORM STARTS---->
			<div class="tab-pane box active" id="list" style="padding: 5px">
                <div class="box-content padded">
					<?php 
                    foreach($edit_data as $row):
                        ?>
                        <?php echo form_open(base_url().'admin/manage_profile/update_profile_info' , array('class' => 'form-horizontal validatable','target'=>'_top'));?>
                            <div class="control-group">
                                <label class="control-label">Name</label>
                                <div class="controls">
                                    <input type="text" class="" name="name" value="<?php echo $row['uname'];?>"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Email</label>
                                <div class="controls">
                                    <input type="text" class="" name="email" value="<?php echo $row['emailid'];?>"/>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-gray">Update Profile</button>
                            </div>
                        </form>
						<?php
                    endforeach;
                    ?>
                </div>
			</div>
            <!----EDITING FORM ENDS--->
            
		</div>
	</div>
</div>


<!--password-->
<div class="box">
	<div class="box-header">
    
    	<!------CONTROL TABS START------->
		<ul class="nav nav-tabs nav-tabs-left">

			<li class="active">
            	<a href="#list" data-toggle="tab"><i class="icon-lock"></i> 
				Change Password
                    	</a></li>
		</ul>
    	<!------CONTROL TABS END------->
        
	</div>
	<div class="box-content padded">
		<div class="tab-content">
        	<!----EDITING FORM STARTS---->
			<div class="tab-pane box active" id="list" style="padding: 5px">
                <div class="box-content padded">
					<?php 
                    foreach($edit_data as $row):
                        ?>
                        <?php echo form_open(base_url().'admin/manage_profile/change_password' , array('class' => 'form-horizontal validatable','target'=>'_top'));?>
                            <div class="control-group">
                                <label class="control-label">Password</label>
                                <div class="controls">
                                    <input type="password" class="" name="password" value=""/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">New Password</label>
                                <div class="controls">
                                    <input type="password" class="" name="new_password" value=""/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Confirm New Password</label>
                                <div class="controls">
                                    <input type="password" class="" name="confirm_new_password" value=""/>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-gray">Update Password</button>
                            </div>
                        </form>
						<?php
                    endforeach;
                    ?>
                </div>
			</div>
            <!----EDITING FORM ENDS--->
            
		</div>
	</div>
</div>