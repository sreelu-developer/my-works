<?php
include_once('../database.php');
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
    $currentmenu="equipment outward";
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
							<strong class="card-title">ADS Equipments Outward ( Equipments Given to ADS )</strong>
							<a href="manage_equipmentoutward_ads.php" class="btn btn-sm btn-outline-primary pull-right"><i class="fa fa-cart-arrow-down"></i>&nbsp; New Outward Entry</a>
						</div>
						<div class="card-body">
							<table id="bootstrap-data-table" class="table table-striped table-bordered">
								<thead>
								  <tr>
									<th>ADS Name(Contact Number, Ward, Status)</th>
									<th class="text-right">Outward-Qty</th>
									<th class="text-right">Inward-Qty</th>
									<th class="text-right">InHand-Qty</th>
									<th></th>
								  </tr>
								</thead>
								<tbody>
									<?php
									$query1="SELECT `ad_id`, `ad_firstname`, `ad_lastname`, `ad_gender`, 
									`ad_dob`, `ad_joindate`, `ad_terminatedate`, `ad_emailid`, `ad_password`,
									`ad_mobilenumber`, `ad_status`,`pw_number`,`pw_name` FROM `area_development_society`
									inner join panchayath_ward on panchayath_ward.pw_id=area_development_society.pw_id";
									$data1=DataBase::SelectData($query1);
									while($row1=mysqli_fetch_array($data1)){
										$query1="SELECT case when sum(`eo_qty`) is null then 0 when sum(`eo_qty`) is not null then sum(`eo_qty`) end as total FROM `equipment_outward_ads` where ad_id=".$row1['ad_id'];                                      
										$data2=DataBase::SelectData($query1);
										$totaloutward=mysqli_fetch_array($data2);
										$query1="SELECT case when sum(`en_qty`) is null then 0 when sum(`en_qty`) is not null then sum(`en_qty`) end as total FROM `equipment_inward_ads` where ad_id=".$row1['ad_id'];                                      
										$data2=DataBase::SelectData($query1);
										$totalinward=mysqli_fetch_array($data2);
										
										
									?>
									<tr>
										<td><?php
										echo $row1['ad_firstname']." ( ".$row1['ad_mobilenumber'].", ".$row1['pw_name'].", ".$row1['ad_status']." )";
										?></td>
										<td class="text-right" style='width:120px;'>
										<?php echo $totaloutward['total'];  ?>
										</td>
										<td class="text-right" style='width:120px;'>
										<?php echo $totalinward['total'];  ?>
										</td>
										<td class="text-right" style='width:120px;'>
										<?php echo $totaloutward['total']-$totalinward['total'];  ?>
										</td>
										<td class="text-right" style='width:100px;'>
											<a href="list_equipmentoutward_stock.php?ad_id=<?php echo $row1['ad_id']?>" class="btn btn-sm btn-outline-primary pull-right"><i class="fa fa-cart-arrow-down"></i>&nbsp;Outward Stock Report</a>
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
