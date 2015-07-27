<div id="content" class="container">
	
		<div class="col-xs-10 col-xs-offset-1 task-form-container whiteContainer">
        <?php 
		switch ($sel_category) {
		  case 1:
			$op ="Virtual";
			break;
		  case 2:
			$op ="In Person";
			break;
		  case 3:
			$op ="Delivery";
			break;
		}
	?>
		<h2>
        What sort of <?php echo $op;?> Jobs would you like to look into? </h2>
        <h4></h4>
        
         <?php 
		  foreach($categories as $category):?>
          			<?php if($category['category_parent_id']=='0'){?>
                   		<b>      <a href="<?php echo base_url();?>home/wcategory_jobs/<?php echo $category['category_id'];?>"><?php echo $category['category_name'];?></a></b><br/>
						<?php }else{ ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 <a href="<?php echo base_url();?>home/wcategory_jobs/<?php echo $category['category_id'];?>"><?php echo $category['category_name'];?></a><br/>
                  <?php } endforeach;  ?>
        </div>
</div>