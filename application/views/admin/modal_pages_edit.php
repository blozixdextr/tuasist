<script type="text/javascript" src="<?php echo base_url();?>js/nicEdit-latest.js"></script> <script type="text/javascript">
	//<![CDATA[
		bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
	//]]>
</script>
<div class="tab-pane box active" id="edit" style="padding: 5px">
	<div class="box-content">
		<?php foreach($edit_data as $row):?>
		<?php echo form_open('admin/pages/update/'.$row['stpage_id'] , array('class' => 'form-horizontal validatable','target'=>'_top', 'enctype' => 'multipart/form-data'));?>
			<div class="padded">                            				
				<div class="control-group">
					<label class="control-label">Page Name</label>
					<div class="controls">
						<input type="text" name="stpage_name" value="<?php echo $row['stpage_name']; ?>"/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Page Title</label>
					<div class="controls">
						<input type="text" name="stpage_title" value="<?php echo $row['stpage_title']; ?>"/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Page Content</label>
					<div class="controls">
						<textarea name="stpage_content" style="width: 300px; height: 150px;"><?php echo $row['stpage_content']; ?></textarea>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">status</label>
					<div class="controls">
						<select name="stpage_status" class="uniform" style="width:100%;">
							<option value="1" <?php if($row['stpage_status']==1){echo "selected='selected'";} ?>>Active</option>
							<option value="2" <?php if($row['stpage_status']==2){echo "selected='selected'";} ?>>Deactive</option>
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