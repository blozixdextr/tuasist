	<div id="banner">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="ribbon">
						<p>20,000+ Background-Checked JobRabbits<span><img src="<?php echo base_url();?>template/image/ribbon.png"></span></p>
					</div>
					
                            <?php 
								if($site_slideshow_Enable=="1"){
									echo "<div class='flexslider'>";
										echo "<ul class='slides'>";
									foreach ($slideshow as $slide) {
										echo "<li>";
										/*echo $slide['slideshow_title'];
										echo"<br/>";
										echo $slide['slideshow_description'];
										echo"<br/>";*/
										echo "<img src='".base_url()."uploads/slideshow/{$slide['slideshow_image']}' />";
										echo "</li>";
										
									}
									echo "</ul>";	
									echo "</div>";
								}else {
									echo "<div class='bannerSlider'><img src='".base_url()."uploads/slideshow/default.jpg' /></div>";
								}
							?>
						
					<div class="col-md-5 bannerForm">
						<h3>Your to-do's, done.</h3>
						<p>Find safe, reliable help in your neighborhood.</p>
				
							<div class="form-group col-md-12">
								<input id="" name="" type="submit" value="Join for free" class="form-control input-md" onClick="window.location.href='<?php echo base_url();?>home/signup'">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div><!-- /.Banner -->

	<div id="contentContainer">
		<div class="container">
			<div class="col-md-12 mainContentContainer">
				<div class="col-md-4">
					<img src="<?php echo base_url();?>template/image/post_task_img.png">
					<p>Outsource household errands and  skilled Jobs; rejoice as your to-do list disappears.</p>
					<a href="<?php echo base_url();?>home/signup" class="btn btn-primary col-md-8 col-md-offset-2">Post a Job</a>
				</div>
				<div class="col-md-4">
					<img src="<?php echo base_url();?>template/image/become_jobrabbit_img.png">
					<p>Discover opportunities to make money while helping out your neighbors.</p>
					<a href="<?php echo base_url();?>home/become_jobrabbit" class="btn btn-primary col-md-8 col-md-offset-2">Become a JobRabbit</a>
				</div>
				<div class="col-md-4">
					<img src="<?php echo base_url();?>template/image/quality_candidates_img.png">
					<p>Find candidates to staffyour company’s long-term and short-term projects.</p>
					<a href="" class="btn btn-primary col-md-8 col-md-offset-2">Get quality candidates</a>
				</div>
			</div>

		</div>
	</div><!-- /.container -->