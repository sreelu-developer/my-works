<?php
include_once('../database.php');
include_once('security_check_ae.php');
$query3="SELECT pw_name FROM panchayath_ward WHERE pw_id=".$_GET['pw_id'];
$data3=DataBase::SelectData($query3);
$row3=mysqli_fetch_array($data3);

$query2="SELECT em_id,em_firstname,em_mobilenumber,em_approvalstatus,em_status
FROM employees WHERE pw_id=".$_GET['pw_id'];
$data2=DataBase::SelectData($query2);
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
    $currentmenu="wards-employees";
     include_once('left_nav.php');
    ?>
    <div id="right-panel" class="right-panel">
        <?php include_once('../admin/top_header.php'); ?>   
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
					<?php
					if(!empty($_GET['msg']) && $_GET['msg']=="approvesuccess"){
					?>
					<div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
						<span class="badge badge-pill badge-primary">Success</span>
							Employee Application Successfully Approved
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php
					}
					?>
					<?php
					if(!empty($_GET['msg']) && $_GET['msg']=="denysuccess"){
					?>
					<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
						<span class="badge badge-pill badge-danger">Success</span>
							Employee Application Successfully Denied
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php
					}
					?>
					<div class="card">
							<div class="card-header">
								<strong class="card-title">Employee Applications of Ward <?php echo $row3['pw_name'] ?></strong>
								<a href="list_wards_employees.php" class="btn btn-sm btn-outline-primary pull-right"><i class="fa fa-user-circle"></i>&nbsp; List wards</a>
							</div>
							<div class="card-body">
								<table id="bootstrap-data-table" class="table table-striped table-bordered">
									<thead>
									  <tr>
										<th>Employee Name</th>
										<th>Contact Number</th>
										<th class="text-right">AE Approval Status</th>
										<th class="text-right">Employee Profile Status</th>
										<th></th>
									  </tr>
									</thead>
									<tbody>
										<?php
										while($row2=mysqli_fetch_array($data2)){
									    ?>
										<tr>
											<td><?php echo $row2['em_firstname']?></td>
											<td><?php echo $row2['em_mobilenumber'];?></td>
											<td class="text-right"><?php echo $row2['em_approvalstatus'];?></td>
											<td class="text-right"><?php echo $row2['em_status'];?></td>
											<td class="text-right" style='width:149px;'>
												<?php
												if($row2['em_approvalstatus']=='waitingforaeapproval'){
												?>	
												<a href="manage_employees_approval.php?em_id=<?php echo $row2['em_id']?>&mode=approval&pw_id=<?php echo $_GET['pw_id']?>" class="btn btn-sm btn-outline-primary"><i class="fa fa-check"></i>&nbsp;Approve Employee Application</a>
												<a href="manage_employees_approval.php?em_id=<?php echo $row2['em_id']?>&mode=deny&pw_id=<?php echo $_GET['pw_id']?>" class="btn btn-sm btn-outline-danger"><i class="fa fa-close"></i>&nbsp;&nbsp;&nbsp;Deny Employee Application&nbsp;&nbsp;&nbsp;</a>
												<?php
												}
												else{
												?>
												<a href="manage_employees_approval.php?em_id=<?php echo $row2['em_id']?>&mode=view&pw_id=<?php echo $_GET['pw_id']?>" class="btn btn-sm btn-outline-success"><i class="fa fa-eye"></i>&nbsp;View Employee Profile</a>
												<a href="list_employees_attendance_step2.php?em_id=<?php echo $row2['em_id']?>&pw_id=<?php echo $_GET['pw_id']?>" class="btn btn-sm btn-outline-danger"><i class="fa fa-eye"></i>&nbsp;&nbsp;&nbsp;Attendance Report&nbsp;&nbsp;&nbsp;</a>
											
												<?php
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
