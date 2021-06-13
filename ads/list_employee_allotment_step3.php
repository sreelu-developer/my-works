<?php
include_once('../database.php');
include_once('security_check_ads.php');
$wk_id=$_GET['wk_id'];
$em_id=$_GET['em_id'];

$query1="SELECT `wk_id`, `pw_id`, `ad_id`, `wk_type`, `wk_address`, 
`wk_startdate`, `wk_finishdate`, `wk_status`, `wk_memberapplydate`, 
`wk_contract`, `wk_employeeapplystrength`, `wk_adsdate`, `wk_adsstatus`,
`wk_panchayathdate`, `wk_panchayathstatus`, `wk_aedate`, `wk_aestatus`,
`wk_employeeapprovestrength`, `wk_totalattendance`, `wk_perheadwages`,
`wk_totalcost` FROM `work` where wk_id=$wk_id";
$data1=DataBase::SelectData($query1);
$workdetails=mysqli_fetch_array($data1);

$query1="SELECT `em_id`, `pw_id`, `ad_id`, `em_firstname`, `em_lastname`, 
`em_gender`, `em_dob`, `em_emailid`, `em_mobilenumber`, `em_rationcardnumber`,
 `em_password`, `em_approvalstatus`, `em_status` FROM `employees` 
 where em_id=$em_id";
$data1=DataBase::SelectData($query1);
$employeedetails=mysqli_fetch_array($data1);

$query1="select count(*) as totalemployess from work_employee_allotment where wk_id=$wk_id";
$data3=DataBase::SelectData($query1);
$allotedemployees=mysqli_fetch_array($data3);	
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php include_once('admin_title.php'); ?>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="../assets/css/normalize.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/themify-icons.css">
    <link rel="stylesheet" href="../assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../assets/css/lib/datatable/dataTables.bootstrap.min.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="../assets/scss/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    
</head>
<body>
    <?php
    $currentmenu="employee-allotment";
     include_once('left_nav.php');
    ?>
    <div id="right-panel" class="right-panel">
        <?php include_once('../admin/top_header.php'); ?>   
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                     <div class="col-md-10 offset-md-1">
                        
                        <div class="card">
                            <form action="sqlprocess/employee_allotment_sql_process.php" method="post" autocomplete="off" >
							
							    <div class="card-header">
                                    <strong class="card-title">Confirm Employee-Work Allotment</strong>
                                    <a href="list_employee_allotment_step2.php?wk_id=<?php echo $wk_id; ?>" class="btn btn-sm btn-outline-secondary pull-right"><i class="fa fa-chevron-left"></i>&nbsp; Back</a>
                                </div>
                                <div class="card-body">
                                   <div class="row">
										<div class="form-group col-md-6">
											<label class="control-label mb-1">Employee Name</label>
											<input value="<?php echo $employeedetails['em_firstname'].' '.$employeedetails['em_lastname']; ?>" type="text"  class="form-control" readonly />
										</div>
										<div class="form-group col-md-6">
											<label class="control-label mb-1">Work Type</label>
											<input type="text" value="<?php echo $workdetails['wk_type']; ?>" class="form-control" readonly />
										</div>
										<div class="form-group col-md-6">
											<label class="control-label mb-1">Approved Strength</label>
											<input type="text" value="<?php echo $workdetails['wk_employeeapprovestrength']; ?>" class="form-control" readonly />
										</div>
										<div class="form-group col-md-6">
											<label class="control-label mb-1">Alloted Strength</label>
											<input type="text" value="<?php echo $allotedemployees['totalemployess']; ?>" class="form-control" readonly />
										</div>
										<div class="form-group col-md-6">
											<label class="control-label mb-1">Allotments Left</label>
											<input type="text" value="<?php echo $workdetails['wk_employeeapprovestrength']-$allotedemployees['totalemployess']; ?>" class="form-control" readonly />
										</div>
										
										<div class="form-group col-md-6 pt-4">
											<input name="wa_id" value="0" type="hidden" required/>
											<input name="mode" value="add" type="hidden" required/>
											<input name="wk_id" value="<?php echo $wk_id; ?>" type="hidden" required/>
											<input name="em_id" value="<?php echo $em_id; ?>" type="hidden" required/>
											<?php if($workdetails['wk_employeeapprovestrength']-$allotedemployees['totalemployess']>0){ ?>
											<button type="submit" class="btn btn-md btn-info pull-right ">
											<i class="fa fa-check"></i>&nbsp;Confirm Allotment
											</button>
											<?php
											}else{
											?>
											<button type="button" class="btn btn-md btn-info pull-right disabled ">
											<i class="fa fa-check"></i>&nbsp;No Slots Left
											</button>
											<?php
											}
											?>
											<a href="list_employee_allotment_step2.php?wk_id=<?php echo $wk_id; ?>" class="btn btn-md btn-outline-secondary"><i class="ti-close"></i>&nbsp; Cancel</a>
										</div>
									</div>
								</div>
								
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/plugins.js"></script>
    <script src="../assets/js/main.js"></script>

    <script src="../assets/js/lib/data-table/datatables.min.js"></script>
    <script src="../assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="../assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="../assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="../assets/js/lib/data-table/jszip.min.js"></script>
    <script src="../assets/js/lib/data-table/pdfmake.min.js"></script>
    <script src="../assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="../assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="../assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="../assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="../assets/js/lib/data-table/datatables-init.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
        } );
    </script>
    
</body>
</html>
