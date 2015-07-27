<div id="content" class="container">
	
		<div class="col-xs-10 col-xs-offset-1 task-form-container whiteContainer">
			<style type="text/css">
    label {
      font-weight: normal;
      margin-top: 12px;
      text-align: right;
    }
    </style>
            <h2>Submit your bid with confidence !</h2>
			<div class="col-xs-12">
			 <h4></h4>
             <center>
                   <?php
				   $jobid="";
				     foreach($job_bid as $jobs):?>
             <div class="form-group">
                <label class="col-sm-offset-1 col-sm-3 control-label">Job ID</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="username3" disabled="disabled" value="<?php echo $jobid=$jobs['job_id'];?>">
                </div>
              </div>
              
               <div class="form-group">
                <label class="col-sm-offset-1 col-sm-3 control-label">Job Name</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="username3" disabled="disabled" value="<?php echo $jobs['jname'];?>">
                </div>
              </div>
              
               <div class="form-group">
                <label class="col-sm-offset-1 col-sm-3 control-label">Bidding Average price</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="username3" disabled="disabled" value="<?php 									
										switch ($jobs['jbilling_by'])
										{
											case '1':
												$price =$jobs['jbilling_no_hours']*$jobs['jposter_price'];
											break;
											case '2':
												$price =$jobs['jbilling_no_days']*$jobs['jposter_price'];
											break;
											
										}
										echo $price;?>">
                </div>
              </div>
              
                <?php endforeach; ?> 
                <?php
				@$output = $this->db->get_where('job_bids', array('userid' =>$this->session->userdata('user_id'),'job_id'=>$jobid))->result_array();
				if(empty($output)){
			    ?>
               <?php if($jobs['jbidding_type'] =='3' ){  ?>
                <?php echo form_open(base_url().'home/wbid' , array('class' => 'form-horizontal validatable','target'=>'_top', 'enctype' => 'multipart/form-data'));?>
                 <div class="form-group">
                <label class="col-sm-offset-1 col-sm-3 control-label">Enter the Amount</label>
                <div class="col-sm-6">
                <input name="bid_price" type="hidden" value="<?php echo $price;?>" class="form-control" id="username3"/>
				<?php echo $price;?><input name="job_id" type="hidden"  value="<?php echo $jobs['job_id'];?>"  class="form-control" id="username3"/>
                </div>
              </div>
                  <div class="col-sm-12 clearfix">
                <input type="submit" style="width: 170px;" class="form-control input-md btn-orange" value="Submit">
              </div>
                </form>
			   		
			   <?php }elseif($jobs['jbidding_type'] =='1' ){ ?>
				    <?php echo form_open(base_url().'home/wbid' , array('class' => 'form-horizontal validatable','target'=>'_top', 'enctype' => 'multipart/form-data'));?>
                    
                    <div class="form-group">
                <label class="col-sm-offset-1 col-sm-3 control-label">Anything you wanna say</label>
                <div class="col-sm-6">
                <textarea name="commands" required rows="10" cols="40" class="form-control" id="username3"></textarea>
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-sm-offset-1 col-sm-3 control-label">Enter the bid amount</label>
                <div class="col-sm-6">
                <input name="bid_price" type="text" class="form-control" id="username3" required />
                <input name="job_id" type="hidden"  value="<?php echo $jobs['job_id'];?>" class="form-control" id="username3"/>
                </div>
              </div>
               <input type="submit" style="width: 170px;" class="form-control input-md btn-orange" value="Submit"/>
                     </form>		   
			   					   
			   <?php }?>
               <?php //print_r($output);
						 foreach($output as $jobs){
				?>
							 <div class="form-group">
                <label class="col-sm-offset-1 col-sm-3 control-label">Comments</label>
                <div class="col-sm-6">
                <textarea name="commands" required rows="10" cols="40" class="form-control" id="username3" disabled="disabled">
				<?php echo $jobs['bid_commands'];?></textarea>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-offset-1 col-sm-3 control-label">Bid Amount</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="username3" disabled="disabled" value="<?php echo $jobs['bid_amt'];?>">
                </div>
              </div>
               <div class="form-group">
                <label class="col-sm-offset-1 col-sm-3 control-label">Bidded Date</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="username3" disabled="disabled" value="<?php echo $jobs['biding_dt'];?>">
                </div>
              </div>
				<?php }
					 }?>
                </center>
             
			</div>

		</div>
	</div>