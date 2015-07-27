<div class="tab-pane box active" id="edit" style="padding: 5px">
                <div class="box-content">
					<?php $countries	=	$this->crud_model->get_country(); ?>
					<?php $states	=	$this->crud_model->get_state(); ?>
                	<?php foreach($edit_data as $row):?>
                    <?php echo form_open('admin/locations/city_update/'.$row['city_id'] , array('class' => 'form-horizontal validatable','target'=>'_top', 'enctype' => 'multipart/form-data'));?>
                        <div class="padded">                            			
							<div class="control-group">
							<label class="control-label">City Name</label>
							<div class="controls">
								<input type="text" class="validate[required]" name="city_name" value="<?php echo $row['city_name']; ?>"/>
							</div>
							</div>
							
							<div class="control-group">
							<label class="control-label">Country Name</label>
							<div class="controls">								
								<select name="country_id" class="uniform" style="width:100%;">
                                    	<?php 
											if($row['country_id'] =="0"){
												echo "<option value='0'> -- Select one -- </option>";
											}else {
												echo "<option value='0'> -- Select one -- </option>";
										     	  foreach($countries as $country){  												  
													   echo "<option value='".$country['country_id'];
													    if($row['country_id']==$country['country_id']){echo $sel = "' selected ='selected'";}
													   echo "'>".$country['country_name']."</option>";
										          }
											}
										?>
                                </select>
							</div>
							</div>
							
							<div class="control-group">
							<label class="control-label">State Name</label>
							<div class="controls">
								<select name="state_id" class="uniform" style="width:100%;">
                                    	<?php 
											if($row['state_id'] =="0"){
												echo "<option value='0'> -- Select one -- </option>";
											}else {
												echo "<option value='0'> -- Select one -- </option>";
										     	  foreach($states as $state){  												  
													   echo "<option value='".$state['state_id'];
													    if($row['state_id']==$state['state_id']){echo $sel = "' selected ='selected'";}
													   echo "'>".$state['state_name']."</option>";
										          }
											}
										?>
                                </select>
							</div>
							</div>  
							
                            <div class="control-group">
                                <label class="control-label">status</label>
                                <div class="controls">
                                    <select name="city_status" class="uniform" style="width:100%;">
                                    	<option value="1" <?php if($row['city_status']==1){echo "selected='selected'";} ?>>Active</option>
                                    	<option value="2" <?php if($row['city_status']==2){echo "selected='selected'";} ?>>Deactive</option>
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