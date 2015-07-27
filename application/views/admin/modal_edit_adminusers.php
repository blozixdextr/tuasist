<?php include('password_func.php');?>
<div class="tab-pane box active" id="edit" style="padding: 5px">
                <div class="box-content">
                	<?php foreach($edit_data as $row):?>
                    <?php echo form_open('admin/admin_users/do_update/'.$row['manage_id'] , array('class' => 'form-horizontal validatable','target'=>'_top', 'enctype' => 'multipart/form-data'));?>
                        <div class="padded">
                            <div class="control-group">
                                <label class="control-label">User name</label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="uname" value="<?php echo $row['uname'];?>"/>
                                </div>
                            </div>
                            
                              <div class="control-group">
                                <label class="control-label">Password</label>
                                <div class="controls"><?php $out =_base64_decrypt($row['password'],'bytes789');?>  
                                    <input type="text" class="validate[required]" name="password" value="<?php echo $out;?>"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Email</label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="email" value="<?php echo $row['emailid'];?>"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Admin Type</label>
                                <div class="controls">
                               
                                    <select name="admintype" class="uniform" style="width:100%;">
                                    
                                    	<option value="1"  <?php if($row['admintype']==1){echo "selected='selected'";} ?>>Super Administrator</option>
                                    	<option value="2"  <?php if($row['admintype']==2){echo "selected='selected'";} ?>>Administrator</option>
                                        <option value="3"  <?php if($row['admintype']==3){echo "selected='selected'";} ?>>Staff</option>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">status</label>
                                <div class="controls">
                                    <select name="status" class="uniform" style="width:100%;">
                                    	<option value="1" <?php if($row['status']==1){echo "selected='selected'";} ?>>Active</option>
                                    	<option value="2" <?php if($row['status']==2){echo "selected='selected'";} ?>>Deactive</option>
                                    </select>
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