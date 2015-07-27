
<?php
$adminusers_info	=	$this->crud_model->get_adminusers_info($current_manage_id);
foreach($adminusers_info as $row):?>
<center>
Profile
</center>

<?php endforeach;?>