<?php
include_once('security_check_member.php');
include_once('../database.php');
$wk_id=$_GET['wk_id'];
$query1="SELECT `wk_id`,`pw_number`,`pw_name`, `ad_firstname`,`ad_lastname`,`wk_type`,
`wk_address`, `wk_startdate`,
 `wk_finishdate`, `wk_status`, `wk_memberapplydate`, `wk_contract`, 
 `wk_employeeapplystrength`, `wk_adsdate`, `wk_adsstatus`, `wk_panchayathdate`,
 `wk_panchayathstatus`, `wk_aedate`, `wk_aestatus`, `wk_employeeapprovestrength`,
 `wk_totalattendance`, `wk_perheadwages`, `wk_totalcost` FROM `work`
  inner join panchayath_ward on panchayath_ward.pw_id=work.pw_id 
  inner join area_development_society on area_development_society.ad_id=work.ad_id
 where wk_id=$wk_id";
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
    $currentmenu="";
     include_once('left_nav.php');
    ?>
    <div id="right-panel" class="right-panel">
        <?php include_once('../admin/top_header.php'); ?>   
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
					 
					<div class="card">
							<div class="card-header">
								<strong class="card-title">Work Details</strong>
							</div>
							<div class="card-body">
								
										<?php
										$row1=mysqli_fetch_array($data1);
																				  $query1="SELECT `wk_id`,`pw_number`,`pw_name`, `ad_firstname`,`ad_lastname`,`wk_type`,
`wk_address`, `wk_startdate`,
 `wk_finishdate`, `wk_status`, `wk_memberapplydate`, `wk_contract`, 
 `wk_employeeapplystrength`, `wk_adsdate`, `wk_adsstatus`, `wk_panchayathdate`,
 `wk_panchayathstatus`, `wk_aedate`, `wk_aestatus`, `wk_employeeapprovestrength`,
 `wk_totalattendance`, `wk_perheadwages`, `wk_totalcost` FROM `work`
  inner join panchayath_ward on panchayath_ward.pw_id=work.pw_id 
  inner join area_development_society on area_development_society.ad_id=work.ad_id
 where wk_id=$wk_id";
								          ?>
									<table class="table table-striped border w-50" style="float:left;">
										<tbody>
										<tr>
										  <th scope="row">Ward Details</th>
										  <td><?php echo $row1['pw_name']; ?>, <?php echo $row1['pw_number']; ?></td>
										</tr>
										<tr>
										  <th scope="row">Ads Details</th>
										  <td><?php echo $row1['ad_firstname']; ?> <?php echo $row1['ad_lastname']; ?></td>
										</tr>
										<tr>
										  <th scope="row">Work Type</th>
										  <td><?php echo $row1['wk_type']; ?></td>
										</tr>
										<tr>
										  <th scope="row">Work Address</th>
										  <td><?php echo $row1['wk_address']; ?></td>
										</tr>
										<tr>
										  <th scope="row">Contact Number</th>
										  <td><?php echo $row1['wk_contract']; ?></td>
										</tr>
										<tr>
										  <th scope="row">Work Apply Date</th>
										  <td><?php echo $row1['wk_memberapplydate']; ?></td>
										</tr>
										<tr>
										  <th scope="row">Work Start Date</th>
										  <td><?php echo $row1['wk_startdate']; ?></td>
										</tr>
										<tr>
										  <th scope="row">Work Finish Date</th>
										  <td><?php echo $row1['wk_finishdate']; ?></td>
										</tr>
										<tr>
										  <th scope="row">Applied Employee Strength</th>
										  <td><b class="text-primary"><?php echo $row1['wk_employeeapplystrength']; ?></b></td>
										</tr>
										<tr>
										  <th scope="row">WorkStatus</th>
										  <td><b class="text-primary"><?php echo $row1['wk_status']; ?></b></td>
										</tr>
									</tbody>
								</table>
								<table class="table table-striped border w-50 " style="float:left;">
										<tbody>
										<tr>
										  <th scope="row">ADS Approval Date</th>
										  <td><?php echo $row1['wk_adsdate']; ?></td>
										</tr>
										<tr>
										  <th scope="row">ADS Approval Status</th>
										  <td><?php echo $row1['wk_adsstatus']; ?></td>
										</tr>
										<tr>
										  <th scope="row">Panchayath Approval Date</th>
										  <td><?php echo $row1['wk_panchayathdate']; ?></td>
										</tr>
										<tr>
										  <th scope="row">Panchayath Approval Status</th>
										  <td><?php echo $row1['wk_panchayathstatus']; ?></td>
										</tr>
										<tr>
										  <th scope="row">Work Apply Date</th>
										  <td><?php echo $row1['wk_memberapplydate']; ?></td>
										</tr>
										<tr>
										  <th scope="row">AES Approval Status</th>
										  <td><?php echo $row1['wk_aestatus']; ?></td>
										</tr>
										<tr>
										  <th scope="row">AES Approval Date</th>
										  <td><?php echo $row1['wk_aedate']; ?></td>
										</tr>
										<tr>
										  <th scope="row">Approved Employee Strength</th>
										  <td><b class="text-primary"><?php echo $row1['wk_employeeapplystrength']; ?></b></td>
										</tr>
										<tr>
										  <th scope="row">WorkStatus</th>
										  <td><b class="text-primary"><?php echo $row1['wk_status']; ?></b></td>
										</tr>
										<tr>
										  <th scope="row">Total Attendance</th>
										  <td><b class="text-primary"><?php echo $row1['wk_totalattendance']; ?></b></td>
										</tr>
										<tr>
										  <th scope="row">PerHead Wages</th>
										  <td><b class="text-primary"><?php echo $row1['wk_perheadwages']; ?></b></td>
										</tr>
										<tr>
										  <th scope="row">Total Cost</th>
										  <td><b class="text-primary"><?php echo $row1['wk_totalcost']; ?></b></td>
										</tr>
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
