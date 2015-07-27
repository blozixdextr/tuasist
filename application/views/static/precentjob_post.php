<div id="content" class="container">
	
		<div class="col-xs-10 col-xs-offset-1 task-form-container whiteContainer">
			<h2>Recent Jobs</h2>
			<div class="col-xs-12">
				<?php 
				if(empty($recent_jobs)){
			echo "<center>";
			echo "<h1>No Jobs Found</h1>";
			echo "</center>";				
		}?>
				
				
			<?php  foreach($recent_jobs as $jobs):?>
            <?php if($jobs['jbidding_type'] !=2){?>
            <div class="jobEntry">
					<h4><a href="<?php echo base_url();?>home/pjob_view/<?php echo $jobs['job_id']; ?>"><?php echo $jobs['jname'];?></a></h4>
					<div class="jobOptions">
                     <?php 
					 	if(empty($jobs['jaccept_workid'])) {
						  		if(!empty($jobs['jassign_to_work_id'])) {
									echo "<a href='". base_url()."home/passigned_jobs/".$jobs['job_id']."'><i class='fa fa-gavel'></i>View</a>";
								}else {
									echo "<a href='". base_url()."home/pjob_bids/".$jobs['job_id']."'><i class='fa fa-gavel'></i> Number of Bids</a>";
								}
								//echo "<a href='". base_url()."home/pjob_cancel/".$jobs['job_id']."' onclick=\"return confirm('Are you sure?');\"><i class='fa fa-gavel'></i>Cancel</a>";
						  }else {echo "Closed";}
					 ?>					
					</div>
					<ul class="secondaryInfo">
						<li title="Posted Date"><i class="fa fa-calendar"></i> <?php echo $jobs['jposted_date'];?></li>
						<li title="Bill by"><i class="hourGlass"></i>   <?php 									
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
						<li title="Bidding"><i class="fa fa-gavel"></i>  <?php 
									switch ($jobs['jbidding_type'])
										{
											case '1':
											$status ='Bidding';
											break;
											case '2':
											$status ='Direct';
											break;
											case '3':
											$status ='First Bid';
											break;
											
										}
										echo $status;?></li>
					</ul>
				</div>
                                        
                                    
                                  <?php }endforeach; ?>
				
				
				
				
				
				
				

			</div>

		</div>
	</div>