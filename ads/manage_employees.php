<?php
include_once('../database.php');
include_once('security_check_ads.php');
$query1="SELECT `pw_id`, `pw_number`, `pw_name`, `pw_lat`, `pw_lon` FROM `panchayath_ward` where pw_id=".$_GET['pw_id'];
$data1=DataBase::SelectData($query1);
$panchayathward=mysqli_fetch_array($data1);
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
    <style>
    #py_ur_mobile,#py_email_valid, #py_ur_code{
        font-weight:bold;
        color:red;
        position:absolute;
        right:20px;
        bottom:-20px;
        display:none;
        font-size:small;

    }
    </style>
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
                            <form action="sqlprocess/employee_sql_process.php" method="post" autocomplete="off" >
							  <?php 
							 if(empty($_GET['em_id']) && empty($_GET['mode'])){
							 ?>
							    <div class="card-header">
                                    <strong class="card-title">Register New Employee Application of <?php echo $panchayathward['pw_name']  ?> ( Ward No: <?php echo $panchayathward['pw_number']  ?> )</strong>
                                    <a href="list_employees.php" class="btn btn-sm btn-outline-primary pull-right"><i class="fa fa-user-circle"></i>&nbsp; List employees</a>
                                </div>
                                <div class="card-body">
                                   <div class="row">
										<div class="form-group col-md-6">
											<label class="control-label mb-1">First Name</label>
											<input name="em_firstname" type="text" placeholder="first name of Employee" class="form-control" required/>
										</div>
										<div class="form-group col-md-6">
											<label class="control-label mb-1">Last Name</label>
											<input name="em_lastname" type="text" placeholder="last name of employee" class="form-control" required/>
										</div>
										<div class="form-group col-md-6">
											<label class="control-label mb-1">Gender</label>
											<select name="em_gender" class="form-control">
												<option value="male">Male</option>
												<option value="female">Female</option>
											</select>
										</div>
										<div class="form-group col-md-6">
											<label class="control-label mb-1">Date of Birth</label>
											<input name="em_dob" type="date" class="form-control" max="<?php echo (date("Y")-18)."-".date("m-d"); ?>" required/>
										</div>
										<div class="form-group col-md-6" style='position:relative;'>
											<label class="control-label mb-1">Email Id</label>
											<span id="py_email_valid" style=""></span>
											<input id="ur_email" name="em_emailid" type="email" placeholder="email id of employee" class="form-control" required/>
										</div>
										<div class="form-group col-md-6" style='position:relative;'>
											<label class="control-label mb-1">Mobile Number</label>
											<span id="py_ur_mobile" style=""></span>
											<input id="ur_mobile" name="em_mobilenumber" type="text" placeholder="mobile number of employee" class="form-control" required/>
										</div>
										<div class="form-group col-md-6" style='position:relative;'>
										<span id="py_ur_code" style=""></span>
											<label class="control-label mb-1">Rationcard Number</label>
											<input id="ur_code" name="em_rationcardnumber" type="text" placeholder="rationcard number of employee" class="form-control" required/>
										</div>
										<div class="form-group col-md-6 pt-4">
											<input name="em_id" id="em_id"  value="0" type="hidden" required/>
											<input name="mode" value="add" type="hidden" required/>
											<input name="pw_id" value="<?php echo $_GET['pw_id'] ?>" type="hidden" required/>
											<button type="submit" id="btn_save" class="btn btn-md btn-info pull-right ">
											<i class="fa fa-check"></i>&nbsp;Save Application
											</button>
											<a href="list_employees.php" class="btn btn-md btn-outline-secondary"><i class="ti-close"></i>&nbsp; Cancel</a>
										</div>
									</div>
								</div>
								<?php
								}
								else if(!empty($_GET['em_id']) && !empty($_GET['mode'])&& $_GET['mode']=="edit"){
								$em_id=$_GET['em_id'];
								$query="SELECT 'em_id',`em_firstname`, `em_lastname`,`em_gender`,`em_dob`,`em_emailid`,`em_mobilenumber`,em_rationcardnumber FROM employees where em_id=$em_id";
								$emp=DataBase::SelectData($query);
								$empdetails= mysqli_fetch_array($emp);
								?>
								<div class="card-header">
									<strong class="card-title">Edit Employee Application of <?php echo $panchayathward['pw_name']  ?> ( Ward No: <?php echo $panchayathward['pw_number']  ?> )</strong>
									<a href="list_employees.php" class="btn btn-sm btn-outline-primary pull-right"><i class="fa fa-user-circle"></i>&nbsp; List employees</a>
                                </div>
                                <div class="card-body">
									<div class="row">
										<div class="form-group col-md-6">
											<label class="control-label mb-1">First Name</label>
											<input name="em_firstname" type="text" value="<?php echo $empdetails['em_firstname'] ?>" placeholder="first name of Employee" class="form-control" required/>
										</div>
										<div class="form-group col-md-6">
											<label class="control-label mb-1">Last Name</label>
											<input name="em_lastname" type="text" value="<?php echo $empdetails['em_lastname'] ?>" placeholder="last name of Employee" class="form-control" required/>
										</div>
										<div class="form-group col-md-6">
											<label class="control-label mb-1">Gender</label>
											<select name="em_gender" class="form-control">
												<option value="male">Male</option>
												<option value="female">Female</option>
											</select>
										</div>
										<div class="form-group col-md-6">
											<label class="control-label mb-1">Date of Birth</label>
											<input name="em_dob" type="date" value="<?php echo $empdetails['em_dob'] ?>" max="<?php echo (date("Y")-18)."-".date("m-d"); ?>"  class="form-control" required/>
										</div>
										
										<div class="form-group col-md-6" style='position:relative;'>
											<label class="control-label mb-1">Email Id</label>
											<span id="py_email_valid" style=""></span>
											<input id="ur_email" name="em_emailid" type="email" value="<?php echo $empdetails['em_emailid'] ?>" placeholder="email id of employee" class="form-control" required/>
										</div>
										<div class="form-group col-md-6" style='position:relative;'>
											<label class="control-label mb-1">Mobile Number</label>
											<span id="py_ur_mobile" style=""></span>
											<input id="ur_mobile" name="em_mobilenumber" type="text" value="<?php echo $empdetails['em_mobilenumber'] ?>" placeholder="mobile number employee" class="form-control" required/>
										</div>
										<div class="form-group col-md-6" style='position:relative;'>
											<span id="py_ur_code" style=""></span>
											<label class="control-label mb-1">Rationcard Number</label>
											<input id="ur_code" name="em_rationcardnumber" value="<?php echo $empdetails['em_rationcardnumber'] ?>" type="text" placeholder="rationcard number of employee" class="form-control" required/>
										</div>
										<div class="form-group col-md-6 pt-4">
											<input name="em_id" id="em_id" value="<?php echo $_GET['em_id']?>" type="hidden" required/>
											<input name="mode" value="edit" type="hidden" required/>
											<input name="ad_id" value="<?php echo $_GET['ad_id'] ?>" type="hidden" required/>
											<button type="submit" id="btn_save" class="btn btn-md btn-info pull-right ">
											<i class="fa fa-check"></i>&nbsp;Edit Application
											</button>
											<a href="list_employees.php" class="btn btn-md btn-outline-secondary"><i class="ti-close"></i>&nbsp; Cancel</a>
										</div>
									</div>
								</div>
								<?php
								}
								else if(!empty($_GET['em_id']) && !empty($_GET['mode'])&& $_GET['mode']=="view"){
								$em_id=$_GET['em_id'];
								$query="SELECT 'em_id',`em_firstname`, `em_lastname`,`em_gender`,`em_dob`,`em_emailid`,`em_mobilenumber`,em_rationcardnumber,em_approvalstatus FROM employees where em_id=$em_id";
								$emp=DataBase::SelectData($query);
								$empdetails= mysqli_fetch_array($emp);
								?>
								<div class="card-header">
									<strong class="card-title">Employee Profile of <?php echo $panchayathward['pw_name']  ?> ( Ward No: <?php echo $panchayathward['pw_number']  ?> )</strong>
									<a href="list_employees.php" class="btn btn-sm btn-outline-primary pull-right"><i class="fa fa-user-circle"></i>&nbsp; List employees</a>
                                </div>
                                <div class="card-body">
									<div class="row">
										<div class="form-group col-md-6">
											<label class="control-label mb-1">First Name</label>
											<input type="text" value="<?php echo $empdetails['em_firstname'] ?>" class="form-control" readonly required/>
										</div>
										<div class="form-group col-md-6">
											<label class="control-label mb-1">Last Name</label>
											<input type="text" value="<?php echo $empdetails['em_lastname'] ?>" class="form-control" readonly required/>
										</div>
										<div class="form-group col-md-6">
											<label class="control-label mb-1">Gender</label>
											<select name="em_gender" class="form-control" readonly>
												<option value="male"><?php echo $empdetails['em_gender'] ?></option>
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
											<input type="text" value="<?php echo $empdetails['em_mobilenumber'] ?>" class="form-control" readonly required/>
										</div>
										<div class="form-group col-md-6">
											<label class="control-label mb-1">Rationcard Number</label>
											<input value="<?php echo $empdetails['em_rationcardnumber'] ?>" type="text" class="form-control" readonly required/>
										</div>
										<div class="form-group col-md-6">
											<label class="control-label mb-1">AE Approval Status</label>
											<input value="<?php echo $empdetails['em_approvalstatus'] ?>" type="text" class="form-control" readonly required/>
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
	<script>
			$(document).ready(function(){
			var typingTimer;   
			var doneTypingInterval = 800;
             <?php
            if(!empty($_GET['em_id'])){
            ?>
            window.emailflag=true;
            window.mobileflag=true;
			window.codeflag=true;
            <?php
            }
            else{
            ?>
            window.emailflag=false;
            window.mobileflag=false;
			window.codeflag=false;
            <?php
            }
            ?>
			$(document).on("input","#ur_email",function(e) {
				e.preventDefault();
				$("#btn_save").prop('disabled', true);
				
				clearTimeout(typingTimer);	
				if ($('#ur_email').val){
					typingTimer = setTimeout(function(){
                    email_validation(); 
                    },doneTypingInterval);
				}
			});
			$(document).on("input","#ur_code",function(e) {
				e.preventDefault();
				$("#btn_save").prop('disabled', true);
				clearTimeout(typingTimer);	
				if ($('#ur_code').val){
					typingTimer = setTimeout(function(){
                        code_validation();
                   
                    },doneTypingInterval);
				}
			});
            $(document).on("input","#ur_mobile",function(e) {
				e.preventDefault();
				$("#btn_save").prop('disabled', true);
				clearTimeout(typingTimer);	
				if ($('#ur_mobile').val){
					typingTimer = setTimeout(function(){
                        mobile_validation();
                   
                    },doneTypingInterval);
				}
			});
			function code_validation(){
                $('#py_ur_code').css("display","inline");
				var ur_code = $("#ur_code").val();
                var em_id = $("#em_id").val();
				if(ur_code.length == 10 ){
					document.getElementById('py_ur_code').innerHTML="<span style='color:green;'>valid rationcard number</span>";
                    window.codeflag=true;
                    finalvalidate();
				}
				else{
					document.getElementById('py_ur_code').innerHTML="<span>minimum 10 charecters required</span>";
                    window.codeflag=false;
                    finalvalidate();			
				}
                
            }
			function email_validation(){
                $('#py_email_valid').css("display","inline");
				var ur_email = $("#ur_email").val();
				var em_id = $("#em_id").val();
               	if(ur_email.length >= 5 && validateEmail(ur_email) ){
					document.getElementById('py_email_valid').innerHTML="<span style='color:orange;'>checking availability...</span>";
					$.ajax({
						type: "POST",  
						url: "../emailid_checking_sql_process.php",  
						data: "ur_email="+ur_email+"&id="+em_id+"&mode=em",
						success: function(msg){	
						
							if(msg=="exsists"){
								document.getElementById('py_email_valid').innerHTML="<span><i>"+ur_email+" </i> is already used !!!</span>";
							    window.emailflag=false;
                        	}
							else{
								document.getElementById('py_email_valid').innerHTML="<span style='color:green'><i>"+ur_email+" </i> is available !!!</span>";
								window.emailflag=true;
                           }
                            finalvalidate();
                 		}				
					});
				}
				else{
					document.getElementById('py_email_valid').innerHTML="<span>please enter a valid email id</span>";
			        window.emailflag=false;
                    finalvalidate();			
				}
               
            }
           
            function mobile_validation(){
                $('#py_ur_mobile').css("display","inline");
				var ur_mobile = $("#ur_mobile").val();
				var em_id = $("#em_id").val();
               	if(ur_mobile.length >= 10 && validateMobile(ur_mobile) ){
					document.getElementById('py_ur_mobile').innerHTML="<span style='color:orange;'>checking availability...</span>";
					$.ajax({
						type: "POST",  
						url: "../mobile_checking_sql_process.php",  
						data: "ur_mobile="+ur_mobile+"&id="+em_id+"&mode=em",
						success: function(msg){	
						
							if(msg=="exsists"){
								document.getElementById('py_ur_mobile').innerHTML="<span><i>"+ur_mobile+" </i> is already used !!!</span>";
							    window.mobileflag=false;
                        	}
							else{
								document.getElementById('py_ur_mobile').innerHTML="<span style='color:green'><i>"+ur_mobile+" </i> is available !!!</span>";
								window.mobileflag=true;
                           }
                            finalvalidate();
                 		}				
					});
				}
				else{
					document.getElementById('py_ur_mobile').innerHTML="<span>please enter a valid mobile number</span>";
			        window.mobileflag=false;
                    finalvalidate();			
				}
               
            }
            function validateEmail($email) {
            var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
            return emailReg.test( $email );
            }
            function validateMobile($mobile) {
            var mobileReg = /^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[789]\d{9}$/;
            return mobileReg.test( $mobile );
            }
            function finalvalidate(){
                if(window.emailflag==true && window.mobileflag==true && window.codeflag==true ) {
                    $("#btn_save").prop('disabled', false);
                }
                else{
                    $("#btn_save").prop('disabled', true);  
                }

            }
        });
	</script>	
    
</body>
</html>
