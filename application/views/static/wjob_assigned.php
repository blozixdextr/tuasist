<div id="content" class="container">
	
		<div class="col-xs-10 col-xs-offset-1 task-form-container whiteContainer">
		
			<div class="col-xs-12">
				      <div class="jobEntry">
					<h4><a href="#">Assign to jobs</a></h4>
                    		 <table class="table table-condensed"  >
                            <thead>
                                    <tr>
                                        <th><div>Posted Date</div></th>
                                        <th><div>Job id</div></th>
                                        <th><div>Job Name</div></th>
                                        <th><div>Assign date</div></th>
                                        <th><div>Billing By</div></th>
                                        <th><div>Avg Amt</div></th>
                                        <th><div>Bid Amt</div></th>                                        
                                        <th><div>Options</div></th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                 <?php 
								// print_r($recent_jobs);
								  foreach($recent_jobs as $jobs):
								  
								 ?>
                                	
                                    <tr>
                                    	<td><?php echo $jobs['jposted_date'];?></td>
                                        <td><?php echo $jobs['job_id'];?></td>
                                    	<td><?php echo $jobs['jname'];?></td>
                                       <td><?php echo $jobs['jassign_date'];?></td>
                                        <td>
									   <?php 
									
										switch ($jobs['jbilling_by'])
										{
											case '1':
											$status =$jobs['jbilling_no_hours']." Hours";
											break;
											case '2':
											$status =$jobs['jbilling_no_days']." Days";
											break;
											
										}
										echo $status;?>
									 </td>
                                      <td>
									   		<?php 
											switch ($jobs['jbidding_type'])
											{
												case '1':
														switch ($jobs['jbilling_by'])
													{
												case '1':
												echo $jobs['jbilling_no_hours'] * $jobs['jposter_price'] ;
												break;
												case '2':
												echo $jobs['jbilling_no_days'] * $jobs['jposter_price'] ;
												break;
													}		
												break;
												case '2':
												echo '0';
												break;
												case '3':
												echo '0';
												break;
											}
											
																			   
									   		?>
                                       </td>
                                        <td><?php echo $jobs['jassign_amt'];?></td>
                                     <td>
                                     	<a href="<?php echo base_url();?>home/job_accept/<?php echo $jobs['job_id']; ?>/1/<?php echo $jobs['jassign_amt'];?>">Accept</a> /
                                        <a href="<?php echo base_url();?>home/job_accept/<?php echo $jobs['job_id']; ?>/2">Reject</a>
                                     </td>
                                    </tr>
                                  <?php 
								  endforeach; ?>
                                </tbody>
                                </table>
                    
                    </div>
				</div>
		

			</div>

		</div>
	</div>
