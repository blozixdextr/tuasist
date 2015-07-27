<div class="tab-pane box active" id="edit" style="padding: 5px">
	<div class="box-content">
		<?php foreach($edit_data as $row):?>
        		 <div align="right">Posted:	<?php echo $row['jposted_date']."</div>"; ?>		                           				
				<div align="left"><b><?php echo $row['jname']."</b></div>"; ?>  
               <hr />
				<strong>Description	</strong>		<br/>	<?php echo $row['jdescription']."<hr />"; ?>
				
		<?php endforeach;?>	
	</div>
</div>