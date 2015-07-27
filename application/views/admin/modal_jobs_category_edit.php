<div class="tab-pane box active" id="edit" style="padding: 5px">
	<div class="box-content">
		<?php $categories	=	$this->crud_model->get_job_category(); ?>
		<?php foreach($edit_data as $row):?>
		<?php echo form_open('admin/jobs/jobs_category_update/'.$row['category_id'] , array('class' => 'form-horizontal validatable','target'=>'_top', 'enctype' => 'multipart/form-data'));?>
			<div class="padded">                            				
				<div class="control-group">
				<label class="control-label">Parent</label>
				<div class="controls">								
					<select name="category_parent_id" class="uniform" style="width:100%;">
							<?php 
								if($row['category_parent_id'] =="0"){
									echo "<option value='0'> -- No Parent -- </option>";
									foreach($categories as $category){  												  
										   echo "<option value='".$category['category_id'];
											if($row['category_parent_id']==$category['category_id']){echo $sel = "' selected ='selected'";}
										   echo "'>".$category['category_name']."</option>";
									  }
								}else {
									echo "<option value='0'> -- No Parent -- </option>";
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
					<label class="control-label">Name</label>
					<div class="controls">
						<input type="text" name="category_name" value="<?php echo $row['category_name']; ?>"/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">status</label>
					<div class="controls">
						<select name="category_status" class="uniform" style="width:100%;">
							<option value="1" <?php if($row['category_status']==1){echo "selected='selected'";} ?>>Active</option>
							<option value="2" <?php if($row['category_status']==2){echo "selected='selected'";} ?>>Deactive</option>
						</select>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">URL Name</label>
					<div class="controls">
						<input type="text" name="category_url_name" value="<?php echo $row['category_url_name']; ?>"/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Description</label>
					<div class="controls">
						<input type="text" name="category_description" value="<?php echo $row['category_description']; ?>"/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Average Price</label>
					<div class="controls">
						<input type="text" name="category_average_price" value="<?php echo $row['category_average_price']; ?>"/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Image</label>
					<div class="controls">
						<input type="text" name="category_image" value="<?php echo $row['category_image']; ?>"/>
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