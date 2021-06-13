<?php
include_once('../../database.php');
$mode=$_POST['mode'];
$ae_id=$_POST['ae_id'];
$ae_firstname=$_POST['ae_firstname'];
$ae_lastname=$_POST['ae_lastname'];
$ae_gender=$_POST['ae_gender'];
$ae_dob=$_POST['ae_dob'];
$ae_joindate=$_POST['ae_joindate'];
$ae_emailid=$_POST['ae_emailid'];
$ae_mobilenumber=$_POST['ae_mobilenumber'];
$ae_status="active";

if($mode=="add")
{
$temp=str_shuffle("abcdefghijklmnopqrstuvwxyz123456790");
$ae_password=substr($temp,2,6);
$query="update assistant_engineer set ae_status='terminate',ae_terminatedate=CURDATE() where ae_status='active'";
DataBase::ExecuteQuery($query);
$query="INSERT INTO `assistant_engineer`(`ae_firstname`, `ae_lastname`,`ae_gender`,`ae_dob`,`ae_joindate`,`ae_emailid`,`ae_mobilenumber`,ae_status,ae_password)
VALUES ('$ae_firstname','$ae_lastname','$ae_gender','$ae_dob','$ae_joindate','$ae_emailid','$ae_mobilenumber','$ae_status','$ae_password')";
DataBase::ExecuteQuery($query);
header("Location:../manage_assistant_engineer.php?msg=addsuccess");
}
else if($mode=="edit")
{
$query=("update assistant_engineer set ae_firstname='$ae_firstname', ae_lastname='$ae_lastname',ae_emailid='$ae_emailid',ae_mobilenumber='$ae_mobilenumber',ae_gender='$ae_gender',ae_joindate='$ae_joindate',ae_dob='$ae_dob' where ae_id='$ae_id'");
DataBase::ExecuteQuery($query);
header("Location:../list_assistant_engineer.php?msg=editsuccess");
}
?>