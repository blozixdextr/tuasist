<div id="content" class="container">
	
		<div class="col-xs-10 col-xs-offset-1 task-form-container whiteContainer">
        <h2>Job Reassign</h2>
        <?php  foreach($job_view as $jobs):?>
			 <div class="jobEntry">
					<h4><a href="#"><?php echo $jobs['jname'];?></a></h4>
                    <ul class="secondaryInfo">
						<li title="Bill by"><i class="hourGlass"></i>  <?php 									
										switch ($jobs['jbilling_by'])
										{
											case '1':
											$status =$jobs['jbilling_no_hours'].' Hour Based';
											$price =$jobs['jbilling_no_hours']*$jobs['jposter_price'];
											break;
											case '2':
											$status =$jobs['jbilling_no_days'].' Day Based';
											$price =$jobs['jbilling_no_days']*$jobs['jposter_price'];
											break;
											
										}
										echo $status;?></li>
						<li title="Price"><i class="fa fa-dollar"></i> <?php echo $price; ?></li>
						
					</ul>
               </div>
              
				<?php echo form_open(base_url().'home/pjob_reassign/job_reassign/'.$jobs['job_id'].'/', array('class' => 'col-xs-12'));?>
                <?php endforeach; ?>  		
		  <h4>How to make the bid?</h4>
				<div class="priceName">
					<div id="quickAssign" class="radio_button">
						<input id="openBid" name="jbidding_type" type="radio" value="1">
						<label for="openBid">
							<b>Open Bidding</b>
							<p>Bidding open to all JobRabbit on a period of time.</p>
							<p class="dateRange">
								<b>
                          <em>Start Date <input type="text" class="form-control" value="" id="dpd1" data-date-format="yyyy-mm-dd" name="jbidding_st_date"></em>
                            <em>End Date <input type="text" class="form-control" value="" id="dpd2" data-date-format="yyyy-mm-dd" name="jbidding_ed_date"></em>
								</b>
							</p>
						</label>
					</div>

					<div class="radio_button ">
						<input id="forUser" name="jbidding_type" type="radio" value="2">
						<label for="forUser">
							<b>Assign to JobRabbit</b>
							<p>Search for an individual JobRabbit and assign the job.</p>
							<p class="searchWorker"><b><input type="text" class="form-control" value="" placeholder="Enter JobRabbit ID" name="jassign_to_work_id"></p>
						</label>
					</div>

					<div class="radio_button ">
						<input id="forBids" name="jbidding_type" type="radio" value="3">
						<label for="forBids">
							<b>Who bid first.</b>
							<p>Assign to the JobRabbit who bids first.</p>
						</label>
					</div>
				</div>

				<input class="btn btn-orange pull-right margt15" type="submit" value="Reassign">
				<div class="clearfix"></div>

			</form>

		</div>
	</div>