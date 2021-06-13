<?php
include_once('database.php');
$lg_username=$_POST['lg_username'];
$lg_password=$_POST['lg_password'];
$query="SELECT * FROM web_administrator where wa_username='$lg_username' AND wa_password='$lg_password'";
$data=database::SelectData($query);
if(mysqli_num_rows($data)!=0){
$user=mysqli_fetch_array($data);
setcookie("nregs_id",$user['wa_id'],time()+(60*60*24*30));
setcookie("nregs_usertype","webadmin",time()+(60*60*24*30));
header('Location:admin/list_equipments.php');
}
else{
 $query1="SELECT * FROM area_development_society where ad_emailid='$lg_username' AND ad_password='$lg_password'";
$data1=database::SelectData($query1);
if(	mysqli_num_rows($data1)!=0){
$user1=mysqli_fetch_array($data1);	
setcookie("nregs_id",$user1['ad_id'],time()+(60*60*24*30));
setcookie("nregs_usertype","ads",time()+(60*60*24*30));
header('Location:ads/list_employees.php');
}
else{
 $query2="SELECT * FROM assistant_engineer where ae_emailid='$lg_username' AND ae_password='$lg_password'";
$data2=database::SelectData($query2);	
if(	mysqli_num_rows($data2)!=0){
$user2=mysqli_fetch_array($data2);	
setcookie("nregs_id",$user2['ae_id'],time()+(60*60*24*30));
setcookie("nregs_usertype","ae",time()+(60*60*24*30));
header('Location:ae/list_ads.php');
}
else{
$query2="SELECT * FROM panchayath_secretary where ps_emailid='$lg_username' AND ps_password='$lg_password'";
$data2=database::SelectData($query2);	
if(	mysqli_num_rows($data2)!=0){
$user2=mysqli_fetch_array($data2);	
setcookie("nregs_id",$user2['ps_id'],time()+(60*60*24*30));
setcookie("nregs_usertype","panchayath",time()+(60*60*24*30));
header('Location:panchayath/list_waitingapproval_works.php');
}
else{
$query2="SELECT * FROM panchayath_ward_member where pm_emailid='$lg_username' AND pm_password='$lg_password'";
$data2=database::SelectData($query2);	
if(mysqli_num_rows($data2)!=0){
$user2=mysqli_fetch_array($data2);	
setcookie("nregs_id",$user2['pm_id'],time()+(60*60*24*30));
setcookie("nregs_usertype","member",time()+(60*60*24*30));
header('Location:member/list_finished_works.php');
}
else{
$query2="SELECT * FROM `employees`  where em_emailid='$lg_username' AND em_password='$lg_password'";
$data2=database::SelectData($query2);
if(mysqli_num_rows($data2)!=0){	
	$user2=mysqli_fetch_array($data2);	
	setcookie("nregs_id",$user2['em_id'],time()+(60*60*24*30));
	setcookie("nregs_usertype","employee",time()+(60*60*24*30));
	header('Location:employee/list_employees_attendance_step2.php');
}
else{
	header('Location:index.php?msg=failed');
}
}
}
}
}
}
?>