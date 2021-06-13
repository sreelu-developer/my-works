<?php
include_once('../database.php');
$ad_id=$_GET['ad_id'];
$query1="SELECT `ad_id`, `ad_firstname`, `ad_lastname`, `ad_gender`, 
`ad_dob`, `ad_joindate`, `ad_terminatedate`, `ad_emailid`, `ad_password`,
`ad_mobilenumber`, `ad_status`,`pw_number`,`pw_name` FROM `area_development_society`
inner join panchayath_ward on panchayath_ward.pw_id=area_development_society.pw_id";
$data1=DataBase::SelectData($query1);
$adsdetails=mysqli_fetch_array($data1)
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
        <?php include_once('admin_title.php'); ?>   
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
						<?php
						if(!empty($_GET['msg']) && $_GET['msg']=="deletesuccess"){
						?>
						  <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
							<span class="badge badge-pill badge-danger">Success</span>
								Outward Stock Sucessfully Deleted
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div> 
						<?php
						}
						?>
						<div class="card">
							<div class="card-header">
								<strong class="card-title">Equipment Outward ( <?php echo $adsdetails['ad_firstname'].", ".$adsdetails['ad_mobilenumber'].", ".$adsdetails['pw_name'].", ".$adsdetails['ad_status']; ?> ) </strong>
								<a href="manage_equipmentoutward_ads.php" class="btn btn-sm btn-outline-primary pull-right"><i class="fa fa-cart-arrow-down"></i>&nbsp; New Outward Stock Entry</a>
								<a href="list_equipmentoutward.php" class="btn btn-sm btn-outline-secondary pull-right"><i class="fa fa-chevron-left"></i>&nbsp; Back</a>
							</div>
							<div class="card-body">
								<table id="bootstrap-data-table" class="table table-striped table-bordered">
									<thead>
									  <tr>
										<th>Equipment Name</th>
										<th class="text-right">Quantity</th>
										<th class="text-right">Date</th>
										<th></th>
									  </tr>
									</thead>
									<tbody>
										<?php
										$query="SELECT `eo_id`, `eq_name`, `ad_id`, `eo_qty`, `eo_date`,eo_returnstatus FROM `equipment_outward_ads` 
												inner join equipments on equipments.eq_id=equipment_outward_ads.eq_id 
												WHERE equipment_outward_ads.ad_id=$ad_id";                                      
										$data=DataBase::SelectData($query);
										while($row=mysqli_fetch_array($data)){
										?>
										<tr>
											<td><?php echo $row['eq_name'] ?></td>
											<td class="text-right"><?php echo $row['eo_qty'] ?></td>
											<td class="text-right"><?php echo $row['eo_date'] ?></td>
											<td class="text-right" style='width:49px;'>
												<?php if($row['eo_returnstatus']=='NOT-RETURNED'){
												?>
												<a href="manage_equipmentoutward_ads.php?mode=delete&eo_id=<?php echo $row['eo_id']; ?>" class="btn btn-outline-primary btn-sm"><i class="fa fa-cart-arrow-down"></i>&nbsp; Delete Outward Entry</a>
												<?php
												}
												else{
												?>
												<a href="manage_equipmentoutward_ads.php?mode=return&eo_id=<?php echo $row['eo_id']; ?>" class="btn btn-outline-danger btn-sm disabled"><i class="fa fa-cart-arrow-down"></i>&nbsp; Already Returned</a>
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
