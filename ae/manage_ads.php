<?php
include_once('../database.php');
include_once('security_check_ae.php');
$query3="SELECT pw_name FROM panchayath_ward WHERE pw_id=".$_GET['pw_id'];
$data3=DataBase::SelectData($query3);
$row3=mysqli_fetch_array($data3);
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
    #py_ur_mobile,#py_email_valid{
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
    $currentmenu="ADS";
     include_once('left_nav.php');
    ?>
    <div id="right-panel" class="right-panel">
        <?php include_once('../admin/top_header.php'); ?>   
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                     <div class="col-md-10 offset-md-1">
                        
                        <div class="card">
                            <form action="sql_process/ads_sql_process.php" method="post" autocomplete="off" >
							  <?php 
							 if(empty($_GET['ad_id']) && empty($_GET['mode'])){
							 ?>
							    
                                <div class="card-header">
                                    <strong class="card-title">ADS of <?php echo $row3['pw_name'] ?> </strong>
                                    <a href="list_ads.php" class="btn btn-sm btn-outline-primary pull-right"><i class="fa fa-user-circle"></i>&nbsp; List ADS</a>
                                </div>
                                <div class="card-body">
                                   <div class="row">
									<div class="form-group col-md-6">
                                        <label class="control-label mb-1">First Name</label>
                                        <input name="ad_firstname" type="text" placeholder="first name of ADS" class="form-control" required/>
                                    </div>
									<div class="form-group col-md-6">
                                        <label class="control-label mb-1">Last Name</label>
                                        <input name="ad_lastname" type="text" placeholder="last name of ADS" class="form-control" required/>
                                    </div>
									<div class="form-group col-md-6">
                                        <label class="control-label mb-1">Gender</label>
										<select name="ad_gender" class="form-control">
											<option value="male">Male</option>
											<option value="female">Female</option>
										</select>
									</div>
                                    <div class="form-group col-md-6">
                                        <label class="control-label mb-1">Date of Birth</label>
                                        <input name="ad_dob" type="date" max="<?php echo (date("Y")-18)."-".date("m-d"); ?>"  class="form-control" required/>
                                    </div>
									<div class="form-group col-md-6">
                                        <label class="control-label mb-1">Join Date</label>
                                        <input name="ad_joindate" type="date"  max="<?php echo date("Y-m-d"); ?>" class="form-control" required/>
                                    </div>
									<div class="form-group col-md-6" style='position:relative;'>
                                        <label class="control-label mb-1">Email Id</label>
										<span id="py_email_valid" style=""></span>
                                        <input id="ur_email" name="ad_emailid" type="email" placeholder="email id of ADS" class="form-control" required/>
                                    </div>
									<div class="form-group col-md-6" style='position:relative;'>
                                        <label class="control-label mb-1">Mobile Number</label>
										<span id="py_ur_mobile" style=""></span>
                                        <input id="ur_mobile" name="ad_mobilenumber" type="text" placeholder="mobile number of ADS" class="form-control" required/>
                                    </div>
									<div class="form-group col-md-6 pt-4">
										<input name="ad_id" id="ad_id" value="0" type="hidden" required/>
										<input name="mode" value="add" type="hidden" required/>
										<input name="pw_id" value="<?php echo $_GET['pw_id'] ?>" type="hidden" required/>
										<button type="submit" id="btn_save" class="btn btn-md btn-info pull-right ">
										<i class="fa fa-check"></i>&nbsp;Save
										</button>
										
										<a href="list_ads.php" class="btn btn-md btn-outline-secondary"><i class="ti-close"></i>&nbsp; Cancel</a>
                                
									</div>
									</div>
								</div>
								<?php
								}
								 else if(!empty($_GET['ad_id']) && !empty($_GET['mode'])&& $_GET['mode']=="edit")
								 {
								 $ad_id=$_GET['ad_id'];
								 $query="SELECT 'ad_id',`ad_firstname`, `ad_lastname`,`ad_gender`,`ad_dob`,`ad_joindate`,`ad_emailid`,`ad_mobilenumber` FROM area_development_society where ad_id=$ad_id";
                                  $ads=DataBase::SelectData($query);
								  $adsdetails= mysqli_fetch_array($ads);
								 ?>
								 <div class="card-header">
                                    <strong class="card-title">Edit ADS of <?php echo $row3['pw_name'] ?></strong>
                                    <a href="list_ads.php" class="btn btn-sm btn-outline-primary pull-right"><i class="fa fa-user-circle"></i>&nbsp; List ADS</a>
                                </div>
                                <div class="card-body">
                                   <div class="row">
									<div class="form-group col-md-6">
                                        <label class="control-label mb-1">First Name</label>
                                        <input name="ad_firstname" type="text" value="<?php echo $adsdetails['ad_firstname'] ?>" placeholder="first name of ADS" class="form-control" required/>
                                    </div>
									<div class="form-group col-md-6">
                                        <label class="control-label mb-1">Last Name</label>
                                        <input name="ad_lastname" type="text" value="<?php echo $adsdetails['ad_lastname'] ?>" placeholder="last name of ADS" class="form-control" required/>
                                    </div>
									<div class="form-group col-md-6">
                                        <label class="control-label mb-1">Gender</label>
										<select name="ad_gender" class="form-control">
											<option value="male">Male</option>
											<option value="female">Female</option>
										</select>
									</div>
                                    <div class="form-group col-md-6">
                                        <label class="control-label mb-1">Date of Birth</label>
                                        <input name="ad_dob" type="date" value="<?php echo $adsdetails['ad_dob'] ?>"  max="<?php echo (date("Y")-18)."-".date("m-d"); ?>"  class="form-control" required/>
                                    </div>
									<div class="form-group col-md-6">
                                        <label class="control-label mb-1">Join Date</label>
                                        <input name="ad_joindate" type="date" value="<?php echo $adsdetails['ad_joindate'] ?>" max="<?php echo date("Y-m-d"); ?>" class="form-control" required/>
                                    </div>
									<div class="form-group col-md-6" style='position:relative;'>
                                        <label class="control-label mb-1">Email Id</label>
										<span id="py_email_valid" style=""></span>
                                        <input id="ur_email" name="ad_emailid" type="email" value="<?php echo $adsdetails['ad_emailid'] ?>" placeholder="email id of ADS" class="form-control" required/>
                                    </div>
									<div class="form-group col-md-6" style='position:relative;'>
                                        <label class="control-label mb-1">Mobile Number</label>
										<span id="py_ur_mobile" style=""></span>
                                        <input id="ur_mobile" name="ad_mobilenumber" type="text" value="<?php echo $adsdetails['ad_mobilenumber'] ?>"placeholder="mobile number ADS" class="form-control" required/>
                                    </div>
									<div class="form-group col-md-6 pt-4">
										<input name="ad_id" id="ad_id" value="<?php echo $_GET['ad_id']?>" type="hidden" required/>
										<input name="mode" value="edit" type="hidden" required/>
										
										<button type="submit" id="btn_save" class="btn btn-md btn-info pull-right ">
										<i class="fa fa-check"></i>&nbsp;Edit
										</button>
										
										<a href="list_ADS.php" class="btn btn-md btn-outline-secondary"><i class="ti-close"></i>&nbsp; Cancel</a>
                                
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
            if(!empty($_GET['ad_id'])){
            ?>
            window.emailflag=true;
            window.mobileflag=true;
            <?php
            }
            else{
            ?>
            window.emailflag=false;
            window.mobileflag=false;
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
			function email_validation(){
                $('#py_email_valid').css("display","inline");
				var ur_email = $("#ur_email").val();
				var ad_id = $("#ad_id").val();
               	if(ur_email.length >= 5 && validateEmail(ur_email) ){
					document.getElementById('py_email_valid').innerHTML="<span style='color:orange;'>checking availability...</span>";
					$.ajax({
						type: "POST",  
						url: "../emailid_checking_sql_process.php",  
						data: "ur_email="+ur_email+"&id="+ad_id+"&mode=ad",
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
				var ad_id = $("#ad_id").val();
               	if(ur_mobile.length >= 10 && validateMobile(ur_mobile) ){
					document.getElementById('py_ur_mobile').innerHTML="<span style='color:orange;'>checking availability...</span>";
					$.ajax({
						type: "POST",  
						url: "../mobile_checking_sql_process.php",  
						data: "ur_mobile="+ur_mobile+"&id="+ad_id+"&mode=ad",
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
                if(window.emailflag==true && window.mobileflag==true ) {
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
