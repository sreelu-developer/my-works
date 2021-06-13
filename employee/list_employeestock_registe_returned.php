<?php
include_once('security_check_employee.php');
include_once('../database.php');
$em_id=$_COOKIE['nregs_id'];
$query2="SELECT `ed_id`, `eq_name`, `ad_id`, `em_id`, `ed_charge`,
DATE_FORMAT(ed_startdate,'%d/%M/%Y' ) AS `ed_startdate`,
DATE_FORMAT(ed_enddate,'%d/%M/%Y' ) AS `ed_enddate`,
 `ed_totaldistribution`, `ed_totalamount`, `ed_status`,equipment_distribution.eq_id  
FROM `equipment_distribution`
inner JOIN equipments on equipments.eq_id=equipment_distribution.eq_id 
where ed_status='RETURNED' and  em_id=$em_id";
$distribution=DataBase::SelectData($query2);

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
    $currentmenu="employee-equipmentreturned";
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
								<strong class="card-title">Equipments Returned</strong>
							</div>
							<div class="card-body">
								<table id="bootstrap-data-table" class="table table-striped table-bordered">
									<thead>
										<tr>
											<th>Equipment Name</th>
											<th class="text-right">Qty</th>
											<th class="text-right">Charge/Equipment</th>
											<th class="text-right">Total</th>
											<th class="text-right">Distribution Date</th>
											<th class="text-right">Due Date</th>

										</tr>
									</thead>
									<tbody>
										<?php
										while($row=mysqli_fetch_array($distribution)){
						           		?>
										<tr>
											<td><?php echo $row['eq_name'];?></td>
											<td class="text-right"><b><?php echo $row['ed_totaldistribution'];?></b></td>
											<td class="text-right"><b><?php echo $row['ed_charge'];?></b>/-</td>
											<td class="text-right"><b><?php echo $row['ed_totalamount'];?>/-</b></td>
											<td class="text-right"><?php echo $row['ed_startdate'];?></td>
											<td class="text-right"><?php echo $row['ed_enddate'];?></td>
											
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
