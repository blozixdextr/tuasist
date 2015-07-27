<div class="box">
    
    <div class="box-content padded">
		<div class="tab-content">
            <div class="tab-pane  active" id="list">
				<div class="box">
					<div class="box-content">
						<div id="dataTables">
						<table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">
							<thead>
								<tr>
									<th><div>ID &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div></th>
                                    <th><div>Vendor Name</div></th>
                                    <th><div>Vendor Emailid</div></th>
                                    <th>Vendor Type</th>
                                    <th>Total orders</th>
                                    <th>Total Amount</th>
                                    <th>Refunded</th>
                                    <th>Commission to u</th>
                                    <th>Amt to vendor</th>
                                    <th>Paid</th>
                                    <th>Balance</th>
								</tr>
							</thead>
							<tbody>
                            <?php foreach($users as $user):?>
                            	<tr>
                                <td><?php echo $user['user_id'];?></td>
                             	<td><?php echo $user['full_name'];?></td>
                                <td><?php echo $user['emailid'];?></td>
                                <td><?php if($user['user_type']==2){echo "Poster";}elseif($user['user_type']==1){echo "Worker";}?></td>
                                <td>
                                    <?php
                                    $this->db->where("jposter_id = ".$user['user_id']);
                                    $this->db->from('jobs');
                                    echo $this->db->count_all_results();
                                    ?>
                                </td>
                             	<td>
                                <?php
								$tot_amt = $this->db->get_where('jobs', array('jposter_id' =>$user['user_id']))->result_array();
								$tamt="";
								foreach($tot_amt as $to_amt){
								$price="";
								   if($to_amt['jbilling_by']==1){
										$price= $to_amt['jposter_price']*$to_amt['jbilling_no_hours'] ;
								   }elseif($to_amt['jbilling_by']==2){
										$price=$to_amt['jposter_price']*$to_amt['jbilling_no_days'];
								   }
								$tamt +=$price;
								}
								echo $tamt;							
                                ?>
                                
                                </td>
                                <td></td>
                                <td>
								<?php 
								$comm = $this->db->query("SELECT * FROM `sitesettings` WHERE `type`='job_comission'")->row()->description;
								
									$sam = $tamt/100;
									echo $sam = round($sam *$comm);	
								?>
                                </td>
                                <td></td>
                             	<td></td>
                                <td></td>
                                                           
                                </tr>
                            <?php endforeach;?>
                            
                           </tbody>
						</table>
						</div>
					</div>
				</div>
			</div>
</div>