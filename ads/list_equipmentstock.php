<?php
include_once('security_check_ads.php');
include_once('../database.php');
$ad_id=$_COOKIE['nregs_id'];
$query="SELECT `eq_id`, `eq_name` FROM `equipments` ";
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
    $currentmenu="recived-equipment-from-ae";
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
								<strong class="card-title">Equipment Stock</strong>
							</div>
							<div class="card-body">
								<table id="bootstrap-data-table" class="table table-striped table-bordered">
									<thead>
									  <tr>
										<th>Equipment Name</th>
											<th class="text-right">Recived-Qty</th>
											<th class="text-right">Returned-Qty</th>
											<th class="text-right">Distributed-Qty</th>
											<th class="text-right">Balance-Qty</th>
										</tr>
									</thead>
									<tbody>
										<?php
										while($row=mysqli_fetch_array($data)){
						                    $query1="SELECT case when sum(`eo_qty`) is null then 0 when sum(`eo_qty`) is not null then sum(`eo_qty`) end as total FROM `equipment_outward_ads` where ad_id=$ad_id and eq_id=".$row['eq_id'];                                      
											$data2=DataBase::SelectData($query1);
											$totaloutward=mysqli_fetch_array($data2);
											$query1="SELECT case when sum(`en_qty`) is null then 0 when sum(`en_qty`) is not null then sum(`en_qty`) end as total FROM `equipment_inward_ads` where ad_id=$ad_id and eq_id=".$row['eq_id'];                                      
											$data2=DataBase::SelectData($query1);
											$totalinward=mysqli_fetch_array($data2);
											
											$query1="SELECT case when sum(`ed_totaldistribution`) is null then 0 when sum(`ed_totaldistribution`) is not null then sum(`ed_totaldistribution`) end as total FROM `equipment_distribution` where ed_status='DISTRIBUTED' and ad_id=$ad_id and eq_id=".$row['eq_id'];                                      
											$data2=DataBase::SelectData($query1);
											$totaldistribution=mysqli_fetch_array($data2);
										?>
										<tr>
										
											<td><?php echo $row['eq_name'] ?></td>
											<td class="text-right"><?php echo $totaloutward['total'];  ?></td>
											<td class="text-right"><?php echo $totalinward['total'];  ?></td>
											<td class="text-right"><?php echo $totaldistribution['total'];  ?></td>
											<td class="text-right"><?php echo $totaloutward['total']-$totalinward['total']-$totaldistribution['total'];  ?></td>
											
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
