<?php
include_once('../database.php');
include_once('security_check_admin.php');
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
    #py_ur_code{
        font-weight:bold;
        color:red;
        position:absolute;
        right:0px;
        top:0px;
        display:none;
        font-size:small;

    }
    </style>
</head>
<body>
    <?php
    $currentmenu="wards";
     include_once('left_nav.php');
    ?>
    <div id="right-panel" class="right-panel">
        <?php include_once('top_header.php'); ?>   
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                     <div class="col-md-6 offset-md-3">
						<?php
						if(!empty($_GET['msg']) && $_GET['msg']=="addsuccess"){
						?>
                        <div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
                            <span class="badge badge-pill badge-primary">Success</span>
                                Ward Successfully Created
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
						<?php
						}
						?>
                        <div class="card">
                             <form action="sqlprocess/ward_sql_process.php" method="post" autocomplete="off" >
							 <?php 
							 if(empty($_GET['pw_id']) && empty($_GET['mode'])){
							 ?>
                                <div class="card-header">
                                    <strong class="card-title">New Ward</strong>
                                    <a href="list_wards.php" class="btn btn-sm btn-outline-primary pull-right"><i class="fa fa-flask"></i>&nbsp; List Wards</a>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="control-label mb-1">Ward Name</label>
                                        <input name="pw_name" type="text" placeholder="ward name" class="form-control" required/>
                                    </div>
                                     <div class="form-group" style='position:relative;'>
                                        <label class="control-label mb-1">Ward Number</label>
                                         <span id="py_ur_code" style=""></span>
										<input id="ur_code"  name="pw_number" type="text" placeholder="ward number" class="form-control" required/>
                                    </div>
									<input name="pw_id" value="0" type="hidden" required/>
									<input name="mode" value="add" type="hidden" required/>
                                    <button type="submit" id="btn_save" class="btn btn-md btn-info pull-right ">
                                    <i class="fa fa-check"></i>&nbsp;Save
                                    </button>
                                    <a href="manage_wards.php" class="btn btn-md btn-outline-secondary"><i class="ti-close"></i>&nbsp; Cancel</a>
                                </div>
								<?php
								}
								 else if(!empty($_GET['pw_id']) && !empty($_GET['mode'])&& $_GET['mode']=="edit")
								 {
						
								 $pw_id=$_GET['pw_id'];
								 $query="SELECT 'pw_id',`pw_number`, `pw_name` FROM panchayath_ward where pw_id=$pw_id";
                                  $ward=DataBase::SelectData($query);
								  $warddetails= mysqli_fetch_array($ward);
								 ?>
								 <div class="card-header">
                                    <strong class="card-title">Edit Ward</strong>
                                    <a href="list_wards.php" class="btn btn-sm btn-outline-primary pull-right"><i class="fa fa-flask"></i>&nbsp; List Wards</a>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="control-label mb-1">Ward Name</label>
                                        <input name="pw_name" value="<?php echo $warddetails['pw_name'] ?>" type="text" placeholder="ward name" class="form-control" required/>
                                    </div>
                                     <div class="form-group" style='position:relative;'>
                                        <label class="control-label mb-1">Ward Number</label>
										<span id="py_ur_code" style=""></span>
                                        <input id="ur_code" name="pw_number" value="<?php echo $warddetails['pw_number'] ?>" type="text" placeholder="ward number" class="form-control" required/>
                                    </div>
									<input name="pw_id" value="<?php echo $pw_id; ?>" type="hidden" required/>
									<input name="mode" value="edit" type="hidden" required/>
                                    <button type="submit" id="btn_save" class="btn btn-md btn-info pull-right ">
                                    <i class="fa fa-check"></i>&nbsp;Edit
                                    </button>
                                    <a href="manage_wards.php" class="btn btn-md btn-outline-secondary"><i class="ti-close"></i>&nbsp; Cancel</a>
                                </div>
								<?php
								}
								else if(!empty($_GET['pw_id']) && !empty($_GET['mode'])&& $_GET['mode']=="delete"){
								$pw_id=$_GET['pw_id'];
								 $query="SELECT 'pw_id',`pw_number`, `pw_name` FROM panchayath_ward where pw_id=$pw_id";
                                  $ward=DataBase::SelectData($query);
								  $warddetails= mysqli_fetch_array($ward);
								 ?>
								<div class="card-header">
                                    <strong class="card-title">Delete Ward</strong>
                                    <a href="list_wards.php" class="btn btn-sm btn-outline-primary pull-right"><i class="fa fa-flask"></i>&nbsp; List Wards</a>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="control-label mb-1">Ward Name</label>
                                        <input name="pw_name" value="<?php echo $warddetails['pw_name'] ?>" type="text" placeholder="ward name" class="form-control" required readonly />
                                    </div>
                                     <div class="form-group">
                                        <label class="control-label mb-1">Ward Number</label>
                                        <input name="pw_number" value="<?php echo $warddetails['pw_number'] ?>" type="text" placeholder="ward number" class="form-control" required readonly />
                                    </div>
									<input name="pw_id" value="<?php echo $pw_id; ?>" type="hidden" required/>
									<input name="mode" value="delete" type="hidden" required/>
                                    <button type="submit" class="btn btn-md btn-info pull-right ">
                                    <i class="fa fa-check"></i>&nbsp;Delete
                                    </button>
                                    <a href="manage_wards.php" class="btn btn-md btn-outline-secondary"><i class="ti-close"></i>&nbsp; Cancel</a>
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
           
            window.codeflag=false;
          	
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
            function code_validation(){
                $('#py_ur_code').css("display","inline");
				var ur_code = $("#ur_code").val();
               	if(ur_code.length >= 1 ){
					document.getElementById('py_ur_code').innerHTML="<span style='color:orange;'>checking availability...</span>";
					$.ajax({
						type: "POST",  
						url: "../wardnumber_checking_sql_process.php",  
						data: "ur_code="+ur_code,
						success: function(msg){	
						
							if(msg=="exsists"){
								document.getElementById('py_ur_code').innerHTML="<span><i>"+ur_code+" </i> is already used !!!</span>";
                                window.codeflag=false;
                            
							}
							else{
								document.getElementById('py_ur_code').innerHTML="<span style='color:green'><i>"+ur_code+" </i> is available !!!</span>";
                                window.codeflag=true;
                            
							}
                            finalvalidate();
						}				
					});
				}
				else{
					document.getElementById('py_ur_code').innerHTML="<span>minimum 1 charecters required</span>";
                    window.codeflag=false;
                    finalvalidate();			
				}
                
            }
            function finalvalidate(){
                if(window.codeflag==true ) {
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
