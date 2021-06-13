<?php
include_once('../database.php');
include_once('security_check_ae.php');
$wk_id=$_GET['wk_id'];
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
								<strong class="card-title">Attendance Report of Selected Work</strong>
								<a href="list_work_details.php?wk_id=<?php echo $wk_id;  ?>" class="btn btn-sm btn-outline-secondary pull-right"><i class="fa fa-chevron-left"></i>&nbsp;Back</a>
							</div>
							<div class="card-body">
								<table id="bootstrap-data-table" class="table table-striped table-bordered">
									<thead>
									  <tr>
										<th>Date of Work</th>
										<th class="text-right">Total Attandance</th>
										<th class="text-right">Per head Wages</th>
										<th class="text-right">Total Wages</th>
										<th></th>
									  </tr>
									</thead>
									<tbody>
										<?php
										
												
										$query1="SELECT `wk_id`,`pw_number`,`pw_name`, `ad_firstname`,`ad_lastname`,`wk_type`,
										`wk_address`, `wk_startdate`,
										 `wk_finishdate`, `wk_status`, `wk_memberapplydate`, `wk_contract`, 
										 `wk_employeeapplystrength`, `wk_adsdate`, `wk_adsstatus`, `wk_panchayathdate`,
										 `wk_panchayathstatus`, `wk_aedate`, `wk_aestatus`, `wk_employeeapprovestrength`,
										 `wk_totalattendance`, `wk_perheadwages`, `wk_totalcost` FROM `work`
										  inner join panchayath_ward on panchayath_ward.pw_id=work.pw_id 
										  inner join area_development_society on area_development_society.ad_id=work.ad_id
										 where work.wk_id=$wk_id";
										$data1=DataBase::SelectData($query1);
										$row1=mysqli_fetch_array($data1);
																			
										$query2="SELECT distinct `wr_date` FROM `work_attendance` where wk_id=$wk_id";
										$data2=DataBase::SelectData($query2);
										while($row2=mysqli_fetch_array($data2)){
											$query2="SELECT count(*) as totalattandance FROM `work_attendance` where wr_date='".$row2['wr_date']."' and wk_id=$wk_id";
											$data3=DataBase::SelectData($query2);
											$row3=mysqli_fetch_array($data3);
										?>
										<tr>
											<td><?php echo $row2['wr_date']; ?></td>
											<td class="text-right"><?php echo $row3['totalattandance']; ?></td>
											<td class="text-right"><b><?php echo $row1['wk_perheadwages']; ?>/-</b></td>
											
											<td class="text-right"><b><?php echo $row3['totalattandance']*$row1['wk_perheadwages']; ?>/-</b></td>
											<td class="text-right" style='width:59px;'>
												<a href="list_finished_work_step3.php?wr_date=<?php echo $row2['wr_date']; ?>&wk_id=<?php echo $wk_id; ?>" class="btn btn-sm btn-outline-primary"><i class="fa fa-check-square"></i>&nbsp;Attenance Report on&nbsp; <?php echo $row2['wr_date']; ?></a>
											</td>
										</tr>
										<?php
										}
										if(mysqli_num_rows($data2)>0){
										?>
										<tr>
											<td class="bg-primary text-white"><b>Total</b></td>
											<td class="bg-primary text-white text-right"><b><?php echo $row1['wk_totalattendance']; ?></b></td>
											<td class="bg-primary text-white text-right"><b></b></td>
											<td class="bg-primary text-white text-right"><b><?php echo $row1['wk_totalcost']; ?>/-</b></td>
											<td class="bg-primary text-white text-right" style='width:59px;'>
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
