<div id="content" class="container">
	
		<div class="col-xs-10 col-xs-offset-1 task-form-container">
			<h2>Post your Job</h2>
			
             <?php echo form_open(base_url().'home/post_a_job/job_create' , array('class' => 'form-horizontal validatable','target'=>'_top', 'enctype' => 'multipart/form-data'));?>
            <label>Job Type</label>
           <select name="job_type" required="required">
           		<option value="0">--- Select ---</option>
                <option value="1">Virtual</option>
                <option value="2">In person</option>
                <option value="3">Delivery</option>
           </select>
            <br/>
            <label>Categroy</label>
           <select name="categroy" required="required">
           		<option value="0">--- Select ---</option>
				<?php $query=  $this->db->query("SELECT * FROM job_category WHERE category_parent_id = '0'")->result_array();
                foreach($query as $category)
                    {
                        echo "<option value=".$category['category_id'].">".$category['category_name']."</option>";	
                    }
                ?>
           </select>
            <br/>
             <label>Sub Categroy</label>
           <select name="sub_categroy" required="required">
           		<option value="0">--- Select ---</option>
              <?php $query=  $this->db->query("SELECT * FROM job_category")->result_array();
                foreach($query as $category)
                    {
                        echo "<option value=".$category['category_id'].">".$category['category_name']."</option>";	
                    }
                ?>
           </select>
            <br/>
           <label> Job Name</label>
           <div class="form_control_input">
           	<input required="required" size="50" type="text" name='jname'>
           </div>
          
        <label>Job Description</label>
        <div class="form_control_input">
        <textarea name="jdescription"  placeholder="" required="required"></textarea>
        </div>         
      <h4>How to Pay?</h4>
           <label>Bill by &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </label>
           <div class="form_control_input">  
          <input type="radio" value="1" name="jbilling_by"  /> Hour Based 
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>OR</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input type="radio" value="2" name="jbilling_by" /> Day Based
          </div>
          <label>No of Hours</label>
       <div class="form_control_input">  
       <input type="text" name="jbilling_no_hours" placeholder="" required="required" />
       </div>
       <label>No of Days</label>
       <div class="form_control_input">  
       <input type="text" name="jbilling_no_days" placeholder="" required="required" />
       </div>   
            <label>price</label>
       <div class="form_control_input">  
       <input type="text" name="jposter_price" placeholder="" required="required" />
       </div>
          
       <label>Open bidding &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </label>
       <div class="form_control_input">  
      <input type="radio" value="1" name="jbidding_type"  /> yes  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
      <input type="radio" value="2" name="jbidding_type" /> no
      </div>
      
       <label>Bidding Starting Date</label>
       <div class="form_control_input">  
       <input type="text" name="jbidding_st_date" placeholder="" required="required" />
       </div>
   
       <label>Bidding Ending Date</label>
       <div class="form_control_input">  
       <input type="text" name="jbidding_ed_date" placeholder="" required="required" />
       </div>
           <br/><b>OR</b><br/>
       <label>Direct Assign to Worker</label>
       <div class="form_control_input">  
       <input type="text" name="jassign_to_work_id" placeholder="Search by User id" required="required" /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><a href="#">View</a></b>
       </div>
       
          <br/><b>OR</b><br/>
       <label>Direct assign who can bid first </label>
       <div class="form_control_input">  
      <input type="radio" value="1" name="bidding"  /> yes  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
      <input type="radio" value="2" name="bidding" /> no
      </div>
     
       
       
                    
         <input class="btn btn-orange pull-right margt15" type="submit" value="Post Job"> 
          
          <p class="acceptTerms">By posting this job, you accept our <a href="#">Terms of Use</a> and <a href="#">Privacy Policy</a>.</p>
          	</form>
            	
	</div><!-- /.container -->
    
  