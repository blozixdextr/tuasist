<div id="content" class="container">
	
		<div class="col-xs-10 col-xs-offset-1 task-form-container whiteContainer">
			<div class="col-xs-12">
			 
            <div class="jobEntry">
            	<div id="map-canvas" style="width: 100%; height: 500px;"></div>
            </div>
		</div>
	</div>
<script
src="http://maps.googleapis.com/maps/api/js">
</script>
<script>
$( document ).ready(function() {

function initialize()
{
	//var myCenter=new google.maps.LatLng(12.913429,77.62562400000002);
  var map;
 var mapProp = {
   zoom:15,
   mapTypeId:google.maps.MapTypeId.ROADMAP
   };

  navigator.geolocation.getCurrentPosition(function(position) {
  
      var geolocate = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
      map.setCenter(geolocate);
      
  });

 map=new google.maps.Map(document.getElementById("map-canvas"),mapProp);

var job = <?php echo(json_encode($job_view)); ?>;
console.log(job[0]['jlatitude']);
console.log(job);
console.log(job.length);
var j;
var i=0;
for (j=0; j<job.length; j++)
{
    //var p = data.results[0].geometry.location
    console.log(job[i]['jlatitude']);
    var latlng = new google.maps.LatLng(job[i]['jlatitude'], job[i]['jlongitude']);
   var marker = new google.maps.Marker(
        {
        position: latlng,
        map: map,
        title: "Hello!!"
        });
   var price = job[i]['jbilling_no_hours']*job[i]['jposter_price'];
   var htm = job[i]['job_id'];
   var fullpath = "<?php echo base_url();?>home/wjob_view/";
   fullpath += job[i]['job_id'];
   var jname = job[i]['jname'];
   console.log(fullpath);
   if(job[i]['jbilling_by'] == 1)
   {
    var li = "<a href='" + fullpath +"' target='_blank'>View</a>";
     var infowindow = new google.maps.InfoWindow({
        content:" "+jname+" " +li
      }); 
   }
  else
  {
    var infowindow = new google.maps.InfoWindow({
    content:" "+jname+" " +li
    });
  }

  infowindow.open(map,marker);

i++;
}


}


google.maps.event.addDomListener(window, 'load', initialize);

});
</script>

