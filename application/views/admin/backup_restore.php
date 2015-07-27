<div class="box">
	<div class="box-header">
    
    	<!------CONTROL TABS START------->
		<ul class="nav nav-tabs nav-tabs-left">
			<li class="active">
            	<a href="#backup" data-toggle="tab"><i class="icon-align-justify"></i> 
					Backup
                    	</a></li>
			<li class="">
            	<a href="#restore" data-toggle="tab"><i class="icon-align-justify"></i> 
					Restore
                    	</a></li>
		</ul>
    	<!------CONTROL TABS END------->
        
	</div>
	<div class="box-content padded">
		<div class="tab-content">            
            <!----TABLE LISTING STARTS--->
            <div class="tab-pane box active span7" id="backup">
				<center>
                <table cellpadding="0" cellspacing="0" border="0" class="table table-normal" >
                    <tbody>
                    <?php 
					$tables = $this->db->list_tables();
					foreach ($tables as $type):
					?>
					<tr>
								<td><?php echo $type;?></td>
								<td align="center"><a href="<?php echo base_url();?>admin/backup_restore/create/<?php echo $type;?>" 
										class="btn btn-gray" rel="tooltip" data-original-title="download backup"><i class="icon-download-alt" ></i>
											Download Backup</a>
									<a href="<?php echo base_url();?>admin/backup_restore/delete/<?php echo $type;?>" 
										class="btn btn-red" rel="tooltip" data-original-title="delete data" onclick="return confirm('delete confirm?');"><i class="icon-trash"></i>
											Delete / Truncate</a></td>
                    </tr>
					<?php 
					endforeach;
					?></tbody>
                </table>
                </center>
			</div>
            <!----TABLE LISTING ENDS--->
            
            <!----RESTORE--->
            <div class="tab-pane box  span6" id="restore">
				<?php echo form_open(base_url().'admin/backup_restore/restore' , array('enctype' => 'multipart/form-data'));?>
                    <input name="userfile" type="file" />
                    <br /><br />
                    <center><input type="submit" class="btn btn-blue" value="<?php echo 'Restore';?>" /></center>
                    <br />
                </form>
			</div>
            <!----RESTORE ENDS--->
		</div>
	</div>
</div>