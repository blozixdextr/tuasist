<div id="content" class="container">
	
		<div class="col-xs-10 col-xs-offset-1 task-form-container whiteContainer">
		
			<div class="col-xs-12">
				      <div class="jobEntry">
					<h4><a href="#">Past Jobs</a></h4>
                    		 <table class="table table-condensed"  >
                                <thead>
                                    <tr>
                                     
                                        <th><div>Job id</div></th>
                                        <th><div>Job Name</div></th>
                                        <th><div>Work Completed Date</div></th>
                                        <th><div>Options</div></th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                 <?php  foreach($pastjob as $past):?>
                                	<tr>
                                    	<td><?php echo $past['job_id'];?></td>
                                    	<td><?php echo $past['jname'];?></td>
                                          <td><?php echo $past['jcomplete_date'];?></td>
                                     <td>
                                     	<a href="<?php echo base_url();?>home/wjobworkers/<?php echo $past['job_id']; ?>">View</a>
                                     </td>
                                    </tr>
                                  <?php endforeach; ?>
                                </tbody>
                                </table>
                    
                    </div>
				</div>
		

			</div>

		</div>
	</div>
