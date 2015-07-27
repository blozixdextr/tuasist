<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
<head>
	    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
        <?php include(__DIR__."/../sitesettings_info.php"); ?>
		<?php include 'includefiles.php';?>
        <title><?php echo $page_title;?> | <?php echo $site_name;?></title>
</head>
<!--<body>-->
<?php include(__DIR__."/../controlsave_javascript.php"); ?>

	<div id="main_body">
     <?php  $admin_prem = $this->session->userdata('admintype');?>
     <?php // $admin_prem = "1" ;?>
		<?php include 'header.php';?>
        <?php include 'navigation.php';?>
        <div class="main-content">
            <?php include 'page_info.php';?>
            <div class="container-fluid padded">
                <?php include $page_name.'.php';?>
            </div>       
            
        <?php include 'footer.php';?>
        </div>
	</div>

</body>
<?php include 'modal_hidden.php';?>


<?php include(__DIR__."/../rightclick_javascript.php"); ?> 
</html>