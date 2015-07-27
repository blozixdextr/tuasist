<div class="box"><br/>
	<div class="action-nav-normal">
		<div class=" action-nav-button" style="width:200px;">
		  <a href="#" title="Users">
			<img src="<?php echo base_url();?>template/images/icons/teacher.png" />
			<span><?php echo $this->db->count_all_results('countries');?>  Countries</span>
		  </a>
		</div>
		
	
		
		<div class=" action-nav-button" style="width:200px;">
		  <a href="#" title="Users">
			<img src="<?php echo base_url();?>template/images/icons/teacher.png" />
			<span><?php echo $this->db->count_all_results('states');?> States</span>
		  </a>
		</div>
		
		<div class=" action-nav-button" style="width:200px;">
		  <a href="#" title="Users">
			<img src="<?php echo base_url();?>template/images/icons/teacher.png" />
			<span><?php echo $this->db->count_all_results('cities');?> Cities</span>
		  </a>
		</div>             
    </div>
	
	<div class="box-header">
    	<!--  ----CONTROL TABS START----- -->
		<ul class="nav nav-tabs nav-tabs-left">
			<li class="active">
            	<a href="#countries" data-toggle="tab"><i class="icon-align-justify"></i> Countries</a>
			</li>
			<li class="">
            	<a href="#states" data-toggle="tab"><i class="icon-align-justify"></i> States</a>
			</li>
            <li class="">
            	<a href="#cities" data-toggle="tab"><i class="icon-align-justify"></i> Cities</a></li> 
		</ul>
    	<!--  ----CONTROL TABS END----- -->
	</div>
	
	<div class="box-content padded">
		<div class="tab-content">            
            <!--  Countries list STARTS -->
         	<div class="tab-pane  active" id="countries">
            <?php if($admin_prem !=3){?>
                  <div align="right"><a href="#add-country" data-toggle="tab"><button class="btn btn-gray">Add Country</button></a></div><?php }?>
                <div id="dataTables">
					<table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">
						<thead>
							<tr>
								<th><div>ID&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </div></th>
								<th><div>Country Name</div></th>
								<th><div>Active</div></th>
								<th>Options</th>
							</tr>
						</thead>
						<tbody>
							<?php  $count = 1;foreach($countries as $country):?>
							<tr>
								<td><?php echo $count++;?></td>
								<td><?php echo ucfirst($country['country_name']);?></td>
								<td>
								<?php 
									switch ($country['country_status'])
									{
										case '1':
											$status ='Active';
											break;
										case '2':
											$status ='DeActive';
											break;
									}
									echo $status;
								?>
								</td>
								
								<td align="center">
								  
									<a data-toggle="modal" href="#modal-form" onclick="modal('locations_country_edit',<?php echo $country['country_id'];?>)"	class="btn btn-gray btn-small">
										<i class="icon-wrench"></i>Edit
									</a>
									<a data-toggle="modal" href="#modal-delete" onclick="modal_delete('<?php echo base_url();?>admin/locations/country_delete/<?php echo $country['country_id'];?>')"
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
            <!-- --Countries list ENDS -->
            
          
            <!-- --States list -->
            <div class="tab-pane" id="states">
            <?php if($admin_prem !=3){?>
                  <div align="right"><a href="#add-state" data-toggle="tab"><button class="btn btn-gray">Add State</button></a></div><?php }?>
                <div id="dataTables">
                
                            <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">
                                <thead>
                                    <tr>
                                    	<th><div>ID&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </div></th>
                                        <th><div>Country</div></th>
                                        <th><div>State</div></th>
                                        <th><div>Active</div></th>
                                        <th>Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                       <?php  $count = 1;foreach($states as $state):?>
                                    <tr>
                                        <td><?php echo $count++;?></td>
                                        
                                        <td>
                                      <?php
										$output = $this->db->query("SELECT * FROM countries WHERE country_id=".$state['country_id'])->row()->country_name;
										echo ucfirst($output);
									  ?>
										
                                        </td>
                                                                                
                                        <td><?php echo ucfirst($state['state_name']);?></td>
                                       
                                        <td>
                                        <?php 
									
										switch ($state['state_status'])
										{
											case '1':
											$status ='Active';
											break;
											case '2':
											$status ='DeActive';
											break;
											
										}
										echo $status;?>
										
                                        </td>
                                        
                                        <td align="center">
                                          
                                            <a data-toggle="modal" href="#modal-form" onclick="modal('locations_state_edit',<?php echo $state['state_id'];?>)"	class="btn btn-gray btn-small">
                                                    <i class="icon-wrench"></i> Edit
                                            </a>
                                            <a data-toggle="modal" href="#modal-delete" onclick="modal_delete('<?php echo base_url();?>admin/locations/state_delete/<?php echo $state['state_id'];?>')"
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
            <!-- --States ENDS -->
            
            
             <!-- --Cities -->
            <div class="tab-pane" id="cities">
            <?php if($admin_prem !=3){?>
                     <div align="right"><a href="#add-city" data-toggle="tab"><button class="btn btn-gray">Add City</button></a></div><?php }?>
                <div id="dataTables">
                
                            <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">
                                <thead>
                                    <tr>
                                    	<th><div>ID&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </div></th>
                                        <th><div>Country </div></th>
                                        <th><div>State</div></th>
                                        <th><div>City</div></th>
                                        <th><div>Active</div></th>
                                        <th>Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     <?php  $count = 1;foreach($cities as $city):?>
                                    <tr>
                                        <td><?php echo $count++;?></td>
                                     	<td>
                                      <?php 
										$country_op = $this->db->query("SELECT * FROM states WHERE state_id=".$city['state_id'])->row()->country_id;
										$output = $this->db->query("SELECT * FROM countries WHERE country_id=".$country_op)->row()->country_name;
										echo ucfirst($output);
									  ?>   
                                      </td>
                                      <td>
                                       <?php 
										$output = $this->db->query("SELECT * FROM states WHERE state_id=".$city['state_id'])->row()->state_name;
										echo ucfirst($output);
									  ?>
                                      </td>                                  
                                                                                
                                        <td><?php echo ucfirst($city['city_name']);?></td>
                                       
                                        <td>
                                        <?php 
									
										switch ($city['city_status'])
										{
											case '1':
											$status ='Active';
											break;
											case '2':
											$status ='DeActive';
											break;
											
										}
										echo $status;?>
										
                                        </td>
                                        
                                        <td align="center">
                                          
                                            <a data-toggle="modal" href="#modal-form" onclick="modal('locations_city_edit',<?php echo $city['city_id'];?>)"	class="btn btn-gray btn-small">
                                                    <i class="icon-wrench"></i> Edit
                                            </a>
                                            <a data-toggle="modal" href="#modal-delete" onclick="modal_delete('<?php echo base_url();?>admin/locations/city_delete/<?php echo $city['city_id'];?>')"
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
            <!-- --Cities ENDS -->
              <!-- --CREATION FORM STARTS (country)- -->
			<div class="tab-pane box" id="add-country" style="padding: 5px">
                <div class="box-content">
 				<b><u>Add Country</u></b>
                <?php //echo form_open(base_url().'admin/admin_users/create' , array('class' => 'form-horizontal validatable','target'=>'_top', 'enctype' => 'multipart/form-data'));?>
                <form method="post" action="<?php echo base_url();?>admin/locations/country_create/" class="form-horizontal validatable" enctype="multipart/form-data">    
					<div class="padded">
						<div class="control-group">
							<label class="control-label">Country Name</label>
							<div class="controls">
								<input type="text" class="validate[required]" name="country_name"/>
							</div>
						</div>
                          <div class="control-group">
                                <label class="control-label">Country Image</label>
                                 <div class="controls" style="width:210px;">
                                     <input name="country_image" type="file"/>
                                </div>
                            </div>
						
						 <div class="control-group">
							<label class="control-label">Status</label>
							<div class="controls">
								<select name="status" class="uniform" style="width:100%;">
									<option value="1">Active</option>
									<option value="2">Deactive</option>
								</select>
							</div>
						</div> 
					</div>               
					<button type="submit" class="btn btn-gray">Add country</button>
				</form>	
                </div>
            </div>
            <!--  country form end -->
              <!-- --CREATION FORM STARTS (country)- -->
			<div class="tab-pane box" id="add-state" style="padding: 5px">
                <div class="box-content">
 				<b><u>Add State</u></b>
                <?php //echo form_open(base_url().'admin/admin_users/create' , array('class' => 'form-horizontal validatable','target'=>'_top', 'enctype' => 'multipart/form-data'));?>
                <form method="post" action="<?php echo base_url();?>admin/locations/state_create/" class="form-horizontal validatable" enctype="multipart/form-data">    
					<div class="padded">
					   <div class="control-group">
							<label class="control-label">State Name</label>
							<div class="controls">
								<input type="text" class="validate[required]" name="state_name"/>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Country Name</label>
							<div class="controls">
								<select name="country_id" class="uniform" style="width:100%;">
                                	<option value="0" >--Select--</option>
									<?php foreach($countries as $country){?>
									<option value="<?php echo $country['country_id'];?>">
										<?php echo ucfirst($country['country_name']);?>
									</option>
									<?php } ?> 
								</select>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Status</label>
							<div class="controls">
								<select name="state_status" class="uniform" style="width:100%;">
									<option value="1">Active</option>
									<option value="2">Deactive</option>
								</select>
							</div>
						</div>      
					</div>
					<button type="submit" class="btn btn-gray">Add state</button>
                </form>    
                </div>
            </div>
            <!--  country form end -->
              <!-- --CREATION FORM STARTS (country)- -->
			<div class="tab-pane box" id="add-city" style="padding: 5px">
                <div class="box-content">
 				<b><u>Add City</u></b>
                <?php //echo form_open(base_url().'admin/admin_users/create' , array('class' => 'form-horizontal validatable','target'=>'_top', 'enctype' => 'multipart/form-data'));?>
                <form method="post" action="<?php echo base_url();?>admin/locations/city_create/" class="form-horizontal validatable" enctype="multipart/form-data">    
					<div class="padded">
						<div class="control-group">
							<label class="control-label">City Name</label>
							<div class="controls">
								<input type="text" class="validate[required]" name="city_name"/>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Country Name</label>
							<div class="controls">
								<select name="country_id" class="uniform" style="width:100%;">
                                <option value="0">--Select--</option>
									<?php  $count = 1;foreach($countries as $country):?>
									<option value="<?php echo $country['country_id'];?>">
										<?php echo ucfirst($country['country_name']);?>
									</option>
									<?php endforeach; ?> 
								</select>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">State Name</label>
							<div class="controls">
								<select name="state_id" class="uniform" style="width:100%;">
                                <option value="0">--Select--</option>
									<?php  $count = 1;foreach($states as $state):?>
									<option value="<?php echo $state['state_id'];?>">
										<?php echo ucfirst($state['state_name']);?>
									</option>
									<?php endforeach; ?> 
								</select>
							</div>
						</div>                            
						<div class="control-group">
							<label class="control-label">Status</label>
							<div class="controls">
								<select name="city_status" class="uniform" style="width:100%;">
									<option value="1">Active</option>
									<option value="2">Deactive</option>
								</select>
							</div>
						</div>                              
					</div>
					<button type="submit" class="btn btn-gray">Add City</button>
                </form>    
                </div>
            </div>
            <!--  city form end -->
		</div>
	</div>
</div>