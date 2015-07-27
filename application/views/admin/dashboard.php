	<div class="container-fluid padded">
		<div class="row-fluid">
			<div class="span30">
				<!-- find me in partials/action_nav_normal -->
				<!--big normal buttons-->
				<div class="action-nav-normal">
					<div class="row-fluid">
                    <table>
                    <tr><td>
					<?php
    echo $this->gcharts->DonutChart('Foods')->outputInto('food_div');
    echo $this->gcharts->div(545,300); ?>
    </td><td>
    <?php 
	echo $this->gcharts->ColumnChart('Inventory')->outputInto('inventory_div');
	echo $this->gcharts->div(545, 300);
	?>
    </td></tr>
    </table>
    
   <?php 
    if($this->gcharts->hasErrors())
    {
        echo $this->gcharts->getErrors();
    }
?>
<h4>Jobs Status</h4>

<div class="box">
<br/>
	<div class="action-nav-normal">
		<div class=" action-nav-button" style="width:200px;">
		  <a href="#" title="Users">
			<img src="<?php echo base_url();?>template/images/icons/teacher.png" />
			<span><?php echo $this->db->count_all_results('jobs');?> Jobs</span>
		  </a>
		</div> 
        
        <div class=" action-nav-button" style="width:200px;">
		  <a href="#" title="Users">
			<img src="<?php echo base_url();?>template/images/icons/teacher.png" />
            <span><?php
            $this->db->where("jwork_status = '1'");
            $this->db->from('jobs');
            echo $this->db->count_all_results();
            ?> New Jobs</span>
		  </a>
		</div>
        <div class=" action-nav-button" style="width:200px;">
		  <a href="#" title="Users">
			<img src="<?php echo base_url();?>template/images/icons/teacher.png" />
            <span><?php
            $this->db->where("jwork_status = '2'");
            $this->db->from('jobs');
            echo $this->db->count_all_results();
            ?> Assign Jobs</span>
		  </a>
		</div>
        <div class=" action-nav-button" style="width:200px;">
		  <a href="#" title="Users">
			<img src="<?php echo base_url();?>template/images/icons/teacher.png" />
            <span><?php
            $this->db->where("jwork_status = '3'");
            $this->db->from('jobs');
            echo $this->db->count_all_results();
            ?> Accept Jobs</span>
		  </a>
		</div>
        <div class=" action-nav-button" style="width:200px;">
		  <a href="#" title="Users">
			<img src="<?php echo base_url();?>template/images/icons/teacher.png" />
            <span><?php
            $this->db->where("jwork_status = '1'");
            $this->db->from('jobs');
            echo $this->db->count_all_results();
            ?> Conform Jobs</span>
		  </a>
		</div>
         <div class=" action-nav-button" style="width:200px;">
		  <a href="#" title="Users">
			<img src="<?php echo base_url();?>template/images/icons/teacher.png" />
            <span><?php
            $this->db->where("jwork_status = '8'");
            $this->db->from('jobs');
            echo $this->db->count_all_results();
            ?> Reject Jobs</span>
		  </a>
		</div>
         <div class=" action-nav-button" style="width:200px;">
		  <a href="#" title="Users">
			<img src="<?php echo base_url();?>template/images/icons/teacher.png" />
            <span><?php
            $this->db->where("jwork_status = '5'");
            $this->db->from('jobs');
            echo $this->db->count_all_results();
            ?> Cancel Jobs</span>
		  </a>
		</div>
         <div class=" action-nav-button" style="width:200px;">
		  <a href="#" title="Users">
			<img src="<?php echo base_url();?>template/images/icons/teacher.png" />
            <span><?php
            $this->db->where("jwork_status = '6'");
            $this->db->from('jobs');
            echo $this->db->count_all_results();
            ?> Complete Jobs</span>
		  </a>
		</div>
                 
    </div>
       </div>
   </div>
   
  
