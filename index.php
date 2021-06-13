<?php
include_once('security_check_guest.php');
?>
<!doctype html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php include_once('admin_title.php'); ?>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href=".assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/scss/style.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>
<body class="bg-dark">
    <div class="sufee-login d-flex justify-content-center align-items-center">
        <div class="container d-flex flex-column justify-content-center align-items-center">
			<img src="images/Digital_india.png" class="mb-2 mt-4"/>
			<img src="images/nrega-1.png" style="width:300px;height:450px;"/>
			<img src="images/Digital_india.png" class="mt-2"/>
		</div>
		<div class="container">
            <div class="login-content">
                <div class="login-logo">
					<a class="text-warning" href="index.php">
                    <br/><h1>THOZHILURAPPU SCHEME MANAGEMENT SYSTEM</h1>
                    </a>
                    <a style='color:#fff;' href="index.php">
                    <br/><h2>SIGN IN</h2>
                    </a>
                </div>
                <div class="login-form">
                    <form action="login_process.php" method="post">
                        <div class="form-group" style="position:relative;">
                            <label>Email address</label>
                            <input type="email" name="lg_username" class="form-control" placeholder="Email" required="true" id="ur_email" />
                            <span id="py_email_valid" style="font-weight:bold;color:red;position:absolute;right:0px;bottom:-20px;display:none;"></span>
											
                        </div>
                        <div class="form-group mb-4">
                            <label>Password</label>
                            <input type="password"  name="lg_password" class="form-control" placeholder="Password" readonly onfocus="this.removeAttribute('readonly');"  required />
                        </div>
                      	 
                         
                        <button id="btn_save"  type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
                    </form>
					<?php
						if(!empty($_GET['status'])&& $_GET['status']=="forgot" ){
					?>
					<div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
						<span class="badge badge-pill badge-primary">Success</span>
							Password Successfully mailed to your registered email id
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php
					}
					if(!empty($_GET['msg'])&& $_GET['msg']=="forogotfail" ){
					?>
					<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
						<span class="badge badge-pill badge-danger">Failed</span>
							Internal Mail Server Issue, Please Try again after some time
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php
					}
					if(!empty($_GET['msg'])&& $_GET['msg']=="failed" ){
					?>	
						<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
						<span class="badge badge-pill badge-danger">Failed</span>
							Invalid Login Details
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php
					}
					?>							
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/vendor/jquery-1.11.3.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script>
			$(document).ready(function(){
      		var typingTimer;   
			var doneTypingInterval = 800;
			$(document).on("input","#ur_email",function(e) {
				e.preventDefault();
				$("#btn_save").prop('disabled', true);
				$('#py_email_valid').css("display","inline");
				clearTimeout(typingTimer);	
				if ($('#ur_email').val){
					typingTimer = setTimeout(function(){
						email_validation();
					},doneTypingInterval);
				}
			});
			function email_validation(){
				var ur_email = $("#ur_email").val();
				if(ur_email.length >= 5 && validateEmail(ur_email) ){
					
								document.getElementById('py_email_valid').innerHTML="<span style='color:green'><i>"+ur_email+" </i> is valid email id !!!</span>";
								$("#btn_save").prop('disabled', false);
							}
			
				else{
					document.getElementById('py_email_valid').innerHTML="<span>please enter a valid email</span>";
					$("#btn_save").prop('disabled', true);			
				}
			}
			 function validateEmail($email) {
			  var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
			  return emailReg.test( $email );
			}
			});
	</script>	

</body>
</html>
