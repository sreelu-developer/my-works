<?php
include_once('security_check_member.php');
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
    <style>
    #py_ur_mobile{
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
    $currentmenu="Apply-New-Work";
     include_once('left_nav.php');
    ?>
    <div id="right-panel" class="right-panel">
        <?php include_once('../admin/top_header.php'); ?>   
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                     <div class="col-md-10 offset-md-1">
                         <div class="card">
                            <form action="sqlprocess/works_sql_process.php" method="post" autocomplete="off" >
							  <?php 
							 if(empty($_GET['wk_id']) && empty($_GET['mode'])){
							 ?>
							    
                                <div class="card-header">
                                    <strong class="card-title">Work Registration Form</strong>
                                </div>
                                <div class="card-body">
                                   <div class="row">
										<div class="form-group col-md-6">
											<label for="exampleFormControlSelect1">Select Work Type</label>
											<select class="form-control" name="wk_type" required>
												<option value="">Select A Work Type</option>
												<option value="privateproperty">Private Property</option>
												<option value="publicproperty">Public Property</option>
											</select>
										</div>
										<div class="form-group col-md-6" style='position:relative;'>
											 <span id="py_ur_mobile" style=""></span>
											<label class="control-label">Contact Number</label>
											<input id="ur_mobile" name="wk_contract" type="text" placeholder="work contact number" class="form-control" required/>
										</div>
										<div class="form-group col-md-6">
											<label for="exampleFormControlTextarea1">Address</label>
											<textarea  name="wk_address" class="form-control" rows="3"></textarea>
										</div>
										<div class="form-group col-md-6">
											<label class="control-label">Needed Employees for work</label>
											<input name="wk_employeeapplystrength" type="number" placeholder="needed employees for work" class="form-control" required/>
										</div>
                                 		<div class="form-group col-md-12">
										<input name="wk_id" value="0" type="hidden" required/>
										<input name="mode" value="add" type="hidden" required/>
										<button type="submit" id="btn_save"  class="btn btn-md btn-info pull-right ">
										<i class="fa fa-check"></i>&nbsp;Save
										</button>
										</div>
									</div>
								</div>
								<?php
								}
								 else if(!empty($_GET['wk_id']) && !empty($_GET['mode'])&& $_GET['mode']=="edit")
								 {
								 $wk_id=$_GET['wk_id'];
								 $query="SELECT `wk_id`, `pw_id`, `ad_id`, `wk_type`, `wk_address`, 
								 `wk_startdate`, `wk_finishdate`,
								 `wk_status`, `wk_memberapplydate`, `wk_contract`,
								 `wk_employeeapplystrength`, `wk_adsdate`,
								 `wk_adsstatus`, `wk_panchayathdate`, `wk_panchayathstatus`, 
								 `wk_aedate`, `wk_aestatus`, `wk_employeeapprovestrength`, 
								 `wk_totalattendance`, `wk_perheadwages`, `wk_totalcost` 
								 FROM `work` where wk_id=$wk_id";
                                  $ads=DataBase::SelectData($query);
								  $workdetails= mysqli_fetch_array($ads);
								 ?>
								 <div class="card-header">
                                    <strong class="card-title">Edit Registration Form</strong>
                                </div>
                                <div class="card-body">
                                   <div class="row">
										<div class="form-group col-md-6">
											<label for="exampleFormControlSelect1">Select Work Type</label>
											<select class="form-control" name="wk_type" required>
												<option value="">Select A Work Type</option>
												<option value="privateproperty" <?php if($workdetails['wk_type']=='privateproperty'){ echo 'selected';} ?> >Private Property</option>
												<option value="publicproperty" <?php if($workdetails['wk_type']=='publicproperty'){ echo 'selected';} ?>>Public Property</option>
											</select>
										</div>
										<div class="form-group col-md-6" style='position:relative;'>
										 <span id="py_ur_mobile" style=""></span>
											<label class="control-label">Contact Number</label>
											<input id="ur_mobile" name="wk_contract" value="<?php echo $workdetails['wk_contract'];  ?>" type="text" placeholder="work contact number" class="form-control" required/>
										</div>
										<div class="form-group col-md-6">
											<label for="exampleFormControlTextarea1">Address</label>
											<textarea  name="wk_address" class="form-control" rows="3"><?php echo $workdetails['wk_address'];  ?></textarea>
										</div>
										<div class="form-group col-md-6">
											<label class="control-label">Needed Employees for work</label>
											<input name="wk_employeeapplystrength" value="<?php echo $workdetails['wk_employeeapplystrength'];  ?>" type="number" placeholder="needed employees for work" class="form-control" required/>
										</div>
                                 		<div class="form-group col-md-12">
										<input name="wk_id" value="<?php echo $workdetails['wk_id'];  ?>" type="hidden" required/>
										<input name="mode" value="edit" type="hidden" required/>
										<a href="list_newapplied_works.php" class="btn btn-md btn-outline-secondary">CANCEL</a>
										
										<button type="submit" id="btn_save" class="btn btn-md btn-info pull-right ">
										<i class="fa fa-check"></i>&nbsp;Edit
										</button>
										</div>
									</div>
								</div>
								<?php
								}
								 else if(!empty($_GET['wk_id']) && !empty($_GET['mode'])&& $_GET['mode']=="delete")
								 {
								 $wk_id=$_GET['wk_id'];
								 $query="SELECT `wk_id`, `pw_id`, `ad_id`, `wk_type`, `wk_address`, 
								 `wk_startdate`, `wk_finishdate`,
								 `wk_status`, `wk_memberapplydate`, `wk_contract`,
								 `wk_employeeapplystrength`, `wk_adsdate`,
								 `wk_adsstatus`, `wk_panchayathdate`, `wk_panchayathstatus`, 
								 `wk_aedate`, `wk_aestatus`, `wk_employeeapprovestrength`, 
								 `wk_totalattendance`, `wk_perheadwages`, `wk_totalcost` 
								 FROM `work` where wk_id=$wk_id";
                                  $ads=DataBase::SelectData($query);
								  $workdetails= mysqli_fetch_array($ads);
								?>
								 <div class="card-header">
                                    <strong class="card-title">Delete Registration Form</strong>
                                </div>
                                <div class="card-body">
                                   <div class="row">
										<div class="form-group col-md-6">
											<label for="exampleFormControlSelect1">Select Work Type</label>
											<select class="form-control" name="wk_type" readonly required>
												<option value="">Select A Work Type</option>
												<option value="privateproperty" <?php if($workdetails['wk_type']=='privateproperty'){ echo 'selected';} ?> >Private Property</option>
												<option value="publicproperty" <?php if($workdetails['wk_type']=='publicproperty'){ echo 'selected';} ?>>Public Property</option>
											</select>
										</div>
										<div class="form-group col-md-6">
											<label class="control-label">Contact Number</label>
											<input name="wk_contract" value="<?php echo $workdetails['wk_contract'];  ?>" type="text" placeholder="work contact number" class="form-control" readonly required/>
										</div>
										<div class="form-group col-md-6">
											<label for="exampleFormControlTextarea1">Address</label>
											<textarea  name="wk_address" class="form-control" rows="3" readonly><?php echo $workdetails['wk_address'];  ?></textarea>
										</div>
										<div class="form-group col-md-6">
											<label class="control-label">Needed Employees for work</label>
											<input name="wk_employeeapplystrength" value="<?php echo $workdetails['wk_employeeapplystrength'];  ?>" type="number" placeholder="needed employees for work" class="form-control" readonly required/>
										</div>
                                 		<div class="form-group col-md-12">
										<input name="wk_id" value="<?php echo $workdetails['wk_id'];  ?>" type="hidden" required/>
										<input name="mode" value="delete" type="hidden" required/>
										<a href="list_newapplied_works.php" class="btn btn-md btn-outline-secondary">CANCEL</a>
											
										<button type="submit" class="btn btn-md btn-info pull-right ">
										<i class="fa fa-check"></i>&nbsp;Delete
										</button>
										
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
			window.mobileflag=false;
			
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
			
            function mobile_validation(){
                $('#py_ur_mobile').css("display","inline");
				var ur_mobile = $("#ur_mobile").val();
                var sp_id = $("#sp_id").val();
				if(ur_mobile.length >= 10 && validateMobile(ur_mobile) ){
					document.getElementById('py_ur_mobile').innerHTML="<span style='color:green'>is a valid mobile number</span>";
			        window.mobileflag=true;
                    finalvalidate();
				}
				else{
					document.getElementById('py_ur_mobile').innerHTML="<span>please enter a valid mobile number</span>";
			        window.mobileflag=false;
                    finalvalidate();			
				}
               
            }
            
            function validateMobile($mobile) {
            var mobileReg = /^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[789]\d{9}$/;
            return mobileReg.test( $mobile );
            }
            function finalvalidate(){
                if(window.mobileflag==true ) {
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
