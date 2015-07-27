<div class="tab-pane box active" id="edit" style="padding: 5px">
                <div class="box-content">
                	<?php foreach($edit_data as $row):?>
                    <?php echo form_open('admin/locations/country_update/'.$row['country_id'] , array('class' => 'form-horizontal validatable','target'=>'_top', 'enctype' => 'multipart/form-data'));?>
                        <div class="padded">                            
							<div class="control-group">
							<label class="control-label">Country Name</label>
							<div class="controls">
								<input type="text" class="validate[required]" name="country_name" value="<?php echo $row['country_name'];?>"/>
							</div>
							</div>
                            <div class="control-group">
                                <label class="control-label">status</label>
                                <div class="controls">
                                    <select name="status" class="uniform" style="width:100%;">
                                    	<option value="1" <?php if($row['country_status']==1){echo "selected='selected'";} ?>>Active</option>
                                    	<option value="2" <?php if($row['country_status']==2){echo "selected='selected'";} ?>>Deactive</option>
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