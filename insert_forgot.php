<?php
 include_once 'database.php';

 $Query="SELECT `ad_id`, `pw_id`, `ad_firstname`, `ad_lastname`, `ad_gender`, `ad_dob`, `ad_joindate`, `ad_terminatedate`, `ad_emailid`, `ad_password`, `ad_mobilenumber`, `ad_status` FROM `area_development_society`
 where ad_emailid='".$_POST['lg_username']."'";
	$data=database::SelectData($Query);
	if(mysqli_num_rows($data)!=0)
	{

$sub="FORGOT PASSWORD REQUEST FROM NREGS MANAGEMENT APPLICATION";
$rows=mysqli_fetch_array($data);

$msg = "YOUR PASSWORD IS : ".$rows['ad_password'];

//$msg = wordwrap($msg,500);
//mail($eg_email,$sub,$msg);



require_once('ajax/phpmailer/PHPMailerAutoload.php');

define('GUSER', '229anusree@gmail.com'); // GMail username
define('GPWD', 'guruji123'); // GMail password

function smtpmailer($to, $from, $from_name, $subject, $body) { 
	global $error;
	$mail = new PHPMailer();  // create a new object
	$mail->IsSMTP(); // enable SMTP
	$mail->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
	$mail->SMTPAuth = true;  // authentication enabled
	$mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for GMail
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 587; 
	$mail->Username = '229rajeev@gmail.com';  
	$mail->Password = 'eatntreatssold';           
	$mail->SetFrom($from, $from_name);
	$mail->Subject = $subject;
	$mail->Body = $body;
	$mail->AddAddress($to);
	if(!$mail->Send()) {
		$error = 'Mail error: '.$mail->ErrorInfo; 
		return false;
	} else {
		$error = 'Message sent!';
		return true;
	}
}
smtpmailer($_POST['lg_username'], '229rajeev@gmail.com', 'NREGS MANAGEMENT APPLICATION',$sub,$msg);
header('location:index.php?status=forgot');	
}
else{
	$Query="SELECT `ae_id`, `ae_firstname`, `ae_lastname`, `ae_gender`, `ae_dob`, `ae_joindate`,
	`ae_terminatedate`, `ae_emailid`, `ae_password`, `ae_mobilenumber`, `ae_status` FROM `assistant_engineer` 
	where ae_emailid='".$_POST['lg_username']."'";
	$data=database::SelectData($Query);
	if(mysqli_num_rows($data)!=0)
	{

$sub="FORGOT PASSWORD REQUEST FROM NREGS MANAGEMENT APPLICATION";
$rows=mysqli_fetch_array($data);

$msg = "YOUR PASSWORD IS : ".$rows['ae_password'];

//$msg = wordwrap($msg,500);
//mail($eg_email,$sub,$msg);



require_once('ajax/phpmailer/PHPMailerAutoload.php');

define('GUSER', '229anusree@gmail.com'); // GMail username
define('GPWD', 'guruji123'); // GMail password

function smtpmailer($to, $from, $from_name, $subject, $body) { 
	global $error;
	$mail = new PHPMailer();  // create a new object
	$mail->IsSMTP(); // enable SMTP
	$mail->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
	$mail->SMTPAuth = true;  // authentication enabled
	$mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for GMail
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 587; 
	$mail->Username = '229rajeev@gmail.com';  
	$mail->Password = 'eatntreatssold';           
	$mail->SetFrom($from, $from_name);
	$mail->Subject = $subject;
	$mail->Body = $body;
	$mail->AddAddress($to);
	if(!$mail->Send()) {
		$error = 'Mail error: '.$mail->ErrorInfo; 
		return false;
	} else {
		$error = 'Message sent!';
		return true;
	}
}
smtpmailer($_POST['lg_username'], '229rajeev@gmail.com', 'NREGS MANAGEMENT APPLICATION',$sub,$msg);
header('location:index.php?status=forgot');	
	}
	else
	{
		
		
	$Query="SELECT `ps_id`, `ps_firstname`, `ps_lastname`, `ps_gender`, `ps_dob`,
	`ps_joindate`, `ps_terminatedate`, `ps_emailid`, `ps_password`, 
	`ps_mobilenumber`, `ps_status` FROM `panchayath_secretary` 
	where ps_emailid='".$_POST['lg_username']."'";
	$data=database::SelectData($Query);
	if(mysqli_num_rows($data)!=0)
	{

$sub="FORGOT PASSWORD REQUEST FROM NREGS MANAGEMENT APPLICATION";
$rows=mysqli_fetch_array($data);

$msg = "YOUR PASSWORD IS : ".$rows['ps_password'];

//$msg = wordwrap($msg,500);
//mail($eg_email,$sub,$msg);



require_once('ajax/phpmailer/PHPMailerAutoload.php');

define('GUSER', '229anusree@gmail.com'); // GMail username
define('GPWD', 'guruji123'); // GMail password

function smtpmailer($to, $from, $from_name, $subject, $body) { 
	global $error;
	$mail = new PHPMailer();  // create a new object
	$mail->IsSMTP(); // enable SMTP
	$mail->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
	$mail->SMTPAuth = true;  // authentication enabled
	$mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for GMail
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 587; 
	$mail->Username = '229rajeev@gmail.com';  
	$mail->Password = 'eatntreatssold';           
	$mail->SetFrom($from, $from_name);
	$mail->Subject = $subject;
	$mail->Body = $body;
	$mail->AddAddress($to);
	if(!$mail->Send()) {
		$error = 'Mail error: '.$mail->ErrorInfo; 
		return false;
	} else {
		$error = 'Message sent!';
		return true;
	}
}
smtpmailer($_POST['lg_username'], '229rajeev@gmail.com', 'NREGS MANAGEMENT APPLICATION',$sub,$msg);
header('location:index.php?status=forgot');	
		
		
		
	}else{
		
		
		
	$Query="SELECT `pm_id`, `pw_id`, `pm_firstname`, `pm_lastname`, `pm_gender`, 
	`pm_dob`, `pm_joindate`, `pm_terminatedate`, `pm_emailid`,
	`pm_mobilenumber`, `pm_password`, `pm_status` 
	FROM `panchayath_ward_member` 
	where pm_emailid='".$_POST['lg_username']."'";
	$data=database::SelectData($Query);
	if(mysqli_num_rows($data)!=0)
	{

$sub="FORGOT PASSWORD REQUEST FROM NREGS MANAGEMENT APPLICATION";
$rows=mysqli_fetch_array($data);

$msg = "YOUR PASSWORD IS : ".$rows['pm_password'];

//$msg = wordwrap($msg,500);
//mail($eg_email,$sub,$msg);



require_once('ajax/phpmailer/PHPMailerAutoload.php');

define('GUSER', '229anusree@gmail.com'); // GMail username
define('GPWD', 'guruji123'); // GMail password

function smtpmailer($to, $from, $from_name, $subject, $body) { 
	global $error;
	$mail = new PHPMailer();  // create a new object
	$mail->IsSMTP(); // enable SMTP
	$mail->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
	$mail->SMTPAuth = true;  // authentication enabled
	$mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for GMail
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 587; 
	$mail->Username = '229rajeev@gmail.com';  
	$mail->Password = 'eatntreatssold';           
	$mail->SetFrom($from, $from_name);
	$mail->Subject = $subject;
	$mail->Body = $body;
	$mail->AddAddress($to);
	if(!$mail->Send()) {
		$error = 'Mail error: '.$mail->ErrorInfo; 
		return false;
	} else {
		$error = 'Message sent!';
		return true;
	}
}
smtpmailer($_POST['lg_username'], '229rajeev@gmail.com', 'NREGS MANAGEMENT APPLICATION',$sub,$msg);
header('location:index.php?status=forgot');	
		
		
		
	}
	else{
	
$Query="SELECT `em_id`, `pw_id`, `ad_id`, `em_firstname`, `em_lastname`, 
`em_gender`, `em_dob`, `em_emailid`, `em_mobilenumber`, 
`em_rationcardnumber`, `em_password`, `em_approvalstatus`,
`em_status` FROM `employees` 
	where em_emailid='".$_POST['lg_username']."'";
	$data=database::SelectData($Query);
	if(mysqli_num_rows($data)!=0)
	{

$sub="FORGOT PASSWORD REQUEST FROM NREGS MANAGEMENT APPLICATION";
$rows=mysqli_fetch_array($data);

$msg = "YOUR PASSWORD IS : ".$rows['em_password'];

//$msg = wordwrap($msg,500);
//mail($eg_email,$sub,$msg);



require_once('ajax/phpmailer/PHPMailerAutoload.php');

define('GUSER', '229anusree@gmail.com'); // GMail username
define('GPWD', 'guruji123'); // GMail password

function smtpmailer($to, $from, $from_name, $subject, $body) { 
	global $error;
	$mail = new PHPMailer();  // create a new object
	$mail->IsSMTP(); // enable SMTP
	$mail->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
	$mail->SMTPAuth = true;  // authentication enabled
	$mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for GMail
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 587; 
	$mail->Username = '229rajeev@gmail.com';  
	$mail->Password = 'eatntreatssold';           
	$mail->SetFrom($from, $from_name);
	$mail->Subject = $subject;
	$mail->Body = $body;
	$mail->AddAddress($to);
	if(!$mail->Send()) {
		$error = 'Mail error: '.$mail->ErrorInfo; 
		return false;
	} else {
		$error = 'Message sent!';
		return true;
	}
}
smtpmailer($_POST['lg_username'], '229rajeev@gmail.com', 'NREGS MANAGEMENT APPLICATION',$sub,$msg);
header('location:index.php?status=forgot');	
		
		
		
	}else{
			header('location:forgotpassword.php?status=failed');
	}		
		
	}

	
	}
}
}
	?>
	
	
	