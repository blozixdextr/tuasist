<div class="tab-pane box active" id="edit" style="padding: 5px">
                <div class="box-content">
                	<?php foreach($edit_data as $row):?>
                    <?php echo form_open('admin/categories/do_update/'.$row['category_id'] , array('class' => 'form-horizontal validatable','target'=>'_top', 'enctype' => 'multipart/form-data'));?>
                    <div class="padded">
                    
                      <div class="control-group">
                                <label class="control-label">Job Type</label>
                                <div class="controls">
                                 
                                    <select name="category_job_type" class="uniform" style="width:100%;">
                                         <option value="0"> -- Select one -- </option>
                                         <option value='1' <?php if($row['category_job_type']==1){echo "selected='selected'";} ?>>Virtual</option>
                                         <option value='2' <?php if($row['category_job_type']==2){echo "selected='selected'";} ?>>In Person</option>
                                         <option value='3' <?php if($row['category_job_type']==3){echo "selected='selected'";} ?>>Transaction</option>
                                    </select>
                                </div>
                           </div>  
                                                                               
                           <div class="control-group">
                                <label class="control-label">Parent Category</label>
                                <div class="controls">
                                 
                                    <select name="category_parent_id" class="uniform" style="width:100%;">
                                    	<?php 
											if($row['category_parent_id'] =="0"){
												echo "<option value='0'> -- Select one -- </option>";
											}else {
												echo "<option value='0'> -- Select one -- </option>";
												 $categories= $this->db->get('job_category')->result_array();
										     	  foreach($categories as $category){  												  
													   echo "<option value='".$category['category_id'];
													    if($row['category_parent_id']==$category['category_id']){echo $sel = "' selected ='selected'";}
													   echo "'>".$category['category_name']."</option>";
										          }
											}
										?>
                                        
                                        
                                    </select>
                                    
                                </div>
                           </div>
                             <div class="control-group">
                                <label class="control-label">Category Name</label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="category_name" value="<?php echo $row['category_name'];?>"/>
                                </div>
                            </div>
                            
                            <!--<div class="control-group">
                                <label class="control-label">Category Description</label>
                                <div class="controls">
                                	<textarea name="category_description" class="validate[required]" ><?php echo $row['category_description'];?></textarea>
                                   
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label">Category Average Price</label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="category_average_price" value="<?php echo $row['category_average_price'];?>"/>
                                </div>
                            </div>
                            
                             <div class="control-group">
                                <label class="control-label">Category Image</label>
                                 <div class="controls" style="width:210px;">
                                     <input name="category_image" type="file"/>
                                </div>
                            </div>-->
                            
                            <div class="control-group">
                                <label class="control-label">Status</label>
                                <div class="controls">
                                    <select name="category_status" class="uniform" style="width:100%;">
                                     	<option value="1" <?php if($row['category_status']==1){echo "selected='selected'";} ?>>Active</option>
                                    	<option value="2" <?php if($row['category_status']==2){echo "selected='selected'";} ?>>Deactive</option>
                                    </select>
                                </div>
                            </div>
                                         <!--<input type="hidden" name="task_category_id" id="task_category_id" value="" />   -->            
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-gray">Update</button>
                        </div>
                    </form>      
                    <?php endforeach;?>
                </div>
			</div>