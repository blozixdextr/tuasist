<div id="content" class="container">
	
		<div class="col-xs-10 col-xs-offset-1 task-form-container whiteContainer">
		
			<div class="col-xs-12">
            
				  <?php
				 	$id="";
					$assign_id ="";
					$job_reject ="";
					foreach($job_view as $jobs):
					$id=$jobs['job_id'];
					$assign_id =$jobs['jassign_to_work_id'];
					$job_reject =$jobs['jwork_status'];
                  ?>
				      <div class="jobEntry">
					<h4><a href="#"><?php echo $jobs['jname'];?></a></h4>
					<div align="right">
                        <ul class="secondaryInfo">
                            <li title="Posted Date">Posted <i class="fa fa-calendar"></i> <?php echo $jobs['jposted_date'];?></li>
                            <li title="Bill by"><i class="hourGlass"></i> <?php 									
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
                     <?php endforeach; ?>
                     
					
                    
                    		 <table class="table table-condensed"  >
                                <thead >
                                    <tr>
                                        <th><div>Worker ID</div></th>
                                        <th><div>Worker Name</div></th>
                                        <th><div>Bid Date</div></th>
                                        <th><div>Bid Amount</div></th>
                                        <th><div>Commands</div></th>
                                        <th><div>Options</div></th>
                                    </tr>
                                </thead>
                                <tbody>
                                 <?php
								 $this->db->order_by('bid_amt desc'); 
								 $bids=$this->db->get_where('job_bids', array('job_id' => $id))->result_array();


								   foreach($bids as $bid):?>
                                	<tr>
                                    	<td ><?php echo $bid['userid'];?></td>
                                         <td>
										 <?php
											$output = $this->db->query("SELECT * FROM users WHERE user_id=".$bid['userid'])->row()->full_name;
											echo ucfirst($output);
									     ?>
										</td>
                                    	<td><?php echo $bid['biding_dt'];?></td>
                                        <td><?php echo $bid['bid_amt'];?></td>
                                        <td><?php echo $bid['bid_commands'];?></td>
                                         <td>
                                         
                    <?php if($assign_id!= $bid['userid'] && $job_reject !='8' ){?>
                                      
                                            <a href="<?php echo base_url();?>home/pprofile_view/<?php echo $bid['userid'];?>">View profile</a> -
                                            <a href="<?php echo base_url();?>home/pjob_assign/<?php echo $jobs['job_id'];?>/<?php echo $bid['userid'];?>/<?php echo $bid['bid_amt']; ?>/" onclick="return confirm('Are you sure to Assign?');">Assign</a> 
                                         </td>
                                    </tr>
                                  <?php }else {
									  //echo "<span style=\"color:Red\">Rejected</span>";
								  } 
								  endforeach; ?>
								  <?php 
								  if(!$bids){
										echo "<tr><tdcolspan='6'><center>No record found</center></td></tr>";
									}
									?>
                                </tbody>
                                </table>
                    
                    </div>
				</div>
		

			</div>

		</div>
	</div>

