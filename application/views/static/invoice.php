<div id="content" class="container">
	
		<div class="col-xs-10 col-xs-offset-1 task-form-container whiteContainer">
		
			<div class="col-xs-12">
				      <div class="jobEntry">
					<h4><a href="#">Transaction History</a></h4>
                    		 <table class="table table-condensed"  >
                                <thead>
                                    <tr>
                                        <th><div>Invoice id</div></th>
                                        <th><div>Job id</div></th>
                                        <th><div>Job Name</div></th>
                                        <th><div>Transaction id</div></th>
                                        <th><div>Date</div></th>
                                        <th><div>Status</div></th>
                                        <th><div>Amount</div></th>                                  
                                    </tr>
                                </thead>
                                <tbody>
                                
                                 <?php  foreach($recent_invoice as $jobs):?>
                                	<tr>
                                    	<td><?php echo $jobs['invoice_id'];?></td>
                                    	<td><?php echo $jobs['job_id'];?></td>
                                        <td><?php echo $jobs['job_name'];?></td>
                                    	<td><?php echo $jobs['transaction_id'];?></td>
                                        <td><?php echo $jobs['payment_timestamp'];?></td>
                                    	<td><?php echo $jobs['status'];?></td>
                                        <td><?php echo $jobs['amount'];?></td>
                                     
                                    </tr>
                                  <?php endforeach; ?>
                                </tbody>
                                </table>
                    
                    </div>
				</div>
		

			</div>

		</div>
	</div>
