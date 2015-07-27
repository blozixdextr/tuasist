<div class="box">
	<div class="box-header">
    
    	<!------CONTROL TABS START------->
		<ul class="nav nav-tabs nav-tabs-left">
			<li class="active"><a href="#list" data-toggle="tab"><i class="icon-align-justify"></i> Users List	</a></li>
              <?php if($admin_prem !=3){?>
			<li><a href="#add" data-toggle="tab"><i class="icon-plus"></i> Add Users	</a></li>
            <?php }?>
		</ul>
    	<!------CONTROL TABS END------->
        
	</div>
	<div class="box-content padded">
		<div class="tab-content">
            <!----TABLE LISTING STARTS--->
            <div class="tab-pane  active" id="list">
            		<div class="action-nav-normal">
                                     
                        <div class=" action-nav-button" style="width:200px;">
                          <a href="#" title="Users">
                            <img src="<?php echo base_url();?>template/images/icons/teacher.png" />
                            <span><?php echo $this->db->count_all_results('users');?> Total</span>
                          </a>
                        </div>                        
                        <div class=" action-nav-button" style="width:200px;">
                          <a href="#" title="Users">
                            <img src="<?php echo base_url();?>template/images/icons/teacher.png" />
                            <span>
							<?php
                            	$this->db->where("user_type = '2' OR user_type = '3'");
								$this->db->from('users');
								echo $this->db->count_all_results();
						   ?> Posters</span>
                          </a>
                        </div>
                        
                        <div class=" action-nav-button" style="width:200px;">
                          <a href="#" title="Users">
                            <img src="<?php echo base_url();?>template/images/icons/teacher.png" />
                            <span><?php
                            	$this->db->where("user_type = '1' OR user_type = '3'");
								$this->db->from('users');
								echo $this->db->count_all_results();
						   ?> Workers</span>
                          </a>
                        </div>
                   
                    </div>
                    
                    
                    
                    <div class="box">
                        <div class="box-content">
                            <div id="dataTables">
                     <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">
                                <thead>
                                    <tr>
										<th><div>ID&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </div></th>
                                        <th><div>User Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div></th>
                                        <th><div>Zip Code&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div></th>
                                        <th><div>Status&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div></th>
                                        <th><div>User Type&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div></th>
                                        <th><div>Registered On</div></th>
                                        <th><div>Options</div></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php  $count = 1;foreach($users as $user):?>
                                    <tr>
                                        <td><?php echo $user['user_id'];?></td>
                                        <td><?php echo $user['full_name']; ?></td>
                                        <td><?php echo $user['zipcode']; ?></td>
										<td>
                                        <?php 
										switch ($user['active_status'])
										{
											case '1':
											$status ='Active';
											break;
											case '2':
											$status ='DeActive';
											break;	
										}
										echo $status;?>
                                        </td>
                                        <td>
                                        <?php 
										$status='';
										switch ($user['user_type'])
										{
											case '1':
											$status ='Worker';
											break;
											case '2':
											$status ='Poster';
											break;	
											case '3':
											$status ='Worker/Poster';
											break;	
										}
										echo $status;?>
                                        </td>
                                          <td><?php echo $user['signup_date']; ?></td>  
                                        <td align="center">
                                            <a data-toggle="modal" href="#modal-form" onclick="modal('user_edit',<?php echo $user['user_id'];?>)"	class="btn btn-gray btn-small">
                                                    <i class="icon-wrench"></i> Edit
                                            </a>
											<a data-toggle="modal" href="#modal-delete" onclick="modal_delete('<?php echo base_url();?>admin/users/user_delete/<?php echo $user['user_id'];?>')"
											 class="btn btn-red btn-small">
												<i class="icon-trash"></i> Delete 
											</a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
			</div>
            <!----TABLE LISTING ENDS--->
            
            
			<!----CREATION FORM STARTS---->
			<div class="tab-pane box  span6" id="add" style="padding: 5px">
                <div class="box-content">
               <?php echo form_open(base_url().'admin/users/user_create' , array('class' => 'form-horizontal validatable','target'=>'_top', 'enctype' => 'multipart/form-data'));?>
                  
                        <div class="padded">
                            <div class="control-group">
                                <label class="control-label">Full Name</label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="full_name"/>
                                </div>
                            </div>
							
							<div class="control-group">
                                <label class="control-label">Email</label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="email"/>
                                </div>
                            </div>
							<div class="control-group">
                                <label class="control-label">Password</label>
                                <div class="controls">
                                    <input type="password" class="validate[required]" name="password"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Active Status</label>
                                <div class="controls">
                                    <select name="active_status" class="uniform" style="width:100%;">
                                      	<option value="1">Active</option>
                                    	<option value="2">Deactive</option>
                                    </select>
                                </div>
                            </div>
							<div class="control-group">
                                <label class="control-label">Zip Code</label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="zipcode"/>
                                </div>
                            </div>
							<div class="control-group">
                                <label class="control-label">User Type</label>
                                <div class="controls">
                                    <select name="user_type" class="uniform" style="width:100%;">
                                      	<option value="1">Worker</option>
                                    	<option value="2">Poster</option>
                                        <option value="3">Worker/Poster</option>
                                    </select>
                                </div>
                            </div>
							
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-gray">Add User</button>
                        </div>
                    </form>                    
                </div>                
			</div>
			<!----CREATION FORM ENDS--->
            
		</div>
	</div>
</div>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#imgInp").change(function(){
        readURL(this);
    });
</script>