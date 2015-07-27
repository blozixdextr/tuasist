<div id="content" class="container">
	
		<div class="col-xs-10 col-xs-offset-1 task-form-container whiteContainer">
		
			<div class="col-xs-12">
				      <div class="jobEntry">
					<h4><a href="#">Job Completed</a></h4>
                    	 <?php echo form_open(base_url().'home/pjob_completed/update/' , array('class' => 'form-horizontal validatable','target'=>'_top', 'enctype' => 'multipart/form-data'));?>
        <?php  foreach($job_completed as $jobs):?>
        <table>
        <tr>
        <td width="40%" valign="top">
    	 <h4><b>Job Name : </b><?php echo $jobs['jname'];?></h4>
         <b>confirm Date : </b><?php echo $jobs['jaccept_date'];?><br/>
          <b>Worker Id : </b><?php echo $jobs['jaccept_workid'];?><br/>
         <b>price : </b><?php echo $jobs['jaccept_amt'];?><br/>
         <br/>
         <h4>Job Complete</h4>
        
      <input type="hidden" value="6" name="jwork_status" checked="checked"   />  
      <input type="hidden" value="<?php echo $jobs['job_id'];?>" name="job_id"/>
      <input type="hidden" value="<?php echo $jobs['jaccept_amt'];?>" name="amt"/>
   
      
      <b>Your Favorite Job</b>
          <div class="form_control_input">  
      <input type="radio" value="1" name="jposter_fav"  /> yes  &nbsp;&nbsp;&nbsp; 
      <input type="radio" value="0" name="jposter_fav" /> no
      </div>
       <b>Star Rating</b>
          <div class="form_control_input">
          
  <input type="radio" value="1" name="jstar_rate" /><strong>1</strong>  <!-- <img src=<?php echo base_url();?>template/images/star.gif >-->&nbsp;
   <input type="radio" value="2" name="jstar_rate" /><strong>2</strong>&nbsp;
    <input type="radio" value="3" name="jstar_rate" /><strong>3</strong>&nbsp;
     <input type="radio" value="4" name="jstar_rate" /><strong>4</strong>&nbsp;
      <input type="radio" value="5" name="jstar_rate" /><strong>5</strong>&nbsp;
         </td>
         <td width="20%"></td>
         <td width="40%" valign="top">
         
         <h4> <b>Feed back</b></h4>
         <div class="form_control_input">
         <textarea rows="15" cols="50" name="jfeedback"><?php echo $jobs['jfeedback'];?></textarea><br/>
         </div>
         </td></tr>
         </table>
         
      
   
        
      </div>
      <center>
           <input name="submit" type="submit" value="Submit">
      </center>
								
							</form>
        <?php endforeach; ?>	
                    
                    </div>
				</div>
		

			</div>

		</div>
	</div>
