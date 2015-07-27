    <script type="text/javascript">
        $(document).ready(function()
        {
            $("#job_type").on("change",function(){
                var job_type = $("#job_type").val();
                $.ajax({
                    type:"POST",
                    url:"<?php echo base_url();?>home/get_category/", //controller url
                    data:"job_type="+job_type,
                    success:function(data)
                    {
                        $('#divCategory').html(data);
						$('#divSubCategory').find('select').html('<option>-Select One-</option>').attr('disabled', 'disabled');
                    }
                });
            });
           
            $("#divCategory").on("change",function(){
                var category_parent_id = $("#category").val();
                $.ajax({
                    type:"POST",
                    url:"<?php echo base_url();?>home/get_subcategory/",
                    data:"category_parent_id="+category_parent_id,
                    success:function(data)
                    {
                        $('#divSubCategory').html(data);
                    }
                });
            });

            $("#divSubCategory").on("change",function(){
            	
       				 document.getElementById("post_task").disabled=false;
				  
            });
           
        });
    </script>
     <script src="<?php echo base_url();?>template/js/nicEdit.js" type="text/javascript"></script>
<script type="text/javascript">
bkLib.onDomLoaded(function() {
	new nicEditor({fullPanel : true}).panelInstance('area2');
});
</script>
    
<div id="content" class="container">
	
		<div class="col-xs-10 col-xs-offset-1 task-form-container whiteContainer">
			<h2>Post your Job</h2>
				<?php echo form_open(base_url().'home/post_a_job/job_create/', array('class' => 'col-xs-12'));?>
				<div class="form_control_input">
					<div class="row">
						<div class="col-sm-4">
							<p>Job Type</p>
                            <?php // $countries['#'] = 'Select'; ?>
    <?php //echo form_dropdown('country', $countries, '#', 'id="country" class="form-control" required="required"'); ?>
							<select class="form-control" required="required" id="job_type" name="job_type">
								<option>-Select One-</option>
								<option value="1">Virtual</option>
								<option value="2">In Person</option>
								<option value="3">Delivery</option>
							</select>
						</div>
						<div class="col-sm-4">
							<p>Category</p>
                            <div id="divCategory">
       							<select class="form-control" name="category" required="required" disabled>
								<option>-Select One-</option>
							</select>
    						</div>
							<!--<select class="form-control" required="required" disabled>
								<option>-Select One-</option>
                                
							</select>-->
						</div>
						<div class="col-sm-4">
							<p>Sub-Category</p>
                            <div id="divSubCategory">
       							<select class="form-control" name="sub_categroy" required="required" disabled>
									<option>-Select One-</option>
								</select>
    						</div>
							<!--<select class="form-control" required="required" disabled>
								<option>-Select One-</option>
							</select>-->
						</div>
					</div>
				</div>

				<div class="form_control_input">
					<p>Job Name</p>
					<input id="change" class="form-control" required size="50" type="text" name="jname">
				</div>

				<div class="clearfix">
					<p>Job Description</p>
                    <textarea rows="10" class="form-control" id="area2" name="jdescription" ></textarea>
				</div>
                         <div id="locationField" class="form-group">

                            <label for="address" class="control-label col-md-4">Enter your address</label>
                            
                            <div class="col-md-8">

                            <input class="form-control" id="autocomplete" placeholder="Enter your address"
                                   onFocus="geolocate()" name="address" type="text" />
                                   <p>Use this input box to search the place in map</p>
                            </div>
                        </div>

                <div class="col-md-8 col-md-offset-4">
                  <div id="map-canvas" style="width: 104%; height: 200px;"></div>
                  <br>
                </div>
                        <div class="form-group">
                            <label class="control-label col-md-4" for="street">street number</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="street_num" id="street_number" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4" for="street">street name</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" id="route" name="street_name"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4" for="city">City</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" id="locality" name="city" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4" for="state">State</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" id="administrative_area_level_1"  name="state"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4" for="country">country</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="country" id="country" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4" for="zip">ZipCode</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="zip"  id="zip"/>
                            </div>
                        </div>
                      <input type="text" id="latitude" name="lat" hidden="true" required>
                      <input type="text" id="longitude" name="lon" hidden="true" required>

				<h4>How do you want to pay?</h4>
				<div class="howToPay">
					<div class="radio_button">
						<input id="taskPriceHour" name="jbilling_by" type="radio" value="1">
						<label for="taskPriceHour">
							<b>By hours</b>
							<p>JobRabbits will be paid for the hours they worked.</p>
							<p class="priceHolder"><input class="priceIncre" id="workHours" type="text" name="jbilling_no_hours"> hours at $ <input class="priceIncre" id="hourPrice" type="text" name="hour_price"> per hour.</p>
						</label>
					</div>

					<div class="radio_button ">
						<input id="taskPriceProject" name="jbilling_by" type="radio" value="2">
						<label for="taskPriceProject">
							<b>By days</b>
							<p>JobRabbits will be paid for the days they worked.</p>
							<p class="priceHolder"><input class="priceIncre" id="workDays" type="text" name="jbilling_no_days"> days at $ <input class="priceIncre" id="dayPrice" type="text" name="day_price"> per day.</p>
						</label>
					</div>
				</div>

				<h4>How to make the bid?</h4>
				<div class="priceName">
					<div id="quickAssign" class="radio_button">
						<input id="openBid" name="jbidding_type" type="radio" value="1">
						<label for="openBid">
							<b>Open Bidding</b>
							<p>Bidding open to all JobRabbit on a period of time.</p>
							<p class="dateRange">
								<b>
                          <em>Start Date <input type="text" class="form-control" value="" id="dpd1" data-date-format="yyyy-mm-dd" name="jbidding_st_date"></em>
                            <em>End Date <input type="text" class="form-control" value="" id="dpd2" data-date-format="yyyy-mm-dd" name="jbidding_ed_date"></em>
								</b>
							</p>
						</label>
					</div>

					<div class="radio_button ">
						<input id="forUser" name="jbidding_type" type="radio" value="2">
						<label for="forUser">
							<b>Assign to JobRabbit</b>
							<p>Search for an individual JobRabbit and assign the job.</p>
							<p class="searchWorker"><b><input type="text" id="workerIDInput" class="form-control" value="" placeholder="Enter Worker ID" name="jassign_to_work_id"> <a href="#inline" id="favouriteWorkers" > Favorite workers</a></p>
                           
						</label>  
					</div>

					<div class="radio_button ">
						<input id="forBids" name="jbidding_type" type="radio" value="3">
						<label for="forBids">
							<b>Who bid first.</b>
							<p>Assign to the JobRabbit who bids first.</p>
						</label>
					</div>
				</div>

				<input class="btn btn-orange pull-right margt15" type="submit" value="Post Task" disabled="true" id="post_task">
				<div class="clearfix"></div>
				<p class="acceptTerms">By posting this task, you accept our <a href="#">Terms of Use</a> and <a href="#">Privacy Policy</a>.</p>

			</form>

		</div>
	</div>
	<div id="inline" class="fancyboxContent">
		<h5>Favourite Workers</h5>
	    <ul id="workers">
	    	<li class="workerHeader">
	    		<span class="WorkerID">ID</span>
	    		<span class="WorkerName">Name</span>
	    	</li> 
			<?php  foreach($users as $user):?>
		    	<li data-worker-id="<?php echo $user['jaccept_workid'];?>">
			        <span class="WorkerID"><?php echo $user['jaccept_workid'];?></span>
			        <?php $output = $this->db->query("SELECT * FROM users WHERE user_id=".$user['jaccept_workid'])->row()->full_name; ?>
				    <span class="WorkerName"><?php echo ucfirst($output); ?></span>
		        </li>
		    <?php endforeach; ?>
	    </ul>
	</div>


    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
    <script>
// This example displays an address form, using the autocomplete feature
// of the Google Places API to help users fill in the information.

var placeSearch, autocomplete;
var componentForm = {
  street_number: 'short_name',
  route: 'long_name',
  locality: 'long_name',
  administrative_area_level_1: 'short_name',
  country: 'long_name',
  postal_code: 'short_name'
};


$(document).ready(function(){

    


  // Create the autocomplete object, restricting the search
  // to geographical location types.
  autocomplete = new google.maps.places.Autocomplete(
      /** @type {HTMLInputElement} */(document.getElementById('autocomplete')),
      { types: ['geocode'] });
  // When the user selects an address from the dropdown,
  // populate the address fields in the form.
  google.maps.event.addListener(autocomplete, 'place_changed', function() {
    fillInAddress();
  });

  var mapOptions = {
    zoom: 6
  };
  map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);

  // Try HTML5 geolocation
  if(navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var pos = new google.maps.LatLng(position.coords.latitude,
                                       position.coords.longitude);


      map.setCenter(pos);
    }, function() {
      handleNoGeolocation(true);
    });
  }

});



// [START region_fillform]
function fillInAddress() {
  // Get the place details from the autocomplete object.
  var place = autocomplete.getPlace();

console.log(place.geometry.location.lat());

console.log(place.geometry.location.lng());

var newLatLng = new google.maps.LatLng(place.geometry.location.lat(),place.geometry.location.lng());

  var marker = new google.maps.Marker({
      position: newLatLng,
      map: map,
      draggable: true,
      title: 'Hello World!'
  });

  $('#latitude').val(marker.getPosition().lat());
  $('#longitude').val(marker.getPosition().lng());

  google.maps.event.addListener(marker, 'dragend', function(ev){
    $('#latitude').val(marker.getPosition().lat());
    $('#longitude').val(marker.getPosition().lng());
});

  map.setCenter(newLatLng);

  map.setZoom(18);

//console.log(place.geometry.location.toString());
console.log(componentForm);

  for (var component in componentForm) {
//    document.getElementById('component').value = '';
 //   document.getElementById('component').disabled = true;
  }

  // Get each component of the address from the place details
  // and fill the corresponding field on the form.
  for (var i = 0; i < place.address_components.length; i++) {
    var addressType = place.address_components[i].types[0];
    if (componentForm[addressType]) {
      var val = place.address_components[i][componentForm[addressType]];
      document.getElementById(addressType).value = val;
    }
  }
}
// [END region_fillform]

// [START region_geolocation]
// Bias the autocomplete object to the user's geographical location,
// as supplied by the browser's 'navigator.geolocation' object.
function geolocate() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var geolocation = new google.maps.LatLng(
          position.coords.latitude, position.coords.longitude);
      autocomplete.setBounds(new google.maps.LatLngBounds(geolocation,
          geolocation));
    });
  }
}

    </script>

