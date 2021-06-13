<?php
include_once('../database.php');
include_once('security_check_ae.php');
$query="SELECT `eq_id`,`eq_name`, `eq_charge` FROM `equipments` ";
$equipments=DataBase::SelectData($query);

$query="SELECT `ad_id`, `ad_firstname`, `ad_lastname`, `ad_gender`, 
`ad_dob`, `ad_joindate`, `ad_terminatedate`, `ad_emailid`, `ad_password`,
`ad_mobilenumber`, `ad_status`,`pw_number`,`pw_name` FROM `area_development_society`
inner join panchayath_ward on panchayath_ward.pw_id=area_development_society.pw_id where ad_status='active'";
$ads=DataBase::SelectData($query);
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
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                     <div class="col-md-6 offset-md-3">
						<?php
						if(!empty($_GET['msg']) && $_GET['msg']=="addsuccess"){
						?>
                        <div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
                            <span class="badge badge-pill badge-primary">Success</span>
                                Inward Stock Sucessfully Entered
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
						<?php
						}
						?>
                        <div class="card">
                             <form action="sql_process/equipmentoutward_ads_sql_process.php" method="post" autocomplete="off" >
							    <?php
								if(empty($_GET['eo_id'])){
								?>
								<div class="card-header">
                                    <strong class="card-title">New ADS Outward Entry</strong>
									<a href="list_equipmentoutward.php" class="btn btn-sm btn-outline-secondary pull-right"><i class="fa fa-chevron-left"></i>&nbsp; Back</a>
								</div>
                                <div class="card-body">
									<div class="form-group">
                                        <label class="control-label mb-1">ADS</label>
										<select class="form-control" name="ad_id" required>
											<option value="">Select Any ADS</option>
											<?php
											while($row=mysqli_fetch_array($ads)){
											?>
											<option value="<?php echo $row['ad_id']?>"><?php echo $row['ad_firstname']." ".$row['ad_lastname']." ( ".$row['pw_name']." )" ?></option>
											<?php
											}
											?>
										</select>
									</div>
									<div class="form-group">
                                        <label class="control-label mb-1">Equipment Name</label>
										<select class="form-control" name="eq_id" required>
											<option value="">Select Any Equipment</option>
											<?php
											while($row=mysqli_fetch_array($equipments)){
											?>
											<option value="<?php echo $row['eq_id']?>"><?php echo $row['eq_name'] ?></option>
											<?php
											}
											?>
										</select>
									</div>
									<div class="form-group">
                                        <label class="control-label mb-1">Equipment Quantity </label>
                                        <input name="eo_qty"  type="number" placeholder="Equipment quantity" class="form-control" required/>
                                    </div>
									<input name="eo_id" value="0" type="hidden" required/>
									<input name="mode" value="add" type="hidden" required/>
                                    <button type="submit" class="btn btn-md btn-info pull-right ">
                                    <i class="fa fa-check"></i>&nbsp;Save
                                    </button>
                                    <a href="list_equipmentoutward.php" class="btn btn-md btn-outline-secondary"><i class="ti-close"></i>&nbsp; Cancel</a>
                                </div>
								<?php
								}
								else if(!empty($_GET['eo_id']) && !empty($_GET['mode'])&& $_GET['mode']=="delete"){
								$eo_id=$_GET['eo_id'];
								$query="SELECT `eo_id`, `eq_id`, `ad_id`, `eo_qty`, `eo_date` FROM `equipment_outward_ads` 
								WHERE equipment_outward_ads.eo_id=$eo_id";                                      
								$data=DataBase::SelectData($query);
								$stockdetails=mysqli_fetch_array($data);
							
								$query="SELECT `eq_id`,`eq_name`, `eq_charge` FROM `equipments` where eq_id=".$stockdetails['eq_id'];
								$equipments=DataBase::SelectData($query);
								
								$query="SELECT `ad_id`, `ad_firstname`, `ad_lastname`, `ad_gender`, 
								`ad_dob`, `ad_joindate`, `ad_terminatedate`, `ad_emailid`, `ad_password`,
								`ad_mobilenumber`, `ad_status`,`pw_number`,`pw_name` FROM `area_development_society`
								inner join panchayath_ward on panchayath_ward.pw_id=area_development_society.pw_id where ad_id=".$stockdetails['ad_id'];
								$ads=DataBase::SelectData($query);
								?>
								<div class="card-header">
                                    <strong class="card-title">Delete ADS Outward Entry</strong>
									<a href="list_equipmentoutward.php" class="btn btn-sm btn-outline-secondary pull-right"><i class="fa fa-chevron-left"></i>&nbsp; Back</a>
								</div>
                                <div class="card-body">
										<div class="form-group">
											<label class="control-label mb-1">ADS</label>
											<select class="form-control" name="ad_id" readonly required>
												<?php
												while($row=mysqli_fetch_array($ads)){
												?>
												<option value="<?php echo $row['ad_id']?>"><?php echo $row['ad_firstname']." ".$row['ad_lastname']." ( ".$row['pw_name']." )" ?></option>
												<?php
												}
												?>
											</select>
										</div>
										<div class="form-group">
                                        <label class="control-label mb-1">Equipment Name</label>
										<select class="form-control" name="eq_id" readonly required>
											<?php
											while($row=mysqli_fetch_array($equipments)){
											?>
											<option value="<?php echo $row['eq_id']?>"><?php echo $row['eq_name'] ?></option>
											<?php
											}
											?>
										</select>
									</div>
									<div class="form-group">
                                        <label class="control-label mb-1">Equipment Quantity </label>
                                        <input name="eo_qty" value="<?php echo $stockdetails['eo_qty']; ?>"  type="number" placeholder="Equipment quantity" class="form-control" readonly required/>
                                    </div>
									<input name="eo_id" value="<?php echo $stockdetails['eo_id']; ?>" type="hidden" required/>
									<input name="mode" value="delete" type="hidden" required/>
                                    <button type="submit" class="btn btn-md btn-info pull-right ">
                                    <i class="fa fa-check"></i>&nbsp;Delete
                                    </button>
                                    <a href="list_equipmentoutward.php" class="btn btn-md btn-outline-secondary"><i class="ti-close"></i>&nbsp; Cancel</a>
                                </div>
								<?php
								}
								else if(!empty($_GET['eo_id']) && !empty($_GET['mode'])&& $_GET['mode']=="return"){
								$eo_id=$_GET['eo_id'];
								$query="SELECT `eo_id`, `eq_id`, `ad_id`, `eo_qty`, `eo_date` FROM `equipment_outward_ads` 
								WHERE equipment_outward_ads.eo_id=$eo_id";                                      
								$data=DataBase::SelectData($query);
								$stockdetails=mysqli_fetch_array($data);
							
								$query="SELECT `eq_id`,`eq_name`, `eq_charge` FROM `equipments` where eq_id=".$stockdetails['eq_id'];
								$equipments=DataBase::SelectData($query);
								
								$query="SELECT `ad_id`, `ad_firstname`, `ad_lastname`, `ad_gender`, 
								`ad_dob`, `ad_joindate`, `ad_terminatedate`, `ad_emailid`, `ad_password`,
								`ad_mobilenumber`, `ad_status`,`pw_number`,`pw_name` FROM `area_development_society`
								inner join panchayath_ward on panchayath_ward.pw_id=area_development_society.pw_id where ad_id=".$stockdetails['ad_id'];
								$ads=DataBase::SelectData($query);
								?>
								<div class="card-header">
                                    <strong class="card-title">Return ADS Outward Entry</strong>
									<a href="list_equipmentoutward.php" class="btn btn-sm btn-outline-secondary pull-right"><i class="fa fa-chevron-left"></i>&nbsp; Back</a>
								</div>
                                <div class="card-body">
										<div class="form-group">
											<label class="control-label mb-1">ADS</label>
											<select class="form-control" name="ad_id" readonly required>
												<?php
												while($row=mysqli_fetch_array($ads)){
												?>
												<option value="<?php echo $row['ad_id']?>"><?php echo $row['ad_firstname']." ".$row['ad_lastname']." ( ".$row['pw_name']." )" ?></option>
												<?php
												}
												?>
											</select>
										</div>
										<div class="form-group">
                                        <label class="control-label mb-1">Equipment Name</label>
										<select class="form-control" name="eq_id" readonly required>
											<?php
											while($row=mysqli_fetch_array($equipments)){
											?>
											<option value="<?php echo $row['eq_id']?>"><?php echo $row['eq_name'] ?></option>
											<?php
											}
											?>
										</select>
									</div>
									<div class="form-group">
                                        <label class="control-label mb-1">Equipment Quantity </label>
                                        <input name="eo_qty" value="<?php echo $stockdetails['eo_qty']; ?>"  type="number" placeholder="Equipment quantity" class="form-control" readonly required/>
                                    </div>
									<input name="eo_id" value="<?php echo $stockdetails['eo_id']; ?>" type="hidden" required/>
									<input name="mode" value="return" type="hidden" required/>
                                    <button type="submit" class="btn btn-md btn-info pull-right ">
                                    <i class="fa fa-check"></i>&nbsp;Return
                                    </button>
                                    <a href="list_equipmentoutward.php" class="btn btn-md btn-outline-secondary"><i class="ti-close"></i>&nbsp; Cancel</a>
                                </div>
								<?php
								}
								?>
							</form>
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
