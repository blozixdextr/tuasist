
	<div id="content" class="container coloredTiles">
		<h2>What kind of job want to work?</h2>
		<form action="<?php echo base_url();?>home/search" method="post">
			<input type="text" name="search" />
		  	<button id="search_submit" style="display: none;" type="submit"></button>
		</form>
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-10">
				<div class="row">
					<a href="<?php echo base_url();?>home/view_map" class="contentBlock">
						<div class="col-md-3">
						  <img src="<?php echo base_url();?>template/images/GoogleMaps2.png" width="74px" height = "74px">
						  <h3>Virtual Jobs</h3>
						</div>
					</a>
					<a href="<?php echo base_url();?>home/wselect_categories/1" class="contentBlock">
						<div class="col-md-3">
						  <img src="<?php echo base_url();?>template/image/virtual_icon.png">
						  <h3>Virtual Jobs</h3>
						</div>
					</a>
					<a href="<?php echo base_url();?>home/wselect_categories/2" class="contentBlock coloredBlock">
						<div class="col-md-3">
							<img src="<?php echo base_url();?>template/image/inperson_icon.png">
							<h3>In Person Jobs</h3>
						</div>
					</a>
					<a href="<?php echo base_url();?>home/wselect_categories/3" class="contentBlock">
						<div class="col-md-3">
							<img src="<?php echo base_url();?>template/image/delivery_icon.png">
							<h3>Delivery Jobs</h3>
						</div>
					</a>
				</div>
			</div>
			<div class="col-md-1"></div>
		</div>
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-10">
				<div class="row">
                <a href="<?php echo base_url();?>home/wrecent_jobs" class="contentBlock coloredBlock">
						<div class="col-md-4">
							<img src="<?php echo base_url();?>template/image/choose_job_icon.png">
							<h3>Choose New Jobs</h3>
						</div>
					</a>
                    <a href="<?php echo base_url();?>home/wjob_assigned" class="contentBlock">
						<div class="col-md-4">
							<img src="<?php echo base_url();?>template/image/direct_assign_icon.png">
							<h3>Assigned jobs</h3>
						</div>
					</a>
					<a href="<?php echo base_url();?>home/wconfirm_towork" class="contentBlock coloredBlock">
						<div class="col-md-4">
							<img src="<?php echo base_url();?>template/image/assign_icon.png">
							<h3>Confirm to Work</h3>
						</div>
					</a>
				</div>
			</div>
			<div class="col-md-1"></div>
		</div>
	</div>