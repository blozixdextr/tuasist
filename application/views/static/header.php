	<div id="header">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="main_logo navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="<?php //echo base_url();?>">
                        <!-- Site Name or logo -->
						<?php 
                        if(!empty($site_logo)){ 
                            echo "<img src='".base_url()."uploads/".$site_logo."' style='max-height: 65px; display: block; margin-left: 25px;'/>";
                        }else {
                            echo "<h1 style='display: block; margin-bottom: 0;'>".$site_name."</h1>";;
                        }
                         ?>
                        <!--Slogan -->
						<small class="slogan" style="display: inline-block; margin-left: 75px;"><?php if($site_slogan_Enable==1){ echo $site_slogan; }?></small>
                        <!--Slogan --> 
                        <!-- Site Name or logo -->
                        </a>
					</div>
					<div class="main_menu collapse navbar-collapse pull-right">
						<ul class="nav navbar-nav">
							<li><a href="<?php echo base_url();?>home/become_jobrabbit">Become a JobRabbit</a></li>
							<li><a href="<?php echo base_url();?>home/how_it_works">How it works</a></li>
							<li><a href="<?php echo base_url();?>home/login">Log in</a></li>
						</ul>
					</div><!--/.nav-collapse -->
				</div>
			</div>
		</div>
