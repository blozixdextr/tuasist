<div id="contentContainer2">
		<div class="container">
			<div class="col-md-12">
 <!-- page function Start --->		
<?php foreach($staticpages as $staticpage)
 {
	 //echo $staticpage['stpage_id'];
	 echo "<h1>".ucfirst($staticpage['stpage_title'])."</h1>";
	 echo $staticpage['stpage_content'];
 } ?>

 <!-- page function End --->	
 		
 			</div>
 		</div>
 </div>	