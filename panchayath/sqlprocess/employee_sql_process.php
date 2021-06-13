<?php
include_once('../../database.php');
$em_firstname=$_POST['em_firstname'];
$em_lastname=$_POST['em_lastname'];
$em_gender=$_POST['em_gender'];
$em_dob=$_POST['em_dob'];
$em_joindate=$_POST['em_joindate'];
$em_emailid=$_POST['em_emailid'];
$em_mobilenumber=$_POST['em_mobilenumber'];
$mode=$_POST['mode'];
$em_status="active";
$ad_id=$_POST['ad_id'];
if($mode=="add")
{
$pw_id=$_POST['pw_id'];
$query="INSERT INTO `employees`(`pw_id`,`ad_id`,`em_firstname`, `em_lastname`, `em_gender`, `em_dob`,`em_emailid`,`em_mobilenumber`,`em_status`)
VALUES ('$pw_id','$ad_id','$em_firstname','$em_lastname','$em_gender','$em_dob','$em_emailid','$em_mobilenumber','$em_status')";
DataBase::ExecuteQuery($query);
header("Location:../list_employees.php?msg=addsuccess");
}
else if($mode=="edit")
{
$em_id=$_POST['em_id'];
$query=("update employees set em_firstname='$em_firstname', em_lastname='$em_lastname',em_emailid='$em_emailid',em_mobilenumber='$em_mobilenumber',em_gender='$em_gender',em_dob='$em_dob' where em_id='$em_id'");
DataBase::ExecuteQuery($query);
header("Location:../list_employees.php?msg=editsuccess");
}
?>