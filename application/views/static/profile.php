<div id="content" class="container profilePage">
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-10">
				<div class="login_controls">
                <?php $user_id =  $this->session->userdata('user_id');?>
                
					<?php echo form_open(base_url().'home/profile/update/'.$user_id , array('class' => 'form-horizontal','role' => 'form','enctype' => 'multipart/form-data'));?>
                    <?php foreach($edit_data as $data){ ?>
                      <?php // echo $data['location_map'];?>
                      
                         <?php $pro =(explode("*",$data['profile_links']));?>
                         <input id="profileImageInput" type="file" name="user_image" />
						<div class="left">
							<h3>Personal Info</h3>
							<div class="form-group">
								<label class="col-sm-offset-1 col-sm-3 control-label">Username</label>
								<div class="col-sm-6">
                                </input type="text" name='user_imagetxt' value="><?php echo $data['user_image'];?>">
									<input type="text" class="form-control" id="username3" name="full_name" placeholder="Full Name" value="<?php echo $this->session->userdata('full_name');?>" disabled="disabled">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-offset-1 col-sm-3 control-label">Gender</label>
								<div class="col-sm-6">
                                    <select name="gender" class="form-control">
								<?php if($data['gender'] == '1'){?>
									<option value="1" selected>Male</option>
									<option value="2">Female</option>
								<?php }else{?>	
									<option value="1">Male</option>
									<option value="2" selected>Female</option>
								<?php } ?>	
							   </select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-offset-1 col-sm-3 control-label">Date of Birth</label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="datetimepicker" placeholder="YYYY/MM/DD" value="<?php echo $data['dob']; ?>" name="dob">
								</div>
							</div>
                            <h3>About Me</h3>
							<div class="form-group">
								<label class="col-sm-offset-1 col-sm-3 control-label">About Me</label>
								<div class="col-sm-6">
									<textarea class="form-control" id="username3" placeholder="About Me" rows="7" name="about_info" ><?php echo $data['about_info'];?></textarea>
								</div>
							</div>
                            
                            <div class="form-group">
								<label class="col-sm-offset-1 col-sm-3 control-label">Skills</label>
								<div class="col-sm-6">
			<textarea class="form-control" id="username3" name="skills" placeholder="Skills" rows="7" ><?php echo $data['skills']; ?></textarea>
								</div>
							</div>
                         <h3>Social Connections</h3>
							<div class="form-group">
								<label class="col-sm-offset-1 col-sm-3 control-label socialLinksLabel"><strong>Facebook Link</strong></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="username3" placeholder="Facebook Link" name="face" value="<?php echo @$pro[0];?>"><br/>
                                   ex : http://www.facebook.com/example
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-offset-1 col-sm-3 control-label socialLinksLabel"><strong>Twitter Link</strong></label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="username3" placeholder="Twitter Link" name="twitter"  value="<?php echo @$pro[1];?>"><br/>
                                   ex : http://www.twitter.com/example
								</div>
							</div>
                            <?php if($work=="Job Worker"){?>
                            
                             <h3>Select Categories</h3>
                            <div class="form-group">
								<!-- <label class="col-sm-offset-1 col-sm-3 control-label">Map Location</label>-->
                               <table width="600px" align="center">
                                <tr valign="top">
                                <td>
                        		<?php $sel_cat =(explode(",",$data['selected_catagories'])); ?>
						 		 <h4>Virtual</h4>
                                <?php $cat1 = $this->db->get_where('job_category', array('category_job_type' =>'1','category_parent_id' =>'0'))->result_array();
								foreach($cat1 as $categ1){
									echo '<b>'.$categ1['category_name'].'</b><br/>';
									echo "<blockquote>";
									$subcat1 = $this->db->get_where('job_category', array('category_parent_id' =>$categ1['category_id']))->result_array();
									foreach($subcat1 as $subcateg1){
										if (in_array($subcateg1['category_id'], $sel_cat)) {
											$check = 'checked="checked"';
										}else{$check = '';}
										echo '<input type="checkbox" '.$check.' name="ck-'.$subcateg1['category_id'].'" value="'.$subcateg1['category_id'].'"> '.$subcateg1['category_name'].'<br/>';
									}	
									echo "</blockquote>";	
								}								
								?>
                                </td>
                                <td>
                                  <h4>In Person</h4>                             
                                 <?php $cat2 = $this->db->get_where('job_category', array('category_job_type' =>'2','category_parent_id' =>'0'))->result_array();
								foreach($cat2 as $categ2){
									echo '<b>'.$categ2['category_name'].'</b><br/>';
									echo "<blockquote>";
									$subcat2 = $this->db->get_where('job_category', array('category_parent_id' =>$categ2['category_id']))->result_array();
									foreach($subcat2 as $subcateg2){
										if (in_array($subcateg2['category_id'], $sel_cat)) {
											$check = 'checked="checked"';
										}else{$check = '';}
										echo '<input type="checkbox" '.$check.' name="ck-'.$subcateg2['category_id'].'" value="'.$subcateg2['category_id'].'"> '.$subcateg2['category_name'].'<br/>';
									}	
									echo "</blockquote>";	
								}								
								?>
                                </td>
                                <td>
                                  <h4>Delivery</h4>
                                <?php $cat3 = $this->db->get_where('job_category', array('category_job_type' =>'3','category_parent_id' =>'0'))->result_array();
								foreach($cat3 as $categ3){
									echo '<b>'.$categ3['category_name'].'</b><br/>';
									echo "<blockquote>";
									$subcat3 = $this->db->get_where('job_category', array('category_parent_id' =>$categ3['category_id']))->result_array();
									foreach($subcat3 as $subcateg3){
										if (in_array($subcateg3['category_id'], $sel_cat)) {
											$check = 'checked="checked"';
										}else{$check = '';}
										echo '<input type="checkbox" '.$check.' name="ck-'.$subcateg3['category_id'].'" value="'.$subcateg3['category_id'].'"> '.$subcateg3['category_name'].'<br/>';
									}	
									echo "</blockquote>";	
								}								
								?>
                                </td>
                                </tr>
                                </table>
									<!--<input type="text" class="form-control" id="username3" placeholder="Map Details">-->
								
							</div>
                            <?php }?>
							<!--<div class="form-group">
								<label class="col-sm-offset-1 col-sm-3 control-label">Map Location</label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="username3" placeholder="Map Details">
									<div id="mapcanvas"></div>
								</div>
							</div>-->
						</div>
						<div class="profileImageHoldr">
							<img id="profileImage" src="<?php echo base_url(); ?>uploads/profiles/<?php if(!empty($data['user_image'])){ echo $data['user_image'];  }else{echo "user-default.jpg";}?>">
							<span id="uploadTrigger"><i class="fa fa-plus"></i></span>
						</div>
						<div class="col-sm-12 clearfix">
							<input type="submit" class="form-control input-md btn-orange" value="Update">
						</div>
                    <?php } ?>
                    </form>
                </div>
            </div>
            </div>
        </div>
</div>
