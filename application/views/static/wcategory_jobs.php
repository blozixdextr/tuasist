<div id="content" class="container">
	
		<div class="col-xs-10 col-xs-offset-1 task-form-container whiteContainer">
			<h2>Jobs</h2>
				<div class="col-xs-12">
			<?php 
				if(empty($recent_jobs)){
			echo "<center>";
			echo "<h1>No Jobs Found</h1>";
			echo "</center>";				
		}?>
				
				
	<?php  foreach($recent_jobs as $jobs):?>
	<?php 		
		$currentDate =date("Y-m-d");
		//echo $currentDate ="2014-07-14";echo "<br/>";
		$startDate=$jobs['jbidding_st_date'];
		$endDate=$jobs['jbidding_ed_date'];
    ?>
      <?php if(($jobs['jbidding_type']=='1' AND $jobs['jbidding_ed_date']!=date("Y-m-d"))){?>
			<div class="jobEntry">
					<h4><a href="#"><?php echo $jobs['jname']."<small> (Closing - ".$endDate.")</small>";?></a></h4>
					<div class="jobOptions">
                      <?php if(empty($jobs['jaccept_workid'])) {?>
                                        <a href="<?php echo base_url();?>home/wjob_view/<?php echo $jobs['job_id']; ?>">View</a> 
                                        <a href="<?php echo base_url();?>home/wjob_bid/<?php echo $jobs['job_id']; ?>"><i class="fa fa-gavel"></i> bid</a> 
                                       <?php } else {echo "Closed";}?>  				
					</div>
                    <ul class="secondaryInfo">
						<li title="Posted Date"><i class="fa fa-calendar"></i> <?php echo $jobs['jposted_date'];?></li>
						<li title="Bill by">
							<?php 									
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
										echo $status;?>
						</li>
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
              <?php }elseif($jobs['jbidding_type']=='3'){?>
               <div class="jobEntry">
					<h4><a href="#"><?php echo $jobs['jname'];?></a></h4>
					<div class="jobOptions">
                      <?php if(empty($jobs['jaccept_workid'])) {?>
                                        <a href="<?php echo base_url();?>home/wjob_view/<?php echo $jobs['job_id']; ?>">View</a> 
                                        <a href="<?php echo base_url();?>home/wjob_bid/<?php echo $jobs['job_id']; ?>"><i class="fa fa-gavel"></i> bid</a> 
                                       <?php } else {echo "Closed";}?>  				
					</div>
                    <ul class="secondaryInfo">
						<li title="Posted Date"><i class="fa fa-calendar"></i> <?php echo $jobs['jposted_date'];?></li>
						<li title="Bill by">  <?php 									
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
            <?php }		
			endforeach; 			
			?>            
			</div>

		</div>
	</div>