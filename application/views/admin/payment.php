<div class="box">
	<div class="box-header">
		<ul class="nav nav-tabs nav-tabs-left">
			<li class="active"><a href="#list" data-toggle="tab"><i class="icon-align-justify"></i> Transaction List</a></li>
            <li><a href="#poster_commission" data-toggle="tab"><i class="icon-align-justify"></i> Commission Tracking</a></li>
            <?php if($admin_prem ==1){?>
			<li><a href="#add" data-toggle="tab"><i class="icon-plus"></i> Paypal Settings</a></li>
            <?php }?>
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
									<th><div>Worker id &nbsp; </div></th>
                                    <th><div>Worker Name </div></th>
                                    <th><div>Worker Emailid </div></th>
                                    <th>Complete Jobs</th>
                                    <th>Total Amount</th>
                                    <th>Commission to you</th>
                                    <th>Amt to Worker</th>
								</tr>
							</thead>
							<tbody>
                              <?php foreach($users as $user):?>
                             <?php if($user['user_type']==1){?>
                            	<tr>
                                <td><?php echo $user['user_id'];?></td>
                             	<td><?php echo $user['full_name'];?></td>
                                <td><?php echo $user['emailid'];?></td>
                                
                                 <td>
                                    <?php
                                    $this->db->where("jaccept_workid = ".$user['user_id']);
                                    $this->db->from('jobs');
                                    echo $this->db->count_all_results();
                                    ?>
                                </td>
                                <td>
                                <?php
								$tot_amt = $this->db->get_where('jobs', array('jaccept_workid' =>$user['user_id']))->result_array();
								$tamt="";
								foreach($tot_amt as $to_amt){
									$price= $to_amt['jaccept_amt'];
									$tamt +=$price;
								}
								echo $tamt;							
                                ?>
                                
                                </td>
                                 <td>
								<?php 
								$comm = $this->db->query("SELECT * FROM `sitesettings` WHERE `type`='job_comission'")->row()->description;
								
									$sam = $tamt/100;
									echo $sam = $sam *$comm;	
								?>
                                </td>
                                <td>
                                <?php echo $tamt-$sam;?>
                                </td>
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