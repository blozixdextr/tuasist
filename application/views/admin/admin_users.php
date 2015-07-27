<div class="box">
	<div class="box-header">
    
    <!------CONTROL TABS START------->
		<ul class="nav nav-tabs nav-tabs-left">
			<li class="active">
            	<a href="#list" data-toggle="tab"><i class="icon-align-justify"></i> 
                Administrator User List
					
                    	</a></li>
			<li>
            	<a href="#add" data-toggle="tab"><i class="icon-plus"></i>
					add User
                    	</a></li>
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
                            <span><?php echo $this->db->count_all_results('site_management_users');?> Total</span>
                          </a>
                        </div>
                        
                    
                        
                        <div class=" action-nav-button" style="width:200px;">
                          <a href="#" title="Users">
                            <img src="<?php echo base_url();?>template/images/icons/teacher.png" />
                            <span>
                            <?php 
							echo $this->db->where('status',1)->count_all_results('site_management_users');
							?>
                             Active</span>
                          </a>
                        </div>
                        
                        <div class=" action-nav-button" style="width:200px;">
                          <a href="#" title="Users">
                            <img src="<?php echo base_url();?>template/images/icons/teacher.png" />
                            <span> <?php 
							 echo $this->db->where('status',2)->count_all_results('site_management_users');
							?>
                             Deactive</span>
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
                                      	<th><div>User Name</div></th>
                                        <th><div>Admin Type</div></th>
                                        <th><div>Email Id</div></th>
                                        <th><div>Status</div></th>
                                        <th>Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php  $count = 1;foreach($admin_users as $ad_user):?>
                                    <tr>
                                        <td><?php echo $count++;?></td>
                                        
                                        <td><?php echo $ad_user['uname'];?></td>
                                        <td>
										<?php 
									
										switch ($ad_user['admintype'])
										{
											case '1':
											$admintype ='Super Administrator';
											break;
											case '2':
											$admintype ='Administrator';
											break;
											case '3':
											$admintype ='staff';
											break;
										}
										echo $admintype;?>
                                        
                                        </td>
                                        <td><?php echo $ad_user['emailid'];?></td>
                                        <td>
                                        <?php 
									
										switch ($ad_user['status'])
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
                                        
                                        <td align="center">
                                        <?php if($ad_user['admintype'] !=1){ ?>
                                           <!-- <a data-toggle="modal" href="#modal-form" onclick="modal('adminusers_profile',<?php echo $ad_user['manage_id'];?>)"
                                                 class="btn btn-default btn-small">
                                                    <i class="icon-user"></i> Profile
                                            </a>-->
                                            <a data-toggle="modal" href="#modal-form" onclick="modal('edit_adminusers',<?php echo $ad_user['manage_id'];?>)"	class="btn btn-gray btn-small">
                                                    <i class="icon-wrench"></i> Edit
                                            </a>
                                            <a data-toggle="modal" href="#modal-delete" onclick="modal_delete('<?php echo base_url();?>admin/admin_users/delete/<?php echo $ad_user['manage_id'];?>')"
                                                 class="btn btn-red btn-small">
                                                    <i class="icon-trash"></i> Delete 
                                            </a>
                                            <?php }?>
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
			<div class="tab-pane box" id="add" style="padding: 5px">
                <div class="box-content">
                	<?php echo form_open(base_url().'admin/admin_users/create' , array('class' => 'form-horizontal validatable','target'=>'_top', 'enctype' => 'multipart/form-data'));?>
                    <form method="post" action="<?php echo base_url();?>admin/admin_users/create/" class="form-horizontal validatable" enctype="multipart/form-data">
                        <div class="padded">
                            <div class="control-group">
                                <label class="control-label">User Name</label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="uname"/>
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label">Password</label>
                                <div class="controls">
                                    <input type="password" class="validate[required]" name="password"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Email</label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="email"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Admin Type</label>
                                <div class="controls">
                                    <select name="admintype" class="uniform" style="width:100%;">
                                    	<option value="1">Super Administrator</option>
                                    	<option value="2">Administrator</option>
                                        <option value="3">staff</option>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Status</label>
                                <div class="controls">
                                    <select name="status" class="uniform" style="width:100%;">
                                    	<option value="1">Active</option>
                                    	<option value="2">Deactive</option>
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