<?php
include_once('security_check_ae.php');
include_once('../database.php');
$ad_id=$_COOKIE['nregs_id'];
$query1="SELECT `pw_id`,`ad_firstname` FROM `area_development_society` where ad_id=$ad_id";
$data1=DataBase::SelectData($query1);
$row1=mysqli_fetch_array($data1);
$wk_id=$_GET['wk_id'];	
$wr_date=$_GET['wr_date'];	
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
								<strong class="card-title">Attendance Report on <?php echo $wr_date; ?></strong>
								<a href="list_finished_work_step2.php?wk_id=<?php echo $wk_id; ?>" class="btn btn-sm btn-outline-secondary pull-right"><i class="fa fa-chevron-left"></i>&nbsp;Back</a>
							</div>
							<div class="card-body">
								<table id="bootstrap-data-table" class="table table-striped table-bordered">
									<thead>
									  <tr>
										<th>Ward Name</th>
										<th>Employee Name and Contact Number</th>
										<th>Date of  Attendance</th>
										<th></th>
									  </tr>
									</thead>
									<tbody>
										<?php
										
										
										$query2="SELECT wa_id,employees.em_id,pw_name,em_firstname,em_mobilenumber,em_approvalstatus,em_status
										FROM employees inner join panchayath_ward on panchayath_ward.pw_id=employees.pw_id
										inner join work_employee_allotment on employees.em_id=work_employee_allotment.em_id and wk_id=$wk_id";
										$data2=DataBase::SelectData($query2);
										while($row2=mysqli_fetch_array($data2)){
											$attendanceflag=0;
											if(DataBase::RowExists("work_attendance","wa_id=".$row2['wa_id']." and wr_date='$wr_date' and  wk_id=$wk_id")){
											$attendanceflag=1;
											}	
										?>
										<tr>
											<td><?php echo $row2['pw_name']; ?></td>
											<td><?php  echo $row2['em_firstname']."(".$row2['em_mobilenumber'].")";?></td>
											<td><?php echo $wr_date;?></td>
											<td class="text-right" style='width:59px;'>
												<?php
												if($attendanceflag==0){
												?>
												<span class="badge badge-danger">Absent</span><?php
												}
												else{
												?>
												<span class="badge badge-success">Present</span><?php
												}
												?>
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
