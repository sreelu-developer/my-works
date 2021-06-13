<?php
include_once('../../database.php');

$ad_firstname=$_POST['ad_firstname'];
$ad_lastname=$_POST['ad_lastname'];
$ad_gender=$_POST['ad_gender'];
$ad_dob=$_POST['ad_dob'];
$ad_joindate=$_POST['ad_joindate'];
$ad_emailid=$_POST['ad_emailid'];
$ad_mobilenumber=$_POST['ad_mobilenumber'];
$mode=$_POST['mode'];
$ad_status="active";
if($mode=="add")
{
$temp=str_shuffle("abcdefghijklmnopqrstuvwxyz123456790");
$ad_password=substr($temp,2,6);
$pw_id=$_POST['pw_id'];
$query="update area_development_society set ad_status='terminate',ad_terminatedate=CURDATE() where ad_status='active' AND pw_id=$pw_id";
DataBase::ExecuteQuery($query);
$query="INSERT INTO `area_development_society`(`pw_id`,`ad_firstname`, `ad_lastname`, `ad_gender`, `ad_dob`,`ad_joindate`,`ad_emailid`,`ad_mobilenumber`,`ad_status`,ad_password)
VALUES ('$pw_id','$ad_firstname','$ad_lastname','$ad_gender','$ad_dob','$ad_joindate','$ad_emailid','$ad_mobilenumber','$ad_status','$ad_password')";
DataBase::ExecuteQuery($query);
header("Location:../list_ads.php?msg=addsuccess");
}
else if($mode=="edit")
{
	$ad_id=$_POST['ad_id'];
$query=("update area_development_society set ad_firstname='$ad_firstname', ad_lastname='$ad_lastname',ad_emailid='$ad_emailid',ad_mobilenumber='$ad_mobilenumber',ad_gender='$ad_gender',ad_joindate='$ad_joindate',ad_dob='$ad_dob' where ad_id='$ad_id'");
DataBase::ExecuteQuery($query);
header("Location:../list_ads.php?msg=editsuccess");
}
?>