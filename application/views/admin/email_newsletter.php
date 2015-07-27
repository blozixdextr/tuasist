<script type="text/javascript" src="<?php echo base_url();?>js/nicEdit-latest.js"></script> <script type="text/javascript">
	//<![CDATA[
		bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
	//]]>
</script>
<div class="box">
	<div class="box-header">
		<ul class="nav nav-tabs nav-tabs-left">
			<li class="active"><a href="#list" data-toggle="tab"><i class="icon-align-justify"></i> Subscription List</a></li>
			<li><a href="#email" data-toggle="tab"><i class="icon-align-justify"></i> Email List</a></li>
			<li><a href="#add" data-toggle="tab"><i class="icon-plus"></i> Send Email</a></li>
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
									<th><div>Email</div></th>
									<th><div>Options</div></th>
								</tr>
							</thead>
							<tbody>
								<?php $count = 1;foreach($emails as $email):?>
								<tr>
									<td><?php echo $count++;?></td>
									<td><?php echo $email['email'];?></td>
									<td align="center">										
										<a data-toggle="modal" href="#modal-delete" onclick="modal_delete('<?php echo base_url();?>admin/email_newsletter/delete/<?php echo $email['email_newsletter_id'];?>')" class="btn btn-red btn-small"><i class="icon-trash"></i> Delete</a>
									</td>
								</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
						</div>
					</div>
				</div>
			</div>
			
			<div class="tab-pane box" id="email" style="padding: 5px">
				<div class="box">
					<div class="box-content">
						<div id="dataTables">
						<table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">
							<thead>
								<tr>
									<th><div>ID&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div></th>
									<th><div>Subject</div></th>
									<th><div>Title</div></th>
									<th><div>Content</div></th>
									<th><div>Options</div></th>
								</tr>
							</thead>
							<tbody>
								<?php $count = 1;foreach($send_mails as $send_mail):?>
								<tr>
									<td><?php echo $count++;?></td>
									<td><?php echo $send_mail['subject'];?></td>
									<td><?php echo $send_mail['title'];?></td>
									<td><?php echo $send_mail['content'];?></td>
									<td align="center">										
										<a data-toggle="modal" href="#modal-form" onclick="modal('edit_email_newsletter',<?php echo $send_mail['email_message_id'];?>)" class="btn btn-gray btn-small"><i class="icon-wrench"></i> Update (or) Send E-Mail</a>
										<a data-toggle="modal" href="#modal-delete" onclick="modal_delete('<?php echo base_url();?>admin/email_newsletter/delete_mail_send/<?php echo $send_mail['email_message_id'];?>')" class="btn btn-red btn-small"><i class="icon-trash"></i> Delete </a>
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
                    <form method="post" action="<?php echo base_url();?>admin/email_newsletter/mail_send/" class="form-horizontal validatable" enctype="multipart/form-data">
                        <div class="padded">
                            <div class="control-group">
                                <label class="control-label">Subject</label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="subject"/>
                                </div>
                            </div>
							<div class="control-group">
                                <label class="control-label">Title</label>
                                <div class="controls">
                                    <input type="text" class="validate[required]" name="title"/>
                                </div>
                            </div>
							<div class="control-group">
                                <label class="control-label">Email Content</label>
                                <div class="controls">
									<textarea name="content" style="width: 500px; height: 250px;" class="validate[required]"></textarea>
                                </div>
                            </div>                    
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-gray">Send Mail</button>
                        </div>
                    </form>                
                </div>                
			</div>
		</div>
	</div>
</div>