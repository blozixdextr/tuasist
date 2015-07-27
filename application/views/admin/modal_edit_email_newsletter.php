<script type="text/javascript" src="<?php echo base_url();?>js/nicEdit-latest.js"></script> <script type="text/javascript">
	//<![CDATA[
		bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
	//]]>
</script>
<div class="tab-pane box active" id="edit" style="padding: 5px">
	<div class="box-content">
		<?php foreach($edit_data as $row):?>
		<?php echo form_open('admin/email_newsletter/update_email_message/'.$row['email_message_id'] , array('class' => 'form-horizontal validatable','target'=>'_top', 'enctype' => 'multipart/form-data'));?>
			<div class="padded">                            				
				<div class="control-group">
					<label class="control-label">Subject</label>
					<div class="controls">
						<input type="text" name="subject" value="<?php echo $row['subject']; ?>"/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Title</label>
					<div class="controls">
						<input type="text" name="title" value="<?php echo $row['title']; ?>"/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Page Content</label>
					<div class="controls">
						<textarea name="content" style="width: 300px; height: 150px;"><?php echo $row['content']; ?></textarea>
					</div>
				</div>
			</div>
			<br/>
			<div class="form-actions">
				<button type="submit" class="btn btn-gray">Update (or) Send Email</button>
			</div>
		</form>
		<?php endforeach;?>	
	</div>
</div>