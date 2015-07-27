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
						<li title="Bill by"><i class="hourGlass"></i>  <?php 									
										switch ($jobs['jbilling_by'])
										{
											case '1':
											$status ='Hour Based';
											break;
											case '2':
											$status ='Day Based';
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
                       <li title="Price">Completed <i class="fa fa-dollar"></i> <?php echo $jobs['jposter_price'];?></li>
					</ul>
					<blockquote><b>Description</b></blockquote>
                       		<p style="text-indent:50px;"><?php echo $jobs['jdescription'];?></p>
                    <blockquote><b>Feed back</b></blockquote>
                        	<p style="text-indent:50px;"><?php echo $jobs['jfeedback'];?></p>
                       
                   <h4>Worker Details</h4>
            <b>User id</b> <?php echo $jobs['jaccept_workid'];?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="<?php echo base_url();?>home/pprofile_view/<?php echo $jobs['jaccept_workid'];?>">view profile</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>Rating :</b> &nbsp;&nbsp;
			
			<?php 
			
	if($jobs['jstar_rate']){		
			 $rt=round($jobs['jstar_rate']);
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