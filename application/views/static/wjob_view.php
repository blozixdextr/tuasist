<div id="content" class="container">
	
		<div class="col-xs-10 col-xs-offset-1 task-form-container whiteContainer">
			<div class="col-xs-12">
			 <?php  foreach($job_view as $jobs):?>
            <div class="jobEntry">
					<h4><a href="#"><?php echo $jobs['jname'];?></a></h4>
					<ul class="secondaryInfo">
						<li title="Posted Date">  <b>Posted Date :</b> <i class="fa fa-calendar"></i> <?php echo $jobs['jposted_date'];?></li>
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
						<li title="Bidding"><i class="fa fa-gavel"></i>  <?php 
									
										switch ($jobs['jbidding_type'])
										{
											case '1':
											$status ='Bidding';
											break;
											case '2':
											$status ='Direct';
											break;
											case '3':
											$status ='First Bid';
											break;
											
										}
										echo $status;?></li>
					</ul>
					<p class="jobDescription"><?php echo $jobs['jdescription'];?></p>
					<div id="map-canvas" style="width: 100%; height: 300px;"></div>
				</div>
				<?php if($jobs['jbidding_type']!='2'){?>
                 <input type="button" value="Bid" onClick="window.location.href='<?php echo base_url();?>home/wjob_bid/<?php echo $jobs['job_id']; ?>'"/>
                                  <?php } endforeach; ?>
				
				

			</div>

		</div>
	</div>
<script
src="http://maps.googleapis.com/maps/api/js">
</script>
<script>
$( document ).ready(function() {

var lat = '<?php echo $jobs['jlatitude']; ?>';
var log = '<?php echo $jobs['jlongitude']; ?>';
var myCenter=new google.maps.LatLng(lat,log);

function initialize()
{
var mapProp = {
  center:myCenter,
  zoom:8,
  mapTypeId:google.maps.MapTypeId.ROADMAP
  };

var map=new google.maps.Map(document.getElementById("map-canvas"),mapProp);

var marker=new google.maps.Marker({
  position:myCenter,
  });

marker.setMap(map);


}


google.maps.event.addDomListener(window, 'load', initialize);

});
</script>
