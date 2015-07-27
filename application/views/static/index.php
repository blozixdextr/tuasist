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
	<!-- <link href="<?php echo base_url();?>template/css/admin-css.css" rel="stylesheet"> -->
    <!-- Flexslider core CSS -->
	<link href="<?php echo base_url();?>template/css/flexslider.css" rel="stylesheet">
    <!-- Datepicker styles for this template -->
	<link href="<?php echo base_url();?>template/css/datepicker.css" rel="stylesheet">

	<link rel="stylesheet" href="<?php echo base_url(); ?>template/fancybox/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>template/fancybox/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>template/fancybox/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />

    <!-- Custom styles for this template -->
	<link href="<?php echo base_url();?>template/css/style.css" rel="stylesheet">
    <!-- Just for debugging purposes. Don't actually copy this line! -->
    
    <!--[if lt IE 9]>
        <script src="<?php echo base_url();?>template/js/html5shiv.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>template/js/excanvas.js" type="text/javascript"></script>
        <![endif]-->
        <script src="<?php echo base_url();?>template/js/admin-js.js" type="text/javascript"></script>
</head>

<!--<body>-->
<body id="home" >
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
    
	<!-- <script src="<?php echo base_url();?>template/js/jquery.min.js"></script>
	<script src="<?php echo base_url();?>template/js/bootstrap.min.js"></script>-->
	<script src="<?php echo base_url();?>template/js/jquery.flexslider.js"></script>
	<script src="<?php echo base_url();?>template/js/jquery.easing.js"></script>
	<script src="<?php echo base_url();?>template/js/jquery.mousewheel.js"></script>

	<script type="text/javascript" src="<?php echo base_url(); ?>template/fancybox/jquery.fancybox.pack.js?v=2.1.5"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>template/fancybox/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>template/fancybox/helpers/jquery.fancybox-media.js?v=1.0.6"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>template/fancybox/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
    
        
<script src="<?php echo base_url();?>template/js/bootstrap-datepicker.js"></script>
	<script src="<?php echo base_url();?>template/js/bootstrap-timepicker.js"></script>
<!--     	<script src="<?php echo base_url();?>template/js/bootstrap-datetimepicker.js"></script> -->
   <script>
		$(document).ready(function(){
			$('.flexslider').flexslider({
				animation: "slide"
			});
		});
	</script>
    <script type="text/javascript">
	$(document).ready(function(){
		// $('#dpd1').datepicker();
		$('.extra-toggle a').click(function(e){
			$('.extra-item').show();
			$(this).hide();
			e.preventDefault();
		});
		$('.howToPay .radio_button *').on('click focus', function(e){
			e.preventDefault();
			if ($(this).parents('.selected').length == 0) {
				var currentRadio = $(this).parent('.radio_button').find('input[type="radio"]');
				$('.howToPay .radio_button').removeClass('selected');
				$(this).parent('.radio_button').addClass('selected');
				currentRadio.not(':checked').prop("checked", true);
			};
		});
		$('.priceName .radio_button *').on('click focus',function(e){
			e.preventDefault();
			if ($(this).parents('.selected').length == 0) {
				var currentRadio = $(this).parent('.radio_button').find('input[type="radio"]');
				$('.priceName .radio_button').removeClass('selected');
				$(this).parent('.radio_button').addClass('selected');
				currentRadio.not(':checked').prop("checked", true);
				var nowTemp = new Date();
				var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
				var bidStart = $('#dpd1').datepicker({
					onRender: function(date) {
						return date.valueOf() < now.valueOf() ? 'disabled' : '';
					}
				}).on('changeDate', function(ev) {
					if (ev.date.valueOf() > bidEnd.date.valueOf()) {
						var newDate = new Date(ev.date)
						newDate.setDate(newDate.getDate() + 1);
						bidEnd.setValue(newDate);
					}
					bidStart.hide();
					$('#dpd2')[0].focus();
				}).data('datepicker');
				var bidEnd = $('#dpd2').datepicker({
					onRender: function(date) {
						return date.valueOf() <= bidStart.date.valueOf() ? 'disabled' : '';
					}
				}).on('changeDate', function(ev) {
					bidEnd.hide();
				}).data('datepicker');
			};
		});
		$('#messageDialogue').fadeIn().delay(3000).fadeOut().promise().done(function() { 
			$('#messageDialogue p').empty();
		});
	});
	</script>
    <script type="text/javascript">
		$(document).ready(function(){
			$("#uploadTrigger").click(function(){
				$("#profileImageInput").trigger("click");
			});
			$('#datetimepicker').datepicker({
				format: 'yyyy-mm-dd'	
			});
			$("#favouriteWorkers").fancybox({
				fitToView	: true,
				autoSize	: true,
				closeClick  : false,
				openEffect	: 'none',
				closeEffect	: 'none'
			});	
		    $('#workers li:not(.workerHeader)').click(function(){
		        $('#workerIDInput').val($(this).data('worker-id'));
		        $.fancybox.close();
		    });
		});
	</script>
</body>
</html>