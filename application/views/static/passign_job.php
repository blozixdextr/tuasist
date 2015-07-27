<div id="content" class="container">
			<div class="col-xs-10 col-xs-offset-1 task-form-container whiteContainer">
        <h2>Successfully Assigned</h2>
			 <?php  foreach($assign_job as $assign):?>
            <div class="jobEntry">
            <h4></h4>
            <table width="300px" align="center">
           
                 <tr>
                    <td><strong>Job id</strong></td>
                    <td><?php echo $assign['job_id'];?></td>
                </tr>
                 <tr>
                    <td><strong>Job Name</strong></td>
                    <td><?php echo $assign['jname'];?></td>
                </tr>
                <tr>
                    <td><strong>Worker id</strong></td>
                    <td><?php echo $assign['jassign_to_work_id'];?></td>
                </tr>
                
					<?php 
                     $bids= $assign['jbilling_by'];
                     if($bids=='1'){
                        echo "<tr><td><b>No of Hours</b></td><td> ".$assign['jbilling_no_hours']."</td></tr>"; 
                        echo "<tr><td><b>Price</b></td><td>".$assign['jassign_amt']."</td></tr>"; 
                        
                     }elseif($bids=='2'){
                        echo "<tr><td><b>No of days</b></td><td>".$assign['jbilling_no_days']."</td></tr>"; 
                        echo "<tr><td><b>Price</b></td><td>".$assign['jassign_amt']."</td></tr>"; 
                     }
                     ?>
                     
            </table>
                <?php endforeach; ?>   
            </div>
		</div>
     
</div>