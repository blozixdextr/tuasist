<div class="box">
	<div class="box-header">
		<ul class="nav nav-tabs nav-tabs-left">
			<li class="active"><a href="#list" data-toggle="tab"><i class="icon-align-justify"></i> Transaction List</a></li>
            <li><a href="#poster_commission" data-toggle="tab"><i class="icon-align-justify"></i> Poster Commission Tracking</a></li>
            <li><a href="#worker_commission" data-toggle="tab"><i class="icon-align-justify"></i> Worker Commission Tracking</a></li>
			<li><a href="#add" data-toggle="tab"><i class="icon-plus"></i> Paypal Settings</a></li>
		</ul>
	</div>
    
    <div class="box-content padded">
		<div class="tab-content">
			 <div class="tab-pane  active" id="list">
             		<div class="box-content">
						<div id="dataTables">
						<table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">
							<thead>
								<tr>
									<th><div>ID &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div></th>
                                    <th><div>Date</div></th>
                                    <th><div>User id</div></th>
									<th><div>Job id</div></th>
                                    <th>Transaction No</th>
									<th><div>Amount</div></th>
									<th>Payment Method</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
                            <?php foreach($transaction as $trans):?>
                            	<tr>
                                <td><?php echo $trans['invoice_id'];?></td>
                                <td><?php echo $reversed = date('Y-m-d', strtotime($trans['payment_timestamp']));?></td>
                           		<td><?php echo $trans['user_id'];?></td>
                                <td><?php echo $trans['job_id'];?></td>
                                <td><?php echo $trans['transaction_id'];?></td>
                                <td><?php echo $trans['amount'];?></td>
                                <td><?php echo $trans['payment_method'];?></td>
                                <td><?php echo $trans['status'];?></td>
                                </tr>
                            <?php endforeach;?>
                            
                           </tbody>
						</table>
						</div>
					</div>
             </div>
             
             <div class="tab-pane box" id="poster_commission" style="padding: 5px">
             		<div class="box-content">
						<div id="dataTables">
						<table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">
							<thead>
								<tr>
									<th><div>ID &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div></th>
                                    <th><div>Poster Name</div></th>
                                    <th><div>Poster Emailid</div></th>
                                    <th>Total Jobs</th>
                                    <th>Total Amount</th>
                                    <th>Commission to you</th>
                                    <th>Amt to Worker</th>
                                    <th>Paid</th>
								</tr>
							</thead>
							<tbody>
                              <?php foreach($users as $user):?>
                             <?php if($user['user_type']==2){?>
                            	<tr>
                                <td><?php echo $user['user_id'];?></td>
                             	<td><?php echo $user['full_name'];?></td>
                                <td><?php echo $user['emailid'];?></td>
                                
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
                                 <td>
								<?php 
								$comm = $this->db->query("SELECT * FROM `sitesettings` WHERE `type`='job_comission'")->row()->description;
								
									$sam = $tamt/100;
									echo $sam = round($sam *$comm);	
								?>
                                </td>
                                <td>
                                <?php echo $tamt-$sam;?>
                                </td>
                                <td>
                                <?php echo $tamt;?>
                                </td>
                                
                                </tr>
                            <?php } 
							endforeach;?>
                            
                           </tbody>
						</table>
						</div>
					</div>
             </div>
             
             <div class="tab-pane box" id="worker_commission" style="padding: 5px">
           			<div class="box-content">
						<div id="dataTables">
						<table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">
							<thead>
								<tr>
									<th><div>ID &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div></th>
                                    <th><div>Worker Name</div></th>
                                    <th><div>Worker Emailid</div></th>
                                    <th>Completed Jobs</th>
                                    <th>Total Amt</th>
                                     <th>Commission to you</th>
                                    <th>Paid</th>
								</tr>
							</thead>
							<tbody>
                             <?php foreach($users as $user):?>
                             <?php if($user['user_type']==1){?>
                            	<tr>
                                <td><?php echo $user['user_id'];?></td>
                             	<td><?php echo $user['full_name'];?></td>
                                <td><?php echo $user['emailid'];?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                </tr>
                            <?php } 
							endforeach;?>
                            
                           </tbody>
						</table>
						</div>
					</div>
             </div>
             
             <div class="tab-pane box" id="add" style="padding: 5px">
             		<div class="box-content">                	
                    <form method="post" action="<?php echo base_url();?>admin/payment/paypal_setting/" class="form-horizontal validatable" enctype="multipart/form-data">
                        <div class="padded">
                            
							<div class="control-group">
                                <label class="control-label">Paypal EmailId</label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="paypal_emailid" value="<?php echo $this->db->query("SELECT * FROM sitesettings WHERE type='paypal_emailid'")->row()->description;?>"/>
                                </div>
                            </div>
                            
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-gray">Save</button>
                        </div>
                    </form>                
                </div>
             </div>

		</div>
     </div>