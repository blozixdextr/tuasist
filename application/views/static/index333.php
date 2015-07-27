<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
<head>
	   <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <?php 
	$site_online = $this->db->get_where('sitesettings' , array('type'=>'site_online'))->row()->description;
	if($site_online !=1){ redirect(base_url() . 'home/offline', 'refresh');}
	?>
	<?php include(__DIR__."/../sitesettings_info.php"); ?>
         <title><?php if(!empty($head)){ echo $site_title; }else{ echo $page_title;}?> | <?php echo $site_name;?></title>
 	<!--<link rel="icon" type="image/png" href="upload/<?php //echo $$site_favicon;?>.png">-->
    <meta name="description" content="<?php echo $site_description;?>">
    <meta name="keywords" content="<?php echo $site_keywords;?>">
    <!-- Bootstrap core CSS -->
	<link href="<?php echo base_url();?>template/css/bootstrap.min.css" rel="stylesheet">
    <!-- Flexslider core CSS -->
	<link href="<?php echo base_url();?>template/css/flexslider.css" rel="stylesheet">
    <!-- Custom styles for this template -->
	<link href="<?php echo base_url();?>template/css/home.css" rel="stylesheet">
    <!-- Just for debugging purposes. Don't actually copy this line! -->
	<!--[if lt IE 9]><script src="<?php echo base_url();?>template/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="<?php echo base_url();?>template/js/html5shiv.js"></script>
	<script src="<?php echo base_url();?>template/js/respond.min.js"></script>
	<![endif]-->
</head>

<!--<body>-->
<?php include(__DIR__."/../controlsave_javascript.php"); ?>
<body onkeypress="return disableCtrlKeyCombination(event);" onkeydown="return disableCtrlKeyCombination(event);" id="home" >
		<?php 
			if(!empty($head)){
				include $head;
			}
		?>	

		
		<?php include $page_name.'.php';?>
		<?php 
			if(!empty($foot)){
				include $foot;
			}
		?>		
<!-- Bootstrap core JavaScript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="<?php echo base_url();?>template/js/jquery.min.js"></script>
	<script src="<?php echo base_url();?>template/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url();?>template/js/jquery.flexslider.js"></script>
	<script src="<?php echo base_url();?>template/js/jquery.easing.js"></script>
	<script src="<?php echo base_url();?>template/js/jquery.mousewheel.js"></script>
</body>
<?php include(__DIR__."/../rightclick_javascript.php"); ?> 
</html>