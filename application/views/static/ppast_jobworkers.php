<link rel="stylesheet" type="text/css" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css">
<style type="text/css">
    #DataTables_Table_0_filter {
        width: 500px;
        float: left;
    }
    .table-header {
        width: 100%;
        display: inline-block;
        margin-bottom: 20px;
    }
    .table-header .dataTables_length {
        float: right;
    }
    #DataTables_Table_0_length label .selector {
        display: none !important;
    }
    .dataTables_filter input[type='text'] {
        border: 1px solid #CCC;
        border-radius: 3px;
        padding: 3px 6px;
    }
    table.dataTable {
        width: 100%;
    }
    thead tr th div {
        text-align: center;
        font-weight: normal;
        padding: 8px;
        border-bottom: 1px solid #EAEBEF;
        border-top: 1px solid #EAEBEF;
        cursor: pointer;
    }
    table tr td {
        padding: 8px;
        border-bottom: 1px solid #EAEBEF;
    }
    table tbody tr:nth-child(even) {
        background: #F3F4F8;
    }
    table tbody tr td, thead tr th div {
        border-left: 1px solid #EAEBEF;
    }
    table tbody tr td:first-child, thead tr th:first-child div {
        border-left: none;
    }
    .sorting>div:after {
        font-family: 'FontAwesome';
        color: #666666;
        margin-left: 5px;
        content: "\f0dc";
    }
    .sorting_asc>div:after {
        font-family: 'FontAwesome';
        color: #666666;
        margin-left: 5px;
        content: "\f0de";
        top: 4px;
        position: relative; 
    }
    .sorting_desc>div:after {
        font-family: 'FontAwesome';
        color: #666666;
        margin-left: 5px;
        content: "\f0dd";
        top: -4px;
        position: relative; 
    }
    .table-footer {
        margin-top: 20px;
    }

    .table-footer .dataTables_info {
        width: 400px;
        float: left;
    }
    .table-footer .dataTables_paginate {
        float: right;
    }
    .paginate_button, .paginate_active {
        padding: 3px 8px;
        background: #EAEDF1;
        cursor: pointer;
        margin-left: 3px;
        color: #686868 !important;
        text-decoration: none !important;
        border-radius: 3px;
        border: 1px solid #EAEDF1;
    }
    .paginate_active {
        background: none;
    }
    .paginate_button_disabled, .paginate_button_disabled:hover {
        cursor: default;
        background: #eee !important;
        color: #c5c5c5 !important;
    }
    .paginate_button:hover {
        background-color: #eaeaea;
    }
</style>
<div id="content" class="container">
    
        <div class="col-xs-10 col-xs-offset-1 task-form-container whiteContainer">
            <h2>Past Jobworkers</h2>
            <div class="col-xs-12">
        <div id="dataTables">
                    <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">
                                <thead >
                                    <tr>
                                        <th><div>Job Name</div></th>
                                        <th><div>Worker id</div></th>
                                        <th><div>Worker Name</div></th>
                                         <th><div>completed date</div></th>
                                        <th><div>Options</div></th>
                                    </tr>
                                </thead>
                                <tbody>
                                 <?php  foreach($recent_jobs as $jobs):
                                 if(!empty($jobs['jaccept_workid'])){
                                ?>
                                    
                                    <tr>
                                        <td><?php echo $jobs['jname'];?></td>
                                        <td><?php echo $jobs['jaccept_workid'];?></td>
                                        <td>
                                         <?php
                                            $output = $this->db->query("SELECT * FROM users WHERE user_id=".$jobs['jaccept_workid'])->row()->full_name;
                                            echo ucfirst($output);
                                         ?>
                                        </td>
                                        <td><?php echo $jobs['jcomplete_date'];?></td>
                                     
                                     <td>
                                        <a href="<?php echo base_url();?>home/pjobworkers/<?php echo $jobs['job_id'];?>">View</a> 
                                     </td>
                                    </tr>
                                  <?php 
                                 }
                                  endforeach; ?>
                              </tbody>
            </table>
            </div>
            </div>
        </div>
    </div>
    <script>
    $(document).ready(function(){
        $($('.various').attr('href')+' form textarea').click(function(){
            console.log($(this));
/*          $(this).focus(); */
        });
        $("#DataTables_Table_0_length select").insertBefore("#DataTables_Table_0_length label .selector");
        $(".various").fancybox({
            maxWidth    : 400,
            maxHeight   : 300,
            fitToView   : false,
            width       : '70%',
            height      : '70%',
            autoSize    : false,
            closeClick  : false,
            openEffect  : 'none',
            closeEffect : 'none',
            afterShow: function() {
                $($(this).attr('href')+' form textarea').focus();
/*              $('#email').focus(); */
            }
        });
    });
    </script>