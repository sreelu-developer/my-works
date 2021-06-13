<?php
include_once('../database.php');
include_once('security_check_ads.php');
$ad_id=$_COOKIE['nregs_id'];
$query1="SELECT `pw_id`,`ad_firstname` FROM `area_development_society` where ad_id=$ad_id";
$data1=DataBase::SelectData($query1);
$row1=mysqli_fetch_array($data1);
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
    $currentmenu="employee-attendance";
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
                                Employee Registration Application Successfully Submitted
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                         <?php
						}
						elseif(!empty($_GET['msg']) && $_GET['msg']=="editsuccess")
						{
							
						?>
						<div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
                            <span class="badge badge-pill badge-primary">Success</span>
                                Employee Registration Application Successfully Update and Submitted
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
						<?php	
						}
						?>	
						<div class="card">
							<div class="card-header">
								<strong class="card-title">Attendance Report of Registered Employees</strong>
							</div>
							<div class="card-body">
								<table id="bootstrap-data-table" class="table table-striped table-bordered">
									<thead>
									  <tr>
										<th>Ward Name</th>
										<th>Employee Name and Contact Number</th>
										<th>Account Status</th>
										<th class="text-right">Total Working Days</th>
										<th></th>
									  </tr>
									</thead>
									<tbody>
										<?php
										$totalworkingdays=0;	
										$query2="SELECT em_id,pw_name,em_firstname,em_mobilenumber,em_approvalstatus,em_status
										FROM employees inner join panchayath_ward on panchayath_ward.pw_id=employees.pw_id
										WHERE employees.pw_id=".$row1['pw_id'];
										$data2=DataBase::SelectData($query2);
										while($row2=mysqli_fetch_array($data2)){
										$query2="Select count(*) as totaldays from work_attendance 
										inner join work_employee_allotment 
										on work_employee_allotment.wa_id=work_attendance.wa_id where em_id=".$row2['em_id'];
										$data3=DataBase::SelectData($query2);
										$row3=mysqli_fetch_array($data3);
										$totalworkingdays+=$row3['totaldays'];									
										?>
										<tr>
											<td><?php echo $row2['pw_name']?></td>
											<td><?php  echo $row2['em_firstname']."(".$row2['em_mobilenumber'].")";?></td>
											<td><?php echo $row2['em_status']?></td>
											<td class="text-right"><b><?php echo $row3['totaldays']?></b></td>
											<td class="text-right" style='width:59px;'>
												<a href="list_employees_attendance_step2.php?em_id=<?php echo $row2['em_id']?>" class="btn btn-sm btn-outline-danger"><i class="fa fa-eye"></i>&nbsp;View Detailed Report</a>
											</td>
										</tr>
										<?php
										}
										if(mysqli_num_rows($data2)>0){
										?>
										<tr>
											<td class="text-right bg-primary"></td>
											<td class="text-white bg-primary"><b>Total Working Days</b></td>
											<td class="text-right bg-primary"></td>
											<td class="text-right bg-primary text-white"><b><?php echo $totalworkingdays; ?></b></td>
											<td class="text-right bg-primary" style='width:59px;'>
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
