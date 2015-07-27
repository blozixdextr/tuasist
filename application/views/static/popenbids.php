<link rel="stylesheet" type="text/css" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css">
 <script src="<?php echo base_url();?>template/js/nicEdit.js" type="text/javascript"></script>
<script type="text/javascript">
bkLib.onDomLoaded(function() {
	new nicEditor({fullPanel : true}).panelInstance('area2');
});
</script>
<link rel="stylesheet" type="text/css" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css">
<style type="text/css">
	#DataTables_Table_0_filter {
		width: 500px;
		float: left;
	}
	.table-header {
		width: 100%;
		display: inline-block;
		margin-bottom: 20px;
	}
	.table-header .dataTables_length {
		float: right;
	}
	#DataTables_Table_0_length label .selector {
		display: none !important;
	}
	.dataTables_filter input[type='text'] {
		border: 1px solid #CCC;
		border-radius: 3px;
		padding: 3px 6px;
	}
	table.dataTable {
		width: 100%;
	}
	thead tr th div {
		text-align: center;
		font-weight: normal;
		padding: 8px;
		border-bottom: 1px solid #EAEBEF;
		border-top: 1px solid #EAEBEF;
		cursor: pointer;
	}
	table tr td {
		padding: 8px;
		border-bottom: 1px solid #EAEBEF;
	}
	table tbody tr:nth-child(even) {
		background: #F3F4F8;
	}
	table tbody tr td, thead tr th div {
		border-left: 1px solid #EAEBEF;
	}
	table tbody tr td:first-child, thead tr th:first-child div {
		border-left: none;
	}
	.sorting>div:after {
		font-family: 'FontAwesome';
		color: #666666;
		margin-left: 5px;
		content: "\f0dc";
	}
	.sorting_asc>div:after {
		font-family: 'FontAwesome';
		color: #666666;
		margin-left: 5px;
		content: "\f0de";
		top: 4px;
		position: relative;	
	}
	.sorting_desc>div:after {
		font-family: 'FontAwesome';
		color: #666666;
		margin-left: 5px;
		content: "\f0dd";
		top: -4px;
		position: relative;	
	}
	.table-footer {
		margin-top: 20px;
	}

	.table-footer .dataTables_info {
		width: 400px;
		float: left;
	}
	.table-footer .dataTables_paginate {
		float: right;
	}
	.paginate_button, .paginate_active {
		padding: 3px 8px;
		background: #EAEDF1;
		cursor: pointer;
		margin-left: 3px;
		color: #686868 !important;
		text-decoration: none !important;
		border-radius: 3px;
		border: 1px solid #EAEDF1;
	}
	.paginate_active {
		background: none;
	}
	.paginate_button_disabled, .paginate_button_disabled:hover {
		cursor: default;
		background: #eee !important;
		color: #c5c5c5 !important;
	}
	.paginate_button:hover {
		background-color: #eaeaea;
	}
</style>
<div id="content" class="container">
	
		<div class="col-xs-10 col-xs-offset-1 task-form-container whiteContainer">
			<h2>Open Bids</h2>
			<div class="col-xs-12">
        <div id="dataTables">
					<table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">
                                <thead >
                                   <tr>
                                        <th><div>Job id</div></th>
                                        <th><div>Job Name</div></th>
                                        <th><div>Posted date</div></th>
                                        <th><div>Bidding start - End date</div></th>
                                        <th><div>Status</div></th>
                                        <!--
<th><div>Date</div></th>
                                        <th><div>Amount</div></th>
-->
                                       
                                        <th><div>Worker Name</div></th>
                                        <th><div>Options</div></th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php  foreach($recent_jobs as $jobs):?>
                                	<tr>
                                    	<td style="text-align: center;"><?php echo $jobs['job_id'];?></td>
                                        <td><a class="various" style="cursor: pointer; display: block;" href="#job_id_<?php echo $jobs['job_id'];?>"><?php echo $this->db->query("SELECT * FROM jobs WHERE job_id=".$jobs['job_id'])->row()->jname;?></a></td>
                                        
                                        <td><?php echo $jobs['jposted_date'];?></td>
                                        <td><?php echo $jobs['jbidding_st_date'].' to '.$jobs['jbidding_ed_date'];?></td>
                                        <?php switch($jobs['jwork_status']) {
											 case '1':
											 echo "<td>New</td><td>-</td><td><a href='". base_url()."home/pjob_bids/".$jobs['job_id']."'>View all Bids</a> - <a href='".base_url()."home/pjob_cancel/".$jobs['job_id']."' onclick=\"return confirm('Are you sure?');\">Cancel</a></td>";
											 break;
											 case '2':
											 echo "<td>Assign</td><td>"
											 /*
.$jobs['jassign_date']."</td><td>"
											 .$jobs['jassign_amt']."</td><td>"
*/
											 .ucfirst( $this->db->query("SELECT * FROM users WHERE user_id=".$jobs['jassign_to_work_id'])->row()->full_name)."</td><td>-</td>";
											 break;	
											 case '3':
											 echo "<td>Accept</td><td>"
											 /*
.$jobs['jaccept_date']."</td><td>"
											 .$jobs['jaccept_amt']."</td>"
*/
											 .ucfirst( $this->db->query("SELECT * FROM users WHERE user_id=".$jobs['jaccept_workid'])->row()->full_name)."</td><td><a href='".base_url()."home/pjob_conform/".$jobs['job_id']."/".$jobs['jassign_amt']."'onclick=\"return confirm('Are you sure to Confirm?');\">Confirm</a></td>";
											 break;										 
											case '4':
											 echo "<td>Confirm</td><td>"
											 /*
.$jobs['jconformed_date']."</td><td>"
											 .$jobs['jaccept_amt']."</td>"
*/
											 .ucfirst( $this->db->query("SELECT * FROM users WHERE user_id=".$jobs['jaccept_workid'])->row()->full_name)."</td><td><a href='".base_url()."home/pjob_completed/".$jobs['job_id']."'>Complete</a></td>";
											 break;	
											 
											 case '8':
											 echo "<td><span style=\"color:Red\">Rejected</span> </td><td>-</td><td><a href='". base_url()."home/reassign/".$jobs['job_id']."'>Reassign</a></td>";
											 break;
										}?>
                                    </tr>
                                    
									<!-- <div style="display: none;" id="job_id_<?php echo $jobs['job_id'];?>"><?php echo $this->db->query("SELECT * FROM jobs WHERE job_id=".$jobs['job_id'])->row()->jdescription;?></div>-->
                                    <?php endforeach; ?>
                                </tbody>
            </table>
          
             <?php  foreach($recent_jobs as $jobs):?>
				<div style="display:none;" id="job_id_<?php echo $jobs['job_id'];?>" class="fancyboxContent">
					<h5>Job Description</h5>
					<form style="padding: 10px; text-align: center;" action="<?php echo base_url().'home/job_update';?>" method="post" >
                 
                    		<input type="hidden" name="job_id" value="<?php echo $jobs['job_id'];?>"/>
					      <textarea rows="8" cols="50" class="form-control" id="area2" style="text-align: left;padding: 10px;border-radius: 0;" placeholder="Text input" name="jdescription"><?php echo $this->db->query("SELECT * FROM jobs WHERE job_id=".$jobs['job_id'])->row()->jdescription;?></textarea>
					      <input style="padding: 5px 10px; border-radius: 0; margin-top:10px; background: #ff7b54; color: #FFF;" class="btn" type="submit" value="Update" />
					</form>
					<!-- <form style="padding: 10px; text-align: center;" action="#" method="post">
						<textarea style="width:100%; text-align: left;"><?php echo $this->db->query("SELECT * FROM jobs WHERE job_id=".$jobs['job_id'])->row()->jdescription;?></textarea>
						<input type="submit" value="Update"/>
					</form> -->
				</div>
             <?php endforeach; ?>
			</div>
			</div>
  <center>click the job name want to edit the details</center>
		</div>
	</div>

	<script>
	$(document).ready(function(){
		$($('.various').attr('href')+' form textarea').click(function(){
			console.log($(this));
/* 			$(this).focus(); */
		});
		$("#DataTables_Table_0_length select").insertBefore("#DataTables_Table_0_length label .selector");
		$(".various").fancybox({
			maxWidth	: 400,
			maxHeight	: 300,
			fitToView	: false,
			width		: '70%',
			height		: '70%',
			autoSize	: false,
			closeClick	: false,
			openEffect	: 'none',
			closeEffect	: 'none',
			afterShow: function() {
				$('.nicEdit-panelContain').parent().width('100%');
				$('.nicEdit-main').parent().width('100%').css('max-width', '100%');
				$('.nicEdit-main').width('100%').css({'max-width': '100%', 'overflow': 'auto', 'max-height': '140px'});
/* 				$('#email').focus(); */
			}
		});
	});
	</script>