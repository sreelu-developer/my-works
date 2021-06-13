<?php
include_once('security_check_ae.php');
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
    $currentmenu="employees";
     include_once('left_nav.php');
    ?>
    <div id="right-panel" class="right-panel">
        <?php include_once('../admin/top_header.php'); ?>   
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                     <div class="col-md-10 offset-md-1">
                        
                        <div class="card">
                            <form action="sql_process/employee_sql_process.php" method="post" autocomplete="off" >
								<?php 
								 if(!empty($_GET['em_id']) && !empty($_GET['mode'])&& $_GET['mode']=="approval")
								 {
								 $em_id=$_GET['em_id'];
								 $query="SELECT 'em_id',`em_firstname`, `em_lastname`,`em_gender`,`em_dob`,`em_emailid`,`em_mobilenumber`,em_rationcardnumber
								 FROM employees where em_id=$em_id";
								  $emp=DataBase::SelectData($query);
								  $empdetails= mysqli_fetch_array($emp);
								?>
								<div class="card-header">
                                    <strong class="card-title">Approve Employee Application</strong>
                                    <a href="list_employees_applications.php?pw_id=<?php echo $_GET['pw_id']?>" class="btn btn-sm btn-outline-primary pull-right"><i class="fa fa-user-circle"></i>&nbsp; List Employees</a>
								</div>
                                <div class="card-body">
                                   <div class="row">
										<div class="form-group col-md-6">
											<label class="control-label mb-1">First Name</label>
											<input name="em_firstname" type="text" value="<?php echo $empdetails['em_firstname'] ?>" placeholder="first name of Employee" class="form-control" readonly required/>
										</div>
										<div class="form-group col-md-6">
											<label class="control-label mb-1">Last Name</label>
											<input name="em_lastname" type="text" value="<?php echo $empdetails['em_lastname'] ?>" placeholder="last name of Employee" class="form-control" readonly required/>
										</div>
										<div class="form-group col-md-6">
											<label class="control-label mb-1">Gender</label>
											<select name="em_gender" class="form-control" readonly required>
												<option value="<?php echo $empdetails['em_gender'] ?>" ><?php echo $empdetails['em_gender'] ?></option>
											</select>
										</div>
										<div class="form-group col-md-6">
											<label class="control-label mb-1">Date of Birth</label>
											<input name="em_dob" type="date" value="<?php echo $empdetails['em_dob'] ?>"  class="form-control" readonly required/>
										</div>
										<div class="form-group col-md-6">
											<label class="control-label mb-1">Email Id</label>
											<input name="em_emailid" type="email" value="<?php echo $empdetails['em_emailid'] ?>" placeholder="email id of employee" class="form-control" readonly required/>
										</div>
										<div class="form-group col-md-6">
											<label class="control-label mb-1">Mobile Number</label>
											<input name="em_mobilenumber" type="text" value="<?php echo $empdetails['em_mobilenumber'] ?>" placeholder="mobile number employee" class="form-control" readonly required/>
										</div>
										<div class="form-group col-md-6">
											<label class="control-label mb-1">Rationcard Number</label>
											<input name="em_rationcardnumber" type="text" value="<?php echo $empdetails['em_rationcardnumber'] ?>" placeholder="rationcard number of employee" class="form-control" readonly required/>
										</div>
										<div class="form-group col-md-6 pt-4">
											<input name="em_id" value="<?php echo $_GET['em_id']?>" type="hidden" required/>
											<input name="mode" value="approved" type="hidden" required/>
											<input name="pw_id" value="<?php echo $_GET['pw_id'] ?>" type="hidden" required/>
											<button type="submit" class="btn btn-md btn-info pull-right ">
											<i class="fa fa-check"></i>&nbsp;Approve Application
											</button>
											<a href="list_employees_applications.php?pw_id=<?php echo $_GET['pw_id']?>" class="btn btn-md btn-outline-secondary"><i class="ti-close"></i>&nbsp; Cancel</a>
										</div>
									</div>
								</div>
								<?php 
								 }
								 else if(!empty($_GET['em_id']) && !empty($_GET['mode'])&& $_GET['mode']=="deny"){
								 $em_id=$_GET['em_id'];
								 $query="SELECT 'em_id',`em_firstname`, `em_lastname`,`em_gender`,`em_dob`,`em_emailid`,`em_mobilenumber`,em_rationcardnumber
								 FROM employees where em_id=$em_id";
                                  $emp=DataBase::SelectData($query);
								  $empdetails= mysqli_fetch_array($emp);
								 ?>
								<div class="card-header">
                                    <strong class="card-title">Deny Employee Application</strong>
                                    <a href="list_employees_applications.php?pw_id=<?php echo $_GET['pw_id']?>" class="btn btn-sm btn-outline-primary pull-right"><i class="fa fa-user-circle"></i>&nbsp; List Employees</a>
								</div>
                                <div class="card-body">
                                   <div class="row">
										<div class="form-group col-md-6">
											<label class="control-label mb-1">First Name</label>
											<input name="em_firstname" type="text" value="<?php echo $empdetails['em_firstname'] ?>" placeholder="first name of Employee" class="form-control" readonly required/>
										</div>
										<div class="form-group col-md-6">
											<label class="control-label mb-1">Last Name</label>
											<input name="em_lastname" type="text" value="<?php echo $empdetails['em_lastname'] ?>" placeholder="last name of Employee" class="form-control" readonly required/>
										</div>
										<div class="form-group col-md-6">
											<label class="control-label mb-1">Gender</label>
											<select name="em_gender" class="form-control" readonly required>
												<option value="<?php echo $empdetails['em_gender'] ?>" ><?php echo $empdetails['em_gender'] ?></option>
											</select>
										</div>
										<div class="form-group col-md-6">
											<label class="control-label mb-1">Date of Birth</label>
											<input name="em_dob" type="date" value="<?php echo $empdetails['em_dob'] ?>"  class="form-control" readonly required/>
										</div>
										<div class="form-group col-md-6">
											<label class="control-label mb-1">Email Id</label>
											<input name="em_emailid" type="email" value="<?php echo $empdetails['em_emailid'] ?>" placeholder="email id of employee" class="form-control" readonly required/>
										</div>
										<div class="form-group col-md-6">
											<label class="control-label mb-1">Mobile Number</label>
											<input name="em_mobilenumber" type="text" value="<?php echo $empdetails['em_mobilenumber'] ?>" placeholder="mobile number employee" class="form-control" readonly required/>
										</div>
										<div class="form-group col-md-6">
											<label class="control-label mb-1">Rationcard Number</label>
											<input name="em_rationcardnumber" type="text" value="<?php echo $empdetails['em_rationcardnumber'] ?>" placeholder="rationcard number of employee" class="form-control" readonly required/>
										</div>
										<div class="form-group col-md-6 pt-4">
											<input name="em_id" value="<?php echo $_GET['em_id']?>" type="hidden" required/>
											<input name="mode" value="denied" type="hidden" required/>
											<input name="pw_id" value="<?php echo $_GET['pw_id'] ?>" type="hidden" required/>
											<button type="submit" class="btn btn-md btn-danger pull-right ">
											<i class="fa fa-check"></i>&nbsp;Deny Application
											</button>
											<a href="list_employees_applications.php?pw_id=<?php echo $_GET['pw_id']?>" class="btn btn-md btn-outline-secondary"><i class="ti-close"></i>&nbsp; Cancel</a>
										</div>
									</div>
								</div> 
								<?php 
								 }
								 else if(!empty($_GET['em_id']) && !empty($_GET['mode'])&& $_GET['mode']=="view"){
								 $em_id=$_GET['em_id'];
								 $query="SELECT 'em_id',`em_firstname`, `em_lastname`,`em_gender`,`em_dob`,`em_emailid`,`em_mobilenumber`,em_rationcardnumber,em_approvalstatus
								 FROM employees where em_id=$em_id";
                                  $emp=DataBase::SelectData($query);
								  $empdetails= mysqli_fetch_array($emp);
								 ?>
								 <div class="card-header">
                                    <strong class="card-title">Employee Profile</strong>
                                    <a href="list_employees_applications.php?pw_id=<?php echo $_GET['pw_id']?>" class="btn btn-sm btn-outline-primary pull-right"><i class="fa fa-user-circle"></i>&nbsp; List Employees</a>
								</div>
                                <div class="card-body">
                                   <div class="row">
										<div class="form-group col-md-6">
											<label class="control-label mb-1">First Name</label>
											<input type="text" value="<?php echo $empdetails['em_firstname'] ?>"  class="form-control" readonly required/>
										</div>
										<div class="form-group col-md-6">
											<label class="control-label mb-1">Last Name</label>
											<input type="text" value="<?php echo $empdetails['em_lastname'] ?>" class="form-control" readonly required/>
										</div>
										<div class="form-group col-md-6">
											<label class="control-label mb-1">Gender</label>
											<select class="form-control" readonly required>
												<option value="<?php echo $empdetails['em_gender'] ?>" ><?php echo $empdetails['em_gender'] ?></option>
											</select>
										</div>
										<div class="form-group col-md-6">
											<label class="control-label mb-1">Date of Birth</label>
											<input type="date" value="<?php echo $empdetails['em_dob'] ?>"  class="form-control" readonly required/>
										</div>
										<div class="form-group col-md-6">
											<label class="control-label mb-1">Email Id</label>
											<input type="email" value="<?php echo $empdetails['em_emailid'] ?>" class="form-control" readonly required/>
										</div>
										<div class="form-group col-md-6">
											<label class="control-label mb-1">Mobile Number</label>
											<input  type="text" value="<?php echo $empdetails['em_mobilenumber'] ?>" class="form-control" readonly required/>
										</div>
										<div class="form-group col-md-6">
											<label class="control-label mb-1">Rationcard Number</label>
											<input  type="text" value="<?php echo $empdetails['em_rationcardnumber'] ?>" class="form-control" readonly required/>
										</div>
										<div class="form-group col-md-6">
											<label class="control-label mb-1">AE Approval Status</label>
											<input  type="text" value="<?php echo $empdetails['em_approvalstatus'] ?>" class="form-control" readonly required/>
										</div>
										
									</div>
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
