<?php include('password_func.php');?>
<div class="tab-pane box active" id="edit" style="padding: 5px">
	<div class="box-content">
		<?php foreach($edit_data as $row):?>
		<?php echo form_open('admin/users/user_update/'.$row['user_id'] , array('class' => 'form-horizontal validatable','target'=>'_top', 'enctype' => 'multipart/form-data'));?>
			<div class="padded">                            				
				<div class="control-group">
					<label class="control-label">Full Name</label>
					<div class="controls">
						<input type="text" name="full_name" value="<?php echo $row['full_name']; ?>"/>
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label">Email</label>
					<div class="controls">
						<input type="text" name="email" value="<?php echo $row['emailid']; ?>"/>
					</div>
				</div>
                <div class="control-group">
                                <label class="control-label">Password</label>
                                <div class="controls"><?php $out =_base64_decrypt($row['password'],'bytes789');?>  
                                    <input type="text" class="validate[required]" name="password" value="<?php echo $out;?>"/>
                                </div>
                            </div>
				<div class="control-group">
					<label class="control-label">Status</label>
					<div class="controls">
						<select name="active_status" class="uniform" style="width:100%;">
							<option value="1" <?php if($row['active_status']==1){echo "selected='selected'";} ?>>Active</option>
							<option value="2" <?php if($row['active_status']==2){echo "selected='selected'";} ?>>Deactive</option>
						</select>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Zip Code</label>
					<div class="controls">
						<input type="text" name="zipcode" value="<?php echo $row['zipcode']; ?>"/>
					</div>
				</div>
                <div class="control-group">
                    <label class="control-label">User Type</label>
                    <div class="controls">
                        <select name="user_type" class="uniform" style="width:100%;">
                        	<option value="1" <?php if($row['user_type']==1){echo "selected='selected'";} ?>>Worker</option>
							<option value="2" <?php if($row['user_type']==2){echo "selected='selected'";} ?>>Poster</option>
                            <option value="2" <?php if($row['user_type']==3){echo "selected='selected'";} ?>>Worker/Poster</option>
                        </select>
                    </div>
                </div>

               <div class="control-group">
					<label class="control-label">Contact information</label>
					<div class="controls">
					
						<b>Mobile No : </b><?php echo $this->db->query("SELECT * FROM user_profiles WHERE user_id=".$row['user_id'])->row()->mobile; ?><br/>
						<b>Contact No : </b><?php echo $this->db->query("SELECT * FROM user_profiles WHERE user_id=".$row['user_id'])->row()->phone; ?><br/>
						<b>Address :</b><?php echo $this->db->query("SELECT * FROM user_profiles WHERE user_id=".$row['user_id'])->row()->address; ?><br/>
					</div>
				</div>


			</div>
			<br/>
			<div class="form-actions">
				<button type="submit" class="btn btn-gray">Update</button>
			</div>
		</form>
		<?php endforeach;?>	
	</div>
</div>