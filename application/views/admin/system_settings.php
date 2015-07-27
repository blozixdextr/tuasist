<div class="box">
	<div class="box-header">
    
    	<!------CONTROL TABS START------->
		<ul class="nav nav-tabs nav-tabs-left">
			<li class="active">
            	<a href="#site" data-toggle="tab"><i class="icon-align-justify"></i> 
					Site Controller
                    	</a></li>
            <li class="">
            	<a href="#offline" data-toggle="tab"><i class="icon-align-justify"></i> 
					Offline Message
                    	</a></li>
            <li class="">
                <a href="#mail" data-toggle="tab"><i class="icon-align-justify"></i> 
                   Mail Settings
                        </a></li>
			<li class="">
            	<a href="#meta" data-toggle="tab"><i class="icon-align-justify"></i> 
					Meta Tags
                    	</a></li>
            <li class="">
            	<a href="#slideshow" data-toggle="tab"><i class="icon-align-justify"></i> 
					Slide Show
                    	</a></li>  
            <li class="">
            	<a href="#seo" data-toggle="tab"><i class="icon-align-justify"></i> 
					SEO
                    	</a></li>               
            <li class="">
            	<a href="#facebook" data-toggle="tab"><i class="icon-align-justify"></i> 
					Face book
                    	</a></li>
            <li class="">
            	<a href="#social_network" data-toggle="tab"><i class="icon-align-justify"></i> 
					Social Network
                    	</a></li>  
             
                        
                     
		</ul>
    	<!------CONTROL TABS END------->
        
	</div>
	<div class="box-content padded">
		<div class="tab-content">            
            <!----Site settings STARTS--->
            <div class="tab-pane box active span7" id="site">
            	
            	<center>
                  <?php echo form_open(base_url().'admin/system_settings/admin/do_update/' , array('class' => 'form-horizontal validatable','target'=>'_top', 'enctype' => 'multipart/form-data'));?>
                <table cellpadding="0" cellspacing="0" border="0" class="table table-normal" >
                <tr>
								<td><label class="control-label"><strong>Site Online</strong></label></td>
                                <td><select name="site_online" class="uniform" style="width:100%;">
                                    	<option value="1"
                                        <?php
										$output = $this->db->query("SELECT * FROM sitesettings WHERE type='site_online'")->row()->description;
										if($output ==1){echo "selected='selected'";}
									    ?>
                                         >Yes</option>
                                    	<option value="2"
                                        <?php
										$output = $this->db->query("SELECT * FROM sitesettings WHERE type='site_online'")->row()->description;
										if($output ==2){echo "selected='selected'";}
									    ?>
                                        >No</option>
                                    </select>
                                </td>
                </tr>
               
                
                <tr>
								<td><label class="control-label"><strong>Site Name</strong></label></td>
                                <td><input type="text" class="validate[required]" name="site_name" 
                                value='<?php
										echo $output = $this->db->query("SELECT * FROM sitesettings WHERE type='site_name'")->row()->description;
									    ?>'/>
                                </td>
                </tr>
                <tr>
								<td><label class="control-label"><strong>Slogan</strong></label></td>
                                <td><input type="text" class="" name="site_slogan"
                                value='<?php
										echo $output = $this->db->query("SELECT * FROM sitesettings WHERE type='site_slogan'")->row()->description;
									    ?>'/>
                                </td>
                </tr>
                <tr>
								<td><label class="control-label"><strong>Slogan Enable</strong></label></td>
                                <td><select name="site_slogan_Enable" class="uniform" style="width:100%;">
                                    	<option value="1"
                                        <?php
										$output = $this->db->query("SELECT * FROM sitesettings WHERE type='site_slogan_Enable'")->row()->description;
										if($output ==1){echo "selected='selected'";}
									    ?>
                                         >Yes</option>
                                    	<option value="2"
                                        <?php
										$output = $this->db->query("SELECT * FROM sitesettings WHERE type='site_slogan_Enable'")->row()->description;
										if($output ==2){echo "selected='selected'";}
									    ?>
                                        >No</option>
                                    </select>
                                </td>
                </tr>
                
                 <tr>
								<td><label class="control-label"><strong>Site Logo</strong></label></td>
                                <td><input type="file" name="site_logo"/>
                                </td>
                </tr>
                
                 <?php
				 	$output="";
					$output = $this->db->query("SELECT * FROM sitesettings WHERE type='site_logo'")->row()->description;
					if(!empty ($output)){
						echo "<tr><td>Site Logo Preview</td><td><img src='".base_url()."uploads/".$output."'/><br>
						<input type='checkbox'  name='clr_site_logo' value='clear'/>Clear</td></tr>";
					}
				 ?>
                
                
                 <tr>
								<td><label class="control-label"><strong>Site favicon</strong></label></td>
                                <td><input type="file" name="site_favicon"/>
                                </td>
                </tr>
                 <?php
				 	$output="";
					$output = $this->db->query("SELECT * FROM sitesettings WHERE type='site_favicon'")->row()->description;
					if(!empty ($output)){
						echo "<tr><td>Site Favicon Preview</td><td><img src='".base_url()."uploads/".$output."'/><br>
						<input type='checkbox'  name='clr_site_favicon' value='clear'/>Clear</td></tr>";
					}
				 ?>
                
                </table>
              <div class="form-actions">
                            <button type="submit" class="btn btn-gray">Update</button>
                        </div>
     </form>
                </center>
                
			</div>
            <!----Site Settings ENDS--->
            
            <!----Meta tags--->
            <div class="tab-pane box  span6" id="meta">
					<center>
                     <?php echo form_open(base_url().'admin/system_settings/admin/do_update/');?>
                <table cellpadding="0" cellspacing="0" border="0" class="table table-normal" >
                <tr>
								<td><label class="control-label"><strong>Title</strong></label></td>
                                <td><input type="text" class="validate[required]" name="site_title"
                                value='<?php
										echo $output = $this->db->query("SELECT * FROM sitesettings WHERE type='site_title'")->row()->description;
									    ?>'/>
                                </td>
                </tr>
                
                <tr>
								<td><label class="control-label"><strong>Keywords</strong></label></td>
                                <td><textarea name="site_keywords"><?php
										echo trim($output = $this->db->query("SELECT * FROM sitesettings WHERE type='site_keywords'")->row()->description);
									    ?></textarea>
                                </td>
                </tr>
                
                 <tr>
								<td><label class="control-label"><strong>Description</strong></label></td>
                                <td><textarea name="site_description"><?php
										echo trim($output = $this->db->query("SELECT * FROM sitesettings WHERE type='site_description'")->row()->description);
									    ?></textarea>
                                </td>
                </tr>
                
                </table>
               <div class="form-actions">
                            <button type="submit" class="btn btn-gray">Update</button>
                        </div>
     </form>
                </center>
			</div>
            <!----Meta tags ENDS--->
            <!----Face book--->
            <div class="tab-pane box  span6" id="facebook">
				<center>
                  <?php echo form_open(base_url().'admin/system_settings/admin/do_update/');?>
                <table cellpadding="0" cellspacing="0" border="0" class="table table-normal" >
                <tr>
								<td><label class="control-label"><strong>Facebook Login Enable</strong></label></td>
                                <td><select name="facebook_status" class="uniform" style="width:100%;">
                                    	<option value="1"
                                        <?php
										$output = $this->db->query("SELECT * FROM sitesettings WHERE type='facebook_status'")->row()->description;
										if($output ==1){echo "selected='selected'";}
									    ?>
                                         >Yes</option>
                                    	<option value="2"
                                        <?php
										$output = $this->db->query("SELECT * FROM sitesettings WHERE type='facebook_status'")->row()->description;
										if($output ==2){echo "selected='selected'";}
									    ?>
                                        >No</option>
                                    </select>
                                </td>
                </tr>
                
                <tr>
								<td><label class="control-label"><strong>Facebook Profile Full URL</strong></label></td>
                                <td><textarea name="facebook_profile"><?php
										echo trim($output = $this->db->query("SELECT * FROM sitesettings WHERE type='facebook_profile'")->row()->description);
									    ?></textarea>
                                </td>
                </tr>
             
                <tr>
								<td><label class="control-label"><strong>Facebook Application API Key </strong></label></td>
                                <td><input type="text" class="validate[required]" name="facebook_apikey"
                                value='<?php
										echo $output = $this->db->query("SELECT * FROM sitesettings WHERE type='facebook_apikey'")->row()->description;
									    ?>'/>
                                </td>
                </tr>
                <tr>
								<td><label class="control-label"><strong>Facebook Application Secret Key </strong></label></td>
                                <td><input type="text" class="validate[required]" name="facebook_applicationkey"
                                value='<?php
										echo $output = $this->db->query("SELECT * FROM sitesettings WHERE type='facebook_applicationkey'")->row()->description;
									    ?>'/>
                                </td>
                </tr>
                
                </table>
            <div class="form-actions">
                            <button type="submit" class="btn btn-gray">Update</button>
                        </div>
     </form>
                </center>
			</div>
            <!----Face book ENDS--->
            
            
             <!----SEO--->
            <div class="tab-pane box  span6" id="seo">
				<center>
                  <?php echo form_open(base_url().'admin/system_settings/admin/do_update/');?>
                <table cellpadding="0" cellspacing="0" border="0" class="table table-normal" >
                <tr>
								<td><label class="control-label"><strong>SEO Enable</strong></label></td>
                                <td><select name="seo_status" class="uniform" style="width:100%;">
                                    	<option value="1"
                                        <?php
										$output = $this->db->query("SELECT * FROM sitesettings WHERE type='seo_status'")->row()->description;
										if($output ==1){echo "selected='selected'";}
									    ?>
                                         >Yes</option>
                                    	<option value="2"
                                        <?php
										$output = $this->db->query("SELECT * FROM sitesettings WHERE type='seo_status'")->row()->description;
										if($output ==2){echo "selected='selected'";}
									    ?>
                                        >No</option>
                                    </select>
                                </td>
                </tr>
                
                <tr>
								<td><label class="control-label"><strong>SEO</strong></label></td>
                                <td><textarea name="seo_info"><?php
										echo trim($output = $this->db->query("SELECT * FROM sitesettings WHERE type='seo_info'")->row()->description);
									    ?></textarea>
                                </td>
                </tr>
             	
                
                </table>
            <div class="form-actions">
                            <button type="submit" class="btn btn-gray">Update</button>
                        </div>
     </form>
                </center>
			</div>
            <!----SEO ENDS--->
            
             <!----Offline Message--->
            <div class="tab-pane box  span6" id="offline">
              <?php echo form_open(base_url().'admin/system_settings/admin/do_update/');?>
               <table cellpadding="0" cellspacing="0" border="0" class="table table-normal" >
                <tr>
                    <td valign="top"><label class="control-label"><strong>Offline</strong></label></td> 
                    <td> <textarea name="site_offline_mess" rows="10" cols="100"><?php
                            echo trim($output = $this->db->query("SELECT * FROM sitesettings WHERE type='site_offline_mess'")->row()->description);
                            ?></textarea></td>  
                </tr>
                </table>                           
                                
                             <div class="form-actions">
                            <button type="submit" class="btn btn-gray">Update</button>
                        </div>
     </form>
                            		</div>
            <!----Offline Message ENDS--->
            
             <!----slideshow--->
            <div class="tab-pane" id="slideshow">
            	<div class="tab-pane box  span6">
			
            	<center>
                  <?php echo form_open(base_url().'admin/system_settings/admin/do_update/');?>
                <table cellpadding="0" cellspacing="0" border="0" class="table table-normal" >
                <tr>
								<td><label class="control-label"><strong>Slide Show Enabled</strong></label></td>
                                <td><select name="site_slideshow_Enable" class="uniform" style="width:100%;">
                                    	<option value="1"
                                        <?php
										$output = $this->db->query("SELECT * FROM sitesettings WHERE type='site_slideshow_Enable'")->row()->description;
										if($output ==1){echo "selected='selected'";}
									    ?>
                                         >Yes</option>
                                    	<option value="2"
                                        <?php
										$output = $this->db->query("SELECT * FROM sitesettings WHERE type='site_slideshow_Enable'")->row()->description;
										if($output ==2){echo "selected='selected'";}
									    ?>
                                        >No</option>
                                    </select>
                                </td>
                </tr>
                
               
                </table>
              <div class="form-actions">
                            <button type="submit" class="btn btn-gray">Update</button>
                        </div>
     </form>
                    
                </center>
                </div>
            
                <div id="dataTables">
               
                            <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">
                                <thead>
                                 <tr>
                                  <th colspan="4" align="left"> <div align="right"><a href="#add-image" data-toggle="tab"><button class="btn btn-gray">Add Image</button></a></div></th>
                                    </tr>
                                    <tr>
                                        <th><div>ID &nbsp;</div></th>
                                      	<th><div>Image Name</div></th>
                                        <th><div>Description</div></th>
                                        <th><div>Options</div></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php  $count = 1;foreach($slideshows as $row):?>
                                    <tr>
                                        <td><?php echo $count++;?></td>
                                        
                                        <td><?php echo $row['slideshow_title'];?></td>
                                        <td><?php echo $row['slideshow_description'];?></td>
                                        <td align="center"><a data-toggle="modal" href="#modal-delete" onclick="modal_delete('<?php echo base_url();?>admin/system_settings/image_delete/<?php echo $row['slideshow_id'];?>')"
                                                 class="btn btn-red btn-small">
                                                    <i class="icon-trash"></i> Delete
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            </div>
			</div>
           
            <!----slideshow ENDS--->
            
             <!----Social Network--->
            <div class="tab-pane box  span6" id="social_network">
					<center>
                     <?php echo form_open(base_url().'admin/system_settings/admin/do_update/');?>
                <table cellpadding="0" cellspacing="0" border="0" class="table table-normal" >
                <tr>
								<td><label class="control-label"><strong>Facebook link</strong></label></td>
                                <td><textarea name="facebook_link"><?php echo trim($output = $this->db->query("SELECT * FROM sitesettings WHERE type='facebook_link'")->row()->description); ?></textarea>
                                </td>
                </tr>
                
                <tr>
								<td><label class="control-label"><strong>Twitter Link</strong></label></td>
                                <td><textarea name="twitter_link"><?php
										echo trim($output = $this->db->query("SELECT * FROM sitesettings WHERE type='twitter_link'")->row()->description);
									    ?></textarea>
                                </td>
                </tr>
                
                 <tr>
								<td><label class="control-label"><strong>Other Link</strong></label></td>
                                <td><textarea name="other_link"><?php
										echo trim($output = $this->db->query("SELECT * FROM sitesettings WHERE type='other_link'")->row()->description);
									    ?></textarea>
                                </td>
                </tr>
               <!--   <tr>
								<td><label class="control-label"><strong>Other Link Image</strong></label></td>
                                <td><input type="file" name="other_link_image"/>
                                </td>
                </tr>
                
                 <?php
				 	$output="";
					$output = $this->db->query("SELECT * FROM sitesettings WHERE type='other_link_image'")->row()->description;
					if(!empty ($output)){
						echo "<tr><td>Otherlink Image Preview</td><td><img src='".base_url()."uploads/".$output."'/><br>
						<input type='checkbox'  name='clr_other_link' value='clear'/>Clear</td></tr>";
					}
				 ?>-->
                
                </table>
               <div class="form-actions">
                            <button type="submit" class="btn btn-gray">Update</button>
                        </div>
     </form>
                </center>
			</div>
            <!----Social Network--->
            <!----mail--->
            <div class="tab-pane box  span6" id="mail">
                    <center>
                     <?php echo form_open(base_url().'admin/system_settings/admin/do_update/');?>
                <table cellpadding="0" cellspacing="0" border="0" class="table table-normal" >
                <tr>
                                <td><label class="control-label"><strong>Mailgun API Key</strong></label></td>
                                <td><textarea name="mailgun_apikey"><?php echo trim($output = $this->db->query("SELECT * FROM sitesettings WHERE type='mailgun_apikey'")->row()->description); ?></textarea>
                                </td>
                </tr>
                 <tr>
                                <td><label class="control-label"><strong>Mailgun version</strong></label></td>
                                <td><textarea name="mailgun_version"><?php echo trim($output = $this->db->query("SELECT * FROM sitesettings WHERE type='mailgun_version'")->row()->description); ?></textarea>
                                </td>
                </tr>
                 <tr>
                                <td><label class="control-label"><strong>Mailgun Domain Name</strong></label></td>
                                <td><textarea name="mailgun_domain"><?php echo trim($output = $this->db->query("SELECT * FROM sitesettings WHERE type='mailgun_domain'")->row()->description); ?></textarea>
                                </td>
                </tr>
                 <tr>
                                <td><label class="control-label"><strong>From Email</strong></label></td>
                                <td><textarea name="mailgun_fromemail"><?php echo trim($output = $this->db->query("SELECT * FROM sitesettings WHERE type='mailgun_fromemail'")->row()->description); ?></textarea>
                                </td>
                </tr>
                 <tr>
                                <td><label class="control-label"><strong>Reply to Email</strong></label></td>
                                <td><textarea name="mailgun_replyemail"><?php echo trim($output = $this->db->query("SELECT * FROM sitesettings WHERE type='mailgun_replyemail'")->row()->description); ?></textarea>
                                </td>
                </tr>
                      
                </table>
               <div class="form-actions">
                            <button type="submit" class="btn btn-gray">Update</button>
                        </div>
     </form>
                </center>
            </div>
            <!----mail--->

            
            <!----CREATION FORM STARTS (Add slide image)---->
             
			<div class="tab-pane box span7" id="add-image" style="padding: 5px">
                <div class="box-content">
 				<b><u>Add Slide Image</u></b>
                <div class="alert alert-danger">
					<strong>NOTE :</strong> Upload the image size  width = 1126, height = 386 & image format is jpg only
  			    </div>
                <?php echo form_open(base_url().'admin/system_settings/add_side' , array('class' => 'form-horizontal validatable','target'=>'_top', 'enctype' => 'multipart/form-data'));?>
                  
                          <table cellpadding="0" cellspacing="0" border="0" class="table table-normal" >
                <tr>
                             <td><label class="control-label">Title</label></td>
                             <td><input type="text" class="validate[required]" name="slideshow_title"/></td>
                </tr>
                 <tr>
                             <td><label class="control-label">Description</label></td>
                             <td> <textarea name="slideshow_description" class="validate[required]"></textarea></td>
                </tr>
                 <tr>
                             <td> <label class="control-label">Upload Image</label></td>
                             <td> <input name="slideshow_image" type="file"/></td>
                </tr>
                </table>      
                       <div class="form-actions">
                            <button type="submit" class="btn btn-gray">Add</button>
                        </div>
                    </form>    
                
                </div>
            </div>
            <!-- Add slide image form end -->
            
		</div>
	</div>
    
      
</div>