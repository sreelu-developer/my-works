<?php
include_once('../../database.php');
$pw_id=$_POST['pw_id'];
$pw_name=$_POST['pw_name'];
$pw_number=$_POST['pw_number'];
$mode=$_POST['mode'];
if($mode=="add")
{
$query="INSERT INTO `panchayath_ward`(`pw_number`, `pw_name`, `pw_lat`, `pw_lon`)
VALUES ('$pw_number','$pw_name','0','0')";
DataBase::ExecuteQuery($query);
header("Location:../manage_wards.php?msg=addsuccess");
}
else if($mode=="edit")
{
$query=("update panchayath_ward set pw_number='$pw_number', pw_name='$pw_name' where pw_id='$pw_id'");
DataBase::ExecuteQuery($query);
header("Location:../list_wards.php?msg=editsuccess");
}
else if($mode=="delete")
{
$query=("delete from panchayath_ward where pw_id='$pw_id'");
DataBase::ExecuteQuery($query);
header("Location:../list_wards.php?msg=deletesuccess");
}
?>