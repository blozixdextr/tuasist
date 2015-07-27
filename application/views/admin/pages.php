<script type="text/javascript" src="<?php echo base_url();?>js/nicEdit-latest.js"></script> <script type="text/javascript">
	//<![CDATA[
		bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
	//]]>
</script>
<div class="box">
	<div class="box-header">
		<ul class="nav nav-tabs nav-tabs-left">
			<li class="active"><a href="#list" data-toggle="tab"><i class="icon-align-justify"></i> Pages List</a></li>
			<li><a href="#add" data-toggle="tab"><i class="icon-plus"></i> Add Page</a></li>
		</ul>
	</div>
	<div class="box-content padded">
		<div class="tab-content">
            <div class="tab-pane  active" id="list">
                <div class="box">
                    <div class="box-content">
                        <div id="dataTables">
                            <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">
                                <thead>
                                    <tr>
                                        <th><div>ID&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div></th>
                                        <th><div>Name</div></th>
                                        <th><div>Title</div></th>
                                        <th><div>Status</div></th>
                                        <th><div>Options</div></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $count = 1;
									foreach($pages as $page):?>
                                    <tr>
                                        <td><?php echo $count++;?></td>
                                        <td><?php echo $page['stpage_name'];?></td>
                                        <td><?php echo $page['stpage_title'];?></td>
										<td>
											<?php 
												switch ($page['stpage_status'])
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
                                            <a data-toggle="modal" href="#modal-form" onclick="modal('pages_edit',<?php echo $page['stpage_id'];?>)" class="btn btn-gray btn-small"><i class="icon-wrench"></i>Edit</a>
											<a data-toggle="modal" href="#modal-delete" onclick="modal_delete('<?php echo base_url();?>admin/pages/delete/<?php echo $page['stpage_id'];?>')" class="btn btn-red btn-small"><i class="icon-trash"></i> Delete</a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
						</div>
					</div>
				</div>
			</div>

			<div class="tab-pane box" id="add" style="padding: 5px">
                <div class="box-content">                	
                    <form method="post" action="<?php echo base_url();?>admin/pages/create/" class="form-horizontal validatable" enctype="multipart/form-data">
                        <div class="padded">
                            <div class="control-group">
                                <label class="control-label">Page Name</label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="stpage_name"/>
                                </div>
                            </div>
							<div class="control-group">
                                <label class="control-label">Page Title</label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="stpage_title"/>
                                </div>
                            </div>
							<div class="control-group">
                                <label class="control-label">Page Content</label>
                                <div class="controls">
									<textarea name="stpage_content" style="width: 500px; height: 250px;" class="validate[required]"></textarea>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Status</label>
                                <div class="controls">
                                    <select name="stpage_status" class="uniform" style="width:100%;">
                                      	<option value="1">Active</option>
                                    	<option value="2">Deactive</option>
                                    </select>
                                </div>
                            </div>                     
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-gray">Add Page</button>
                        </div>
                    </form>                
                </div>                
			</div>
		</div>
	</div>
</div>