<div class="box">
	
	<div class="box-header">
    	<!------CONTROL TABS START------->
		<ul class="nav nav-tabs nav-tabs-left">
			<li class="active"><a href="#jobs" data-toggle="tab"><i class="icon-align-justify"></i> Jobs</a></li>
            <?php if($admin_prem !=3){?>
            <li><a href="#job_comission" data-toggle="tab"><i class="icon-align-justify"></i>Job Comission</a></li>
            <?php }?>
		</ul>
    	<!------CONTROL TABS END------->
	</div>
	
	<div class="box-content padded">
		<div class="tab-content">            
            <!----Jobs list STARTS--->
         	<div class="tab-pane  active" id="jobs">
                <div id="dataTables">
					<table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">
						<thead>
							<tr>
							            <th><div>Job id&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div></th>
                                        <th><div>Posted date</div></th>
                                        <th><div>Status</div></th>
                                        <th><div>Date</div></th>
                                        <th><div>Amount</div></th>
                                        <th><div>Worker id</div></th>
                                        <th><div>Worker Name</div></th>
                                        <th><div>Commission</div></th>
                                        <th>Options</th>
							</tr>
						</thead>
						<tbody>
                     
                           <?php  foreach($rjobs as $jobs):?>
                                	<tr>
                                    	<td><?php echo $jobs['job_id'];?></td>
                                        <td><?php echo $jobs['jposted_date'];?></td>
                                       <?php switch($jobs['jwork_status']) {
											 case '1':
											 echo "<td>New</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td>";
											 break;
											 case '2':
											 $comm = $this->db->query("SELECT * FROM `sitesettings` WHERE `type`='job_comission'")->row()->description;
											 $sam = $jobs['jassign_amt']/100;
											 $sam = $sam *$comm;
											 echo "<td>Assign</td><td>"
											 .$jobs['jassign_date']."</td><td>"
											 .$jobs['jassign_amt']."</td><td>"
											 .$jobs['jassign_to_work_id']."</td><td>"
											 .@ucfirst( $this->db->query("SELECT * FROM users WHERE user_id=".$jobs['jassign_to_work_id'])->row()->full_name).
											 "</td><td>".$sam."</td><td>-</td>";
											 break;	
											 case '3':
											 $comm = $this->db->query("SELECT * FROM `sitesettings` WHERE `type`='job_comission'")->row()->description;
											 $sam = $jobs['jaccept_amt']/100;
											 $sam = $sam *$comm;
											  echo "<td>Accept</td><td>"
											 .$jobs['jaccept_date']."</td><td>"
											 .$jobs['jaccept_amt']."</td><td>"
											 .$jobs['jaccept_workid']."</td><td>"
											 .ucfirst( $this->db->query("SELECT * FROM users WHERE user_id=".$jobs['jaccept_workid'])->row()->full_name)."</td><td>".$sam."</td><td>-</td>";
											 break;
											 case '4':
											  $comm = $this->db->query("SELECT * FROM `sitesettings` WHERE `type`='job_comission'")->row()->description;
											 $sam = $jobs['jaccept_amt']/100;
											 $sam = $sam *$comm;
											 echo "<td>Conform</td><td>"
											 .$jobs['jconformed_date']."</td><td>"
											 .$jobs['jaccept_amt']."</td><td>"
											 .$jobs['jaccept_workid']."</td><td>"
											 .ucfirst( $this->db->query("SELECT * FROM users WHERE user_id=".$jobs['jaccept_workid'])->row()->full_name)."</td><td>".$sam."</td><td>-</td>";
											 break;
											 case '5':
											 echo "<td>Cancel</td><td>"
											 .$jobs['jcancel_date']."</td><td>"
											 .$jobs['jaccept_amt']."</td><td>-</td><td>-</td><td>-</td><td>-</td>";
											 break;
											 case '6':
											  $comm = $this->db->query("SELECT * FROM `sitesettings` WHERE `type`='job_comission'")->row()->description;
											 $sam = $jobs['jcomplete_amt']/100;
											 $sam = $sam *$comm;
											 $amt =$jobs['jcomplete_amt']-$sam;
											 
											 @$output = $this->db->query("SELECT * FROM `invoice` WHERE `job_id`=".$jobs['job_id']." and user_id='".$jobs['jaccept_workid']."'")->row()->status;
											 										
											 if($output!="Completed")
											 {
											 $pay ="<a class='btn btn-default' href='".base_url()."admin/pay_passign_job/".$jobs['job_id']."/".$jobs['jaccept_workid']."/".$amt."'>pay</a>";
											 }else{
											$pay = "Closed";
											 }
											 echo "<td>Completed</td><td>"
											 .$jobs['jcomplete_date']."</td><td>"
											 .$jobs['jcomplete_amt']."</td><td>"
											 .$jobs['jaccept_workid']."</td><td>"
											 .ucfirst( $this->db->query("SELECT * FROM users WHERE user_id=".$jobs['jaccept_workid'])->row()->full_name)."</td><td>".$sam."</td><td>".$pay."</td>";
											 break;
											  case '7':
											  $comm = $this->db->query("SELECT * FROM `sitesettings` WHERE `type`='job_comission'")->row()->description;
											 $sam = $jobs['jaccept_amt']/100;
											 $sam = $sam *$comm;
											 echo "<td>InCompleted</td><td>"
											 .$jobs['jaccept_date']."</td><td>"
											 .$jobs['jaccept_amt']."</td><td>"
											 .$jobs['jaccept_workid']."</td><td>"
											 .ucfirst( $this->db->query("SELECT * FROM users WHERE user_id=".$jobs['jaccept_workid'])->row()->full_name)."</td><td>".$sam."</td><td>-</td>";
											 break;
										
											 
											 
										}?>
                                    </tr>
                                    <?php endforeach; ?>
                   
						</tbody>
					</table>
                </div>
			</div>
            <!----Jobs list ENDS--->
            
            <div class="tab-pane box" id="job_comission" style="padding: 5px">
                <div class="box-content">                	
                    <form method="post" action="<?php echo base_url();?>admin/jobs/job_comission/" class="form-horizontal validatable" enctype="multipart/form-data">
                        <div class="padded">
                            
							<div class="control-group">
                                <label class="control-label">Job Comission in percentage</label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="job_comission" 
                                    value="<?php 
									echo $this->db->query("SELECT * FROM sitesettings WHERE type='job_comission'")->row()->description;
									
									?>"
                                    /> %
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
