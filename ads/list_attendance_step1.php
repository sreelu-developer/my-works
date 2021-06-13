<?php
include_once('security_check_ads.php');
include_once('../database.php');
$ad_id=$_COOKIE['nregs_id'];
$query1="SELECT `ad_id`, `pw_name`,pw_number, `ad_firstname`, `ad_lastname`, `ad_gender`, `ad_dob`,
 `ad_joindate`, `ad_terminatedate`, `ad_emailid`, `ad_password`, `ad_mobilenumber`,
 `ad_status` FROM `area_development_society`
  inner join panchayath_ward on panchayath_ward.pw_id=area_development_society.pw_id
 where ad_id=$ad_id";
$data2=DataBase::SelectData($query1);
$adsdetails=$row1=mysqli_fetch_array($data2);
$query1="SELECT `wk_id`,`pw_number`,`pw_name`, `ad_firstname`,`ad_lastname`,`wk_type`,
`wk_address`, DATE_FORMAT(wk_startdate,'%d/%M/%Y' ) AS `wk_startdate`,wk_startdate as wk_startdate1,
 DATE_FORMAT(wk_finishdate,'%d/%M/%Y' ) AS `wk_finishdate`, `wk_status`, 
 DATE_FORMAT(wk_memberapplydate,'%d/%M/%Y' ) AS `wk_memberapplydate`, `wk_contract`, 
 `wk_employeeapplystrength`, 
 DATE_FORMAT(wk_adsdate,'%d/%M/%Y' ) AS `wk_adsdate`, `wk_adsstatus`,
 DATE_FORMAT(wk_panchayathdate,'%d/%M/%Y' ) AS `wk_panchayathdate`,
 `wk_panchayathstatus`, 
 DATE_FORMAT(wk_aedate,'%d/%M/%Y' ) AS `wk_aedate`, `wk_aestatus`, `wk_employeeapprovestrength`,
 `wk_totalattendance`, `wk_perheadwages`, `wk_totalcost` FROM `work`
  inner join panchayath_ward on panchayath_ward.pw_id=work.pw_id 
  inner join area_development_society on area_development_society.ad_id=work.ad_id
 where wk_status='started' and work.ad_id=$ad_id";
$data1=DataBase::SelectData($query1);

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
    $currentmenu="work-attendance";
     include_once('left_nav.php');
    ?>
    <div id="right-panel" class="right-panel">
        <?php include_once('../admin/top_header.php'); ?>   
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
					 <?php
						if(!empty($_GET['msg']) && $_GET['msg']=="addsuccess"){
						?>
                        <div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
                            <span class="badge badge-pill badge-primary">Success</span>
                                Work Successfully Finished
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                         <?php
						}
						?>
					<div class="card">
							<div class="card-header">
								<strong class="card-title">Attendance Register ( Step1:- Select Work ) </strong>
							</div>
							<div class="card-body">
								<table id="bootstrap-data-table" class="table table-striped table-bordered">
									<thead>
									  <tr>
										<th>Work Type</th>
										<th>Address</th>
										<th>Start Date</th>
										<th class="text-right">Strength</th>
										<th></th>
										<th></th>
									  </tr>
									</thead>
									<tbody>
										<?php
										while($row1=mysqli_fetch_array($data1)){
										$query1="select count(*) as totalemployess from work_employee_allotment where wk_id=".$row1['wk_id'];
										$data3=DataBase::SelectData($query1);
										$allotedemployees=mysqli_fetch_array($data3);
										/*										
										if(DataBase::RowExists("work_attendance","wk_id=".$row1['wk_id'])){
											$query1="select max(wr_date) as lastworkdate from work_attendance where wk_id=".$row1['wk_id'];
											$data3=DataBase::SelectData($query1);
											$lastworkdate=mysqli_fetch_array($data3);
											$minworkdate=$lastworkdate['lastworkdate'];
										}
										else{
											$minworkdate=$row1['wk_startdate'];
										}
										*/
										$minworkdate=$row1['wk_startdate1'];
										?>
										<tr>
											<td><?php echo $row1['wk_type']?></td>
											<td><?php echo $row1['wk_address']?></td>
											<td><?php echo $row1['wk_startdate']?></td>
											<td class="text-right"><?php echo $allotedemployees['totalemployess']?></td>
											<td class="text-right" style='width:100px;'>
												<form method="GET" action="list_attendance_step2.php">
													<div class="form-group">
														<input name="wr_date" type="date" min="<?php echo $minworkdate;?>" class="form-control" required/>
													</div>
													<input name="wk_id" type="hidden"  value="<?php echo $row1['wk_id']?>" />
													<button type="submit" class="btn btn-sm btn-outline-primary"><i class="fa fa-forward"></i>&nbsp; PROCEED ATTENDANCE</button>
												</form>
											</td>
											<td class="text-right" style='width:100px;'>
												<a href="list_attendance_report_step1.php?wk_id=<?php echo $row1['wk_id']?>" class="btn btn-sm btn-outline-primary"><i class="fa fa-sticky-note"></i>&nbsp; ATTENDANCE REPORT</a>
												<a href="sqlprocess/finishwork_sql_process.php?wk_id=<?php echo $row1['wk_id']?>" class="btn btn-sm btn-outline-success mt-4"><i class="fa fa-sticky-note"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; FINISH WORK&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
											</td>
										</tr>
										<?php
										}
										?>
									</tbody>
								</table>
							</div>
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
