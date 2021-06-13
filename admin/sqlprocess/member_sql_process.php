<?php
include_once('../../database.php');

$pm_firstname=$_POST['pm_firstname'];
$pm_lastname=$_POST['pm_lastname'];
$pm_gender=$_POST['pm_gender'];
$pm_dob=$_POST['pm_dob'];
$pm_joindate=$_POST['pm_joindate'];
$pm_emailid=$_POST['pm_emailid'];
$pm_mobilenumber=$_POST['pm_mobilenumber'];
$mode=$_POST['mode'];

$pm_status="active";
if($mode=="add")
{
$temp=str_shuffle("abcdefghijklmnopqrstuvwxyz123456790");
$pm_password=substr($temp,2,6);
	$pw_id=$_POST['pw_id'];
$query="update panchayath_ward_member set pm_status='terminate',pm_terminatedate=CURDATE() where pm_status='active' AND pw_id=$pw_id";
DataBase::ExecuteQuery($query);
$query="INSERT INTO `panchayath_ward_member`(`pw_id`,`pm_firstname`, `pm_lastname`, `pm_gender`, `pm_dob`,`pm_joindate`,`pm_emailid`,`pm_mobilenumber`,`pm_status`,pm_password)
VALUES ('$pw_id','$pm_firstname','$pm_lastname','$pm_gender','$pm_dob','$pm_joindate','$pm_emailid','$pm_mobilenumber','$pm_status','$pm_password')";
DataBase::ExecuteQuery($query);
header("Location:../list_wardmembers.php?msg=addsuccess");
}
else if($mode=="edit")
{
	$pm_id=$_POST['pm_id'];
$query=("update panchayath_ward_member set pm_firstname='$pm_firstname', pm_lastname='$pm_lastname',pm_emailid='$pm_emailid',pm_mobilenumber='$pm_mobilenumber',pm_gender='$pm_gender',pm_joindate='$pm_joindate',pm_dob='$pm_dob' where pm_id='$pm_id'");
DataBase::ExecuteQuery($query);
header("Location:../list_wardmembers.php?msg=editsuccess");
}
?>