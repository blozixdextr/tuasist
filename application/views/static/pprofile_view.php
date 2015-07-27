<div id="content" class="container">
	 <?php  foreach($user_profile as $profile):?>
		<div class="col-xs-10 col-xs-offset-1 task-form-container whiteContainer">
      <!--  <p align="right">
        <a href=" <?php
		if(isset($_SERVER['HTTP_REFERER']))
		{
			$a=$_SERVER['HTTP_REFERER'];
			echo $a;
		}
		?>">Go Back</a>
		</p>-->
            <div class="jobEntry">
            <h4><?php echo $profile['full_name'];?></h4>
            <table width="100%" border="0">
            	<tr>
                    <td valign="top" width="25%">
                    <br/>
                    <center>
                    <img src="<?php echo base_url(); ?>uploads/profiles/<?php if(!empty($profile['user_image'])){ echo $profile['user_image'];  }else{echo "user-default.jpg";}?>" alt="profile Image" class="img-circle"><!---class="img-thumbnail"--><br/>
                    </center><br/>
                      <b>Gender : </b> <?php 
						switch ($profile['gender'])
						{
							case '1':
							$status ='Male';
							break;
							case '2':
							$status ='Female';
							break;
							
						}
						echo @$status;
					 ?> <br/> <strong>Age : </strong> <?php echo date_diff(date_create($profile['dob']), date_create('today'))->y; ?>
					  <br/>
                      <center>
                      <?php $pro =(explode("*",$profile['profile_links']));?>
                      <?php echo "<a href='".@$pro[0]."'><img src='".base_url()."template/image/facebook_icon.png'></a>"; ?>
                       <?php echo"<a href='".@$pro[1]."'><img src='".base_url()."template/image/twitter_icon.png'></a>";?>
                      </center>
                     
                      
                    </td>
                    <td  valign="top" width="75%">
                    	<blockquote><b>About Me : </b></blockquote>
                        <p style="text-indent:50px;">
						<?php echo $profile['about_info'];?>
                        </p>
                        <br/>
                        <blockquote><b>Skills : </b></blockquote>
                        <p style="text-indent:50px;">
						<?php echo $profile['skills'];?>
                        </p>
                        <br/>
                        <blockquote><b>Reviews: </b></blockquote>
                    
                    	<?php foreach($job_desp as $jobs):
							if(!empty($jobs['jstar_rate'])){
						?> 	<p style="text-indent:50px;">
                        	<b><?php echo $this->db->query("SELECT * FROM users WHERE user_id=". $jobs['jposter_id'])->row()->full_name;?></b>&nbsp;:&nbsp;
                            <?php 
							@$avg = $jobs['jstar_rate'];
							if(@$avg){		
								$rt=round($avg);
								$img="";
								$i=1;
								while($i<=$rt){
								$img=$img."<img src=".base_url()."template/images/star.gif >";
								$i=$i+1;
								}
								while($i<=5){
								$img=$img."<img src=".base_url()."template/images/star2.gif >";
								$i=$i+1;
								}
								echo $img;
							}
							?>      
                            </p>
                            <p style="text-indent:70px;">
                            <?php echo $jobs['jfeedback']; ?>
                           </p>                    		                            
                     	<?php } endforeach; ?>
                    </td>
                    <?php endforeach; ?>
                </tr>
            </table>            
            </div>
		</div>
         
</div>