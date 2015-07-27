<div id="content" class="container">
	
		<div class="col-xs-10 col-xs-offset-1 task-form-container whiteContainer">
       		<?php  foreach($recent_jobs as $jobs):?>
            <h2><?php echo $jobs['jname'];?></h2>
			<div class="col-xs-12">
            <div class="jobEntry">
					<h4>Job Info</h4>
					<ul class="secondaryInfo">
                      	<li title="Posted Date"><i class="fa fa-calendar"></i> Posted Date <?php echo $jobs['jposted_date'];?></li>
                        <li title="Completed Date"><i class="fa fa-calendar"></i> Completed Date <?php echo $jobs['jcomplete_date'];?></li>
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
						<li title="Bidding"><i class="fa fa-gavel"></i>  <?php 
									
										switch ($jobs['jbidding_type'])
										{
											case '1':
											$status ='Yes';
											break;
											case '2':
											$status ='No';
											break;
											
										}
										echo $status;?></li>
                       <li title="Price">Completed <i class="fa fa-dollar"></i> <?php echo $jobs['jcomplete_amt'];?></li>
					</ul>
					<blockquote><b>Description</b></blockquote>
                       		<p style="text-indent:50px;"><?php echo $jobs['jdescription'];?></p>
                    <blockquote><b>Feed back</b></blockquote>
                        	<p style="text-indent:50px;"><?php echo $jobs['jfeedback'];?></p>
                    <blockquote><b>Star rating</b></blockquote>
                        	<p style="text-indent:50px;">
							<?php
$disp_row =$jobs['jstar_rate'];
if($disp_row){
$rt=round($disp_row);
$img="";
$i=1;
	while($i<=$rt){
	$img=$img."<img src=".base_url()."template/images/star.gif >";
	$i=$i+1;
	}
	while($i<=5){
	$img=$img."<img src=".base_url()."template/images/star2.gif >";
	$i=$i+1;
	}
echo $img;
}
?>
                  	</div>
                                        
                                    
                                  <?php endforeach; ?>
			</div>

		</div>
	</div>