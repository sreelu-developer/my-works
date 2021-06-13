<?php
include_once('security_check_ae.php');
include_once('../database.php');
$query="SELECT `pw_id`, `pw_number`, `pw_name`, 
`pw_lat`, `pw_lon` FROM `panchayath_ward` ";
$data=DataBase::SelectData($query);

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
        <?php include_once('admin_title.php'); ?>   
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
						
						<div class="card">
							<div class="card-header">
								<strong class="card-title">Wards-employees</strong>
								
							</div>
							<div class="card-body">
								<table id="bootstrap-data-table" class="table table-striped table-bordered">
									<thead>
									  <tr>
										<th>Ward Name</th>
										<th class="text-right">Ward Number</th>
										<th class="text-right">Approved Employees</th>
										<th class="text-right">Waiting For Approval</th>
										<th class="text-right">Denied Employees</th>
										<th></th>
									  </tr>
									</thead>
									<tbody>
										<?php
										while($row=mysqli_fetch_array($data)){
											$query="SELECT count(*) as totalwaiting FROM `employees` 
											where 	em_approvalstatus='waitingforaeapproval' and  pw_id=".$row['pw_id'];
											$data1=DataBase::SelectData($query);
											$waiting=mysqli_fetch_array($data1);
											$query="SELECT count(*) as totalapproved FROM `employees` 
											where 	em_approvalstatus='aeapproved' and  pw_id=".$row['pw_id'];
											$data1=DataBase::SelectData($query);
											$approved=mysqli_fetch_array($data1);
											
											$query="SELECT count(*) as totaldenied FROM `employees` 
											where 	em_approvalstatus='aedenied' and  pw_id=".$row['pw_id'];
											$data1=DataBase::SelectData($query);
											$denied=mysqli_fetch_array($data1);
										?>
										<tr>
											<td><?php echo $row['pw_name'] ?></td>
											<td class="text-right"><?php echo $row['pw_number'] ?></td>
											<td class="text-right"><b><?php echo $approved['totalapproved'] ?></b></td>
											<td class="text-right"><b><?php echo $waiting['totalwaiting'] ?></b></td>
											<td class="text-right"><b><?php echo $denied['totaldenied'] ?></b></td>
											<td class="text-right" style='width:149px;'>
												<a href="list_employees_applications.php?pw_id=<?php echo $row['pw_id']?>" class="btn btn-outline-primary btn-sm"><i class="fa fa-clipboard"></i>&nbsp; SHOW EMPLOYEES</a>
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
