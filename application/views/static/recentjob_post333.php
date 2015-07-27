
	<div id="content" class="container">
		<h2>Recent Posted Jobs</h2>
        <div class="row">
             <div id="dataTables">
                            <table cellpadding="0" cellspacing="0" border="2" class="dTable responsive" align="center" width="800px" >
                                <thead>
                                    <tr>
                                        <th><div>Poster Date</div></th>
                                        <th><div>Job Name</div></th>
                                        <th><div>Bill By</div></th>
                                        <th><div>Bidding</div></th>
                                        <th><div>Options</div></th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                 <?php  foreach($recent_jobs as $jobs):?>
                                	<tr>
                                    	<td><?php echo $jobs['jposted_date'];?></td>
                                    	<td><?php echo $jobs['jname'];?></td><td>
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
                                      <td>
									   <?php 
									
										switch ($jobs['jbidding_type'])
										{
											case '1':
											$status ='Yes';
											break;
											case '2':
											$status ='No';
											break;
											
										}
										echo $status;?>
									 </td>
                                     <td>
                                        <?php if(empty($jobs['jaccept_workid'])) {?>
                                      <a href="<?php echo base_url();?>home/pjob_bids/<?php echo $jobs['job_id'];?>">no. Bids</a> - 
                                       <a href="<?php echo base_url();?>home/pjob_bids/<?php echo $jobs['job_id'];?>" onclick="return confirm('Are you sure?');">Cancel</a> 
                                       <?php } else {echo "Closed";}?>
                                                                             
                                     </td>
                                    </tr>
                                  <?php endforeach; ?>
                                </tbody>
                                </table>
        </div>
	</div><!-- /.container -->