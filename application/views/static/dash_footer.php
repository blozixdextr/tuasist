<div id="footer" class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-3">
						<p class="linksHeading">Company</p>
						<ul>
							<li><a href="#">About Us</a></li>
							<li><a href="#">Press</a></li>
							<li><a href="#">Careers</a></li>
							<li><a href="#">City Directory</a></li>
							<li><a href="#">Terms</a>/<a href="">Privacy</a></li>							
						</ul>
					</div>
					<div class="col-md-3">
						<p class="linksHeading">Explore</p>
						<ul>
							<li><a href="#">How JobRabbit Works</a></li>
							<li><a href="#">Become a JobRabbit</a></li>
							<li><a href="#">Trust &amp; Safety</a></li>
							<li><a href="#">Gift Cards</a></li>
							<li><a href="#">Support Center</a></li>							
						</ul>
					</div>
					<div class="col-md-3">
						<p class="linksHeading">Connect</p>
						<ul>
							<li><a href="#">Blog</a></li>
							<li><a href="#">Tech Blog</a></li>
							<li>
								 <?php 
if(!empty($facebook_link)){echo "<a href='".$facebook_link."'><img src='".base_url()."template/image/facebook_icon.png'></a>";}
?>

<?php
if(!empty($twitter_link)){echo "<a href='".$twitter_link."'><img src='".base_url()."template/image/twitter_icon.png'></a>";}
?>

<?php
if(!empty($other_link)){echo "<a href='".$other_link."'><img src='".base_url()."template/image/pinterest_icon.png'></a>";}
?>
							</li>
						</ul>
					</div>
					<div class="col-md-3 app_icon">
						<a href="#"><img src="<?php echo base_url();?>template/image/app_icon.png"><h6>Download the app</h6><p>to post tasks on the go!</p></a>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 copyright">
				<p>Copyright &copy; <?php echo date("Y");?> JobRabbit, Inc.</p>
			</div>
		</div>
	</div>
