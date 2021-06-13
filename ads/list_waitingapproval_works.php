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
`wk_address`,DATE_FORMAT(wk_startdate,'%d/%M/%Y' ) AS `wk_startdate`,
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
 where wk_status='new' and wk_adsstatus='waiting' and work.ad_id=$ad_id";
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
    $currentmenu="waiting-approval";
     include_once('left_nav.php');
    ?>
    <div id="right-panel" class="right-panel">
        <?php include_once('../admin/top_header.php'); ?>   
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
					 <?php
						if(!empty($_GET['msg']) && $_GET['msg']=="aprovedsuccess"){
						?>
                  
                        <div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
                            <span class="badge badge-pill badge-primary">Success</span>
                                Work Successfully Approved
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?php
						}
						?>	
						 <?php
						if(!empty($_GET['msg']) && $_GET['msg']=="rejetedsuccess"){
						?>
                  
                        <div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
                            <span class="badge badge-pill badge-primary">Success</span>
                                Work Successfully Rejected
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?php
						}
						?>	
						
					<div class="card">
							<div class="card-header">
								<strong class="card-title">New Applied Works on Ward [ <span class="text-danger"> <?php echo $adsdetails['pw_name'].' '.$adsdetails['pw_number']; ?> </span> ]</strong>
							</div>
							<div class="card-body">
								<table id="bootstrap-data-table" class="table table-striped table-bordered">
									<thead>
									  <tr>
										<th>Work Type</th>
										<th>Address</th>
										<th>Contact</th>
										<th>ADS</th>
										<th>Apply Date</th>
										<th></th>
									  </tr>
									</thead>
									<tbody>
										<?php
										while($row1=mysqli_fetch_array($data1)){
								          ?>
										<tr>
											<td><?php echo $row1['wk_type']?></td>
											<td><?php echo $row1['wk_address']?></td>
											<td><?php echo $row1['wk_contract']?></td>
											<td><?php echo $row1['ad_firstname'].' '.$row1['ad_lastname']?></td>
											<td><?php echo $row1['wk_memberapplydate']?></td>
											<td class="text-right" style='width:143px;'>
												<a href="sqlprocess/work_approval_sql_process.php?wk_id=<?php echo $row1['wk_id']?>&mode=approved" class="btn btn-sm btn-outline-primary">Approve</a>
												<a href="sqlprocess/work_approval_sql_process.php?wk_id=<?php echo $row1['wk_id']?>&mode=rejected" class="btn btn-sm btn-outline-danger">Reject</a>
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
