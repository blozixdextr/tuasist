<div id="content" class="container">
	
		<div class="col-xs-10 col-xs-offset-1 task-form-container whiteContainer">
		
			<div class="col-xs-12">
				      <div class="jobEntry">
					<h4><a href="#">Confirm to Work</a></h4>
                    		 <table class="table table-condensed"  >
                            <thead>
                                    <tr>
                                        <th><div>Posted Date</div></th>
                                        <th><div>Job id</div></th>
                                        <th><div>Job Name</div></th>
                                        <th><div>confirm date</div></th>
                                        <th><div>Bidding Type</div></th>
                                        <th><div>Accept Amount</div></th>
                                        <th><div>No of</div></th>
                                        <th><div>Total Amount</div></th>                                        
                                    </tr>
                                </thead>
                                <tbody>
                                
                                 <?php  foreach($recent_jobs as $jobs):
								  if(!empty($jobs['jaccept_amt'])){
								 ?>
                                	
                                    <tr>
                                    	<td><?php echo $jobs['jposted_date'];?></td>
                                        <td><?php echo $jobs['job_id'];?></td>
                                    	<td><?php echo $jobs['jname'];?></td>
                                       <td><?php echo $jobs['jconformed_date'];?></td>
                                        <td>
									   <?php 
									
										switch ($jobs['jbilling_by'])
										{
											case '1':
											$status ='Hour Based';
											break;
											case '2':
											$status ='Day Based';
											break;
											
										}
										echo $status;?>
									 </td>
                                      <td><?php echo $jobs['jaccept_amt'];?></td>
                                       <td>
									   		<?php 
												switch ($jobs['jbilling_by'])
											{
												case '1':
												echo $jobs['jbilling_no_hours']." Hours";
												break;
												case '2':
												echo $jobs['jbilling_no_days']." Days";
												break;
												
											}									   
									   		?>
                                       </td>
                                        <td><?php echo $jobs['jaccept_amt'];?></td>
                                     
                                    </tr>
                                  <?php }
								  endforeach; ?>
                                </tbody>
                                </table>
                    
                    </div>
				</div>
		

			</div>

		</div>
	</div>
