<?php
include_once('../../database.php');
$mode=$_POST['mode'];
$ps_id=$_POST['ps_id'];
$ps_firstname=$_POST['ps_firstname'];
$ps_lastname=$_POST['ps_lastname'];
$ps_gender=$_POST['ps_gender'];
$ps_dob=$_POST['ps_dob'];
$ps_joindate=$_POST['ps_joindate'];
$ps_emailid=$_POST['ps_emailid'];
$ps_mobilenumber=$_POST['ps_mobilenumber'];
$ps_status="active";
if($mode=="add")
{
$temp=str_shuffle("abcdefghijklmnopqrstuvwxyz123456790");
$ps_password=substr($temp,2,6);

$query="update panchayath_secretary set ps_status='terminate',ps_terminatedate=CURDATE() where ps_status='active'";
DataBase::ExecuteQuery($query);
$query="INSERT INTO `panchayath_secretary`(`ps_firstname`, `ps_lastname`,`ps_gender`,`ps_dob`,`ps_joindate`,`ps_emailid`,`ps_mobilenumber`,`ps_status`,ps_password) 
VALUES ('$ps_firstname','$ps_lastname','$ps_gender','$ps_dob','$ps_joindate','$ps_emailid','$ps_mobilenumber','$ps_status','$ps_password')";
DataBase::ExecuteQuery($query);
header("Location:../manage_panchayath_secretary.php?msg=addsuccess");
}
else if($mode=="edit")
{
$query=("update panchayath_secretary set ps_firstname='$ps_firstname', ps_lastname='$ps_lastname',ps_emailid='$ps_emailid',ps_mobilenumber='$ps_mobilenumber',ps_gender='$ps_gender',ps_joindate='$ps_joindate',ps_dob='$ps_dob' where ps_id='$ps_id'");
DataBase::ExecuteQuery($query);
header("Location:../list_panchayath_secretary.php?msg=editsuccess");
}
?>