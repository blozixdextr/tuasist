<div class="tab-pane box active" id="edit" style="padding: 5px">
	<div class="box-content">
		<?php foreach($edit_data as $row):?>
		<?php echo form_open('admin/jobs/jobs_update/'.$row['job_id'] , array('class' => 'form-horizontal validatable','target'=>'_top', 'enctype' => 'multipart/form-data'));?>
			<div class="padded">                            				
				<div class="control-group">
					<label class="control-label">job_name</label>
					<div class="controls">
						<input type="text" name="job_name" value="<?php echo $row['job_name']; ?>"/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">job_url_name</label>
					<div class="controls">
						<input type="text" name="job_url_name" value="<?php echo $row['job_url_name']; ?>"/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">job_description</label>
					<div class="controls">
						<input type="text" name="job_description" value="<?php echo $row['job_description']; ?>"/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">job_to_price</label>
					<div class="controls">
						<input type="text" name="job_to_price" value="<?php echo $row['job_to_price']; ?>"/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">job_price</label>
					<div class="controls">
						<input type="text" name="job_price" value="<?php echo $row['job_price']; ?>"/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">more_details</label>
					<div class="controls">
						<input type="text" name="more_details" value="<?php echo $row['more_details']; ?>"/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">category_id</label>
					<div class="controls">
						<input type="text" name="category_id" value="<?php echo $row['category_id']; ?>"/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">city_id</label>
					<div class="controls">
						<input type="text" name="city_id" value="<?php echo $row['city_id']; ?>"/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">user_id</label>
					<div class="controls">
						<input type="text" name="user_id" value="<?php echo $row['user_id']; ?>"/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">job_worker_id</label>
					<div class="controls">
						<input type="text" name="job_worker_id" value="<?php echo $row['job_worker_id']; ?>"/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">job_post_date</label>
					<div class="controls">
						<input type="text" name="job_post_date" value="<?php echo $row['job_post_date']; ?>"/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">job_assigned_date</label>
					<div class="controls">
						<input type="text" name="job_assigned_date" value="<?php echo $row['job_assigned_date']; ?>"/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">job_complete_date</label>
					<div class="controls">
						<input type="text" name="job_complete_date" value="<?php echo $row['job_complete_date']; ?>"/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">job_close_date</label>
					<div class="controls">
						<input type="text" name="job_close_date" value="<?php echo $row['job_close_date']; ?>"/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">job_cancel_date</label>
					<div class="controls">
						<input type="text" name="job_cancel_date" value="<?php echo $row['job_cancel_date']; ?>"/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">job_status</label>
					<div class="controls">
						<input type="text" name="job_status" value="<?php echo $row['job_status']; ?>"/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">job_activity_status</label>
					<div class="controls">
						<input type="text" name="job_activity_status" value="<?php echo $row['job_activity_status']; ?>"/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">job_assing_worker</label>
					<div class="controls">
						<input type="text" name="job_assing_worker" value="<?php echo $row['job_assing_worker']; ?>"/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">job_start_day</label>
					<div class="controls">
						<input type="text" name="job_start_day" value="<?php echo $row['job_start_day']; ?>"/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">job_start_time</label>
					<div class="controls">
						<input type="text" name="job_start_time" value="<?php echo $row['job_start_time']; ?>"/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">job_end_day</label>
					<div class="controls">
						<input type="text" name="job_end_day" value="<?php echo $row['job_end_day']; ?>"/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">job_end_time</label>
					<div class="controls">
						<input type="text" name="job_end_time" value="<?php echo $row['job_end_time']; ?>"/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">job_auto_assignment</label>
					<div class="controls">
						<input type="text" name="job_auto_assignment" value="<?php echo $row['job_auto_assignment']; ?>"/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">job_is_private</label>
					<div class="controls">
						<input type="text" name="job_is_private" value="<?php echo $row['job_is_private']; ?>"/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">job_repeat</label>
					<div class="controls">
						<input type="text" name="job_repeat" value="<?php echo $row['job_repeat']; ?>"/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">job_repeat_week</label>
					<div class="controls">
						<input type="text" name="job_repeat_week" value="<?php echo $row['job_repeat_week']; ?>"/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">job_online</label>
					<div class="controls">
						<input type="text" name="job_online" value="<?php echo $row['job_online']; ?>"/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">job_large_vehicals</label>
					<div class="controls">
						<input type="text" name="job_large_vehicals" value="<?php echo $row['job_large_vehicals']; ?>"/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">poster_agree</label>
					<div class="controls">
						<input type="text" name="poster_agree" value="<?php echo $row['poster_agree']; ?>"/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">worker_agree</label>
					<div class="controls">
						<input type="text" name="worker_agree" value="<?php echo $row['worker_agree']; ?>"/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">extra_cost</label>
					<div class="controls">
						<input type="text" name="extra_cost" value="<?php echo $row['extra_cost']; ?>"/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">extra_cost_description</label>
					<div class="controls">
						<input type="text" name="extra_cost_description" value="<?php echo $row['extra_cost_description']; ?>"/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">other_cost</label>
					<div class="controls">
						<input type="text" name="other_cost" value="<?php echo $row['other_cost']; ?>"/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">other_cost_description</label>
					<div class="controls">
						<input type="text" name="other_cost_description" value="<?php echo $row['other_cost_description']; ?>"/>
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