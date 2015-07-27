<div class="box">
	<div class="box-header">
    
    	<!------CONTROL TABS START------->
		<ul class="nav nav-tabs nav-tabs-left">
			<li class="active">
            	<a href="#list" data-toggle="tab"><i class="icon-align-justify"></i> 
                Categories List
					
                    	</a></li>
                        <?php if($admin_prem !=3){?>
			<li>
            	<a href="#add" data-toggle="tab"><i class="icon-plus"></i>
					Add Category
                    	</a></li>
                        <?php }?>
		</ul>
    	<!------CONTROL TABS END------->
        
	</div>
	<div class="box-content padded">
		<div class="tab-content">
            <!----TABLE LISTING STARTS--->
            <div class="tab-pane  active" id="list">
            <div class="alert alert-danger">
            	
<strong>NOTE :</strong> You can delete the category which have No jobs or No Sub Categories. 
            </div>
                    <br/>
                    <div class="box">
                        <div class="box-content">
                            <div id="dataTables">
                            <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">
                                <thead>
                                    <tr>
                                    	<th>ID</th>
                                        <th><div>Category</div></th>
                                        <th><div>Parent Category</div></th>
                                        <th><div>Job Type</div></th>
                                        <th><div>Total jobs</div></th>
                                        <th><div>Status</div></th>
                                        <th>Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php  foreach($categories as $category):?>
                                    <tr>
                                        <td><?php echo $category['category_id'];?></td>
                                      <td><?php echo $category['category_name'];?></td>
                                      <td align="center">
                                      <?php
									  if($category['category_parent_id']==0){
										  echo $output ="-";
									  }else{
											$output = $this->db->query("SELECT * FROM job_category WHERE category_id=".$category['category_parent_id'])->row()->category_name;
										echo $output;
									  }
									  ?>
                                      </td> 
                                      <td>
                                       <?php 
									
										switch ($category['category_job_type'])
										{
											case '1':
											$type ='Virtual';
											break;
											case '2':
											$type ='In Person';
											break;
											case '3':
											$type ='Transaction';
											break;
											
										}
										echo $type;?>
                                      </td>  
                                      <td></td>
                                      <td>
									   <?php 
									
										switch ($category['category_status'])
										{
											case '1':
											$status ='Active';
											break;
											case '2':
											$status ='Deactive';
											break;
											
										}
										echo $status;?>
									 </td>
                                      <td align="center">
                                           <!-- <a data-toggle="modal" href="#modal-form" onclick="modal('adminusers_profile',<?php echo $category['category_id'];?>)"
                                                 class="btn btn-default btn-small">
                                                    <i class="icon-user"></i> Profile
                                            </a>-->
                                            <a data-toggle="modal" href="#modal-form" onclick="modal('edit_categories',<?php echo $category['category_id'];?>)"	class="btn btn-gray btn-small">
                                                    <i class="icon-wrench"></i> Edit
                                            </a>
                                            <a data-toggle="modal" href="#modal-delete" onclick="modal_delete('<?php echo base_url();?>admin/categories/delete/<?php echo $category['category_id'];?>')"
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
			<div class="tab-pane box" id="add" style="padding: 5px">
                <div class="box-content">
                	<?php echo form_open(base_url().'admin/categories/create' , array('class' => 'form-horizontal validatable','target'=>'_top', 'enctype' => 'multipart/form-data'));?>
                            <div class="padded">

                            <div class="control-group">
                                <label class="control-label">Job Type</label>
                                <div class="controls">
                                 
                                    <select name="category_job_type" class="uniform" style="width:100%;">
                                         <option value="0"> -- Select one -- </option>
                                         <option value='1'>Virtual</option>
                                         <option value='2'>In Person</option>
                                         <option value='3'>Transaction</option>
                                    </select>
                                </div>
                           </div>                          
                                                       
                           <div class="control-group">
                                <label class="control-label">Parent Category</label>
                                <div class="controls">
                                 
                                    <select name="category_parent_id" class="uniform" style="width:100%;">
                                         <option value="0"> -- Select one -- </option>
                                        
                                         <?php  $count = 1;foreach($categories as $category):?>
                                 				<?php  echo "<option value='".$category['category_id']."'>".$category['category_name']."</option>";?>      
                                    	 <?php endforeach; ?>
                                    </select>
                                </div>
                           </div>
                             <div class="control-group">
                                <label class="control-label">Category Name</label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="category_name"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Status</label>
                                <div class="controls">
                                    <select name="category_status" class="uniform" style="width:100%;">
                                      	<option value="1">Active</option>
                                    	<option value="2">Deactive</option>
                                    </select>
                                </div>
                            </div>
                                         <!--<input type="hidden" name="task_category_id" id="task_category_id" value="" />   -->            
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-gray">Add</button>
                        </div>
                    </form>                
                </div>                
			</div>
			<!----CREATION FORM ENDS--->
            
		</div>
	</div>
</div>
<!--<script>
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
</script>-->
