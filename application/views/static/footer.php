	<div id="staticFooter">
		<div class="row">
			<div class="container">
				<div class="col-md-9">
					<ul class="nav navbar-nav">
						<?php 
						$this->db->where('stpage_status', '1');
						$pages   =   $this->db->get('staticpages')->result_array();
						foreach($pages as $page)
                            {
                                echo "<li><a href='".base_url()."home/page/?page=".$page['stpage_id']."'>".ucfirst($page['stpage_name'])."</a>";
                            }
                        ?>
					</ul>
					<ul class="nav navbar-nav">
						<li><a href="<?php echo base_url();?>home/signup">Sign Up</a></li>
						<li><a href="<?php echo base_url();?>home/how_it_works">How it works</a></li>
					</ul>
				</div>
				<div class="col-md-2 pull-right">
					<p class="downloadAppIcon">Get the App<a href=""><img src="<?php echo base_url();?>template/image/app_icon_small.png"></a></p>
				</div>
			</div>
		</div>
<div class="row">
			<div class="container footRow2">
				<p>&copy; <?php echo date("Y");?> JobRabbit, Inc. <span>
                <?php 
if(!empty($facebook_link)){echo "<a href='".$facebook_link."'><img src='".base_url()."template/image/facebook_icon.png'></a>";}
?>

<?php
if(!empty($twitter_link)){echo "<a href='".$twitter_link."'><img src='".base_url()."template/image/twitter_icon.png'></a>";}
?>

<?php
if(!empty($other_link)){echo "<a href='".$other_link."'><img src='".base_url()."template/image/pinterest_icon.png'></a>";}
?>
                </span></p>
			</div>
		</div>
	</div>
