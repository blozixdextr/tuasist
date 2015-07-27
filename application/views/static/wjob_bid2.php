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
                  <input type="text" class="form-control" id="username3" placeholder="User Name" disabled="" value="  rajkamal">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-offset-1 col-sm-3 control-label">Job Name</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="username3" placeholder="User Name" disabled="" value="  rajkamal">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-offset-1 col-sm-3 control-label">Bidding Average Price</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="username3" placeholder="User Name" disabled="" value="  rajkamal">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-offset-1 col-sm-3 control-label">Comment</label>
                <div class="col-sm-6">
                  <textarea class="form-control" id="username3" placeholder="About Me" rows="7" name="about_info">sample to about me</textarea>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-offset-1 col-sm-3 control-label">Enter the Amount</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="username3" placeholder="User Name" value="  rajkamal">
                </div>
              </div>
              <div class="col-sm-12 clearfix">
                <input type="submit" style="width: 170px;" class="form-control input-md btn-orange" value="Submit">
              </div>
                                          <!--<div class="form-group">
                <label class="col-sm-offset-1 col-sm-3 control-label">Map Location</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="username3" placeholder="Map Details">
                  <div id="mapcanvas"></div>
                </div>
              </div>-->
            <table width="450px" align="center" height="250px" border="2" bordercolor="#006600">
           
                 <tr>
                    <td><strong>Job id</strong></td>
                    <td><?php echo $jobid=$jobs['job_id'];?></td>
                </tr>
                 <tr>
                    <td><strong>Job Name</strong></td>
                    <td><?php echo $jobs['jname'];?></td>
                </tr>
                <tr>
                    <td><strong>Bidding Average price</strong></td>
                    <td><?php 									
										switch ($jobs['jbilling_by'])
										{
											case '1':
												$price =$jobs['jbilling_no_hours']*$jobs['jposter_price'];
											break;
											case '2':
												$price =$jobs['jbilling_no_days']*$jobs['jposter_price'];
											break;
											
										}
										echo $price;?></td>
                </tr>
                <?php endforeach; ?> 
                <?php
				@$output = $this->db->get_where('job_bids', array('userid' =>$this->session->userdata('user_id'),'job_id'=>$jobid))->result_array();
				if(empty($output)){
			    ?>
               <?php if($jobs['jbidding_type'] =='3' ){  ?>
                <?php echo form_open(base_url().'home/wbid' , array('class' => 'form-horizontal validatable','target'=>'_top', 'enctype' => 'multipart/form-data'));?>
               <tr>
               		<td><strong>Enter the Amount</strong></td>
                    <td><input name="bid_price" type="hidden" value="<?php echo $price;?>"/><?php echo $price;?><input name="job_id" type="hidden"  value="<?php echo $jobs['job_id'];?>" /></td>
               </tr>
                <tr>
                    <td colspan="2" align="center"><input name="submit" type="submit" value="Submit"></td>
               </tr>
                     </form>
			   		
			   <?php }elseif($jobs['jbidding_type'] =='1' ){ ?>
				    <?php echo form_open(base_url().'home/wbid' , array('class' => 'form-horizontal validatable','target'=>'_top', 'enctype' => 'multipart/form-data'));?>
               <tr>
                    <td><strong>Command</strong></td>
                    <td><textarea name="commands" required ></textarea></td>
               </tr>
               <tr>
               		<td><strong>Enter the Amount</strong></td>
                    <td><input name="bid_price" type="text" required /><input name="job_id" type="hidden"  value="<?php echo $jobs['job_id'];?>" /></td>
               </tr>
                <tr>
                    <td colspan="2" align="center"><input name="submit" type="submit" value="Submit"></td>
               </tr>
                     </form>		   
			   					   
			   <?php }?>
               <?php //print_r($output);
						 foreach($output as $jobs){
							 echo "<tr><td><b>Commands</b></td><td>".$jobs['bid_commands']."</td></tr>";
							 echo "<tr><td><b>Bid Amount</b></td><td>".$jobs['bid_amt']."</td></tr>";
							 echo "<tr><td><b>Bidded Date</b></td><td>".$jobs['biding_dt']."</td></tr>";
						 }
					 }?>
            </table>
                </center>
             
			</div>

		</div>
	</div>