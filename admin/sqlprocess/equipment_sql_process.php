<?php
include_once('../../database.php');
$mode=$_POST['mode'];
$eq_id=$_POST['eq_id'];
$eq_name=$_POST['eq_name'];
$eq_charge=$_POST['eq_charge'];
if($mode=="add")
{
$query="INSERT INTO `equipments`(`eq_name`, `eq_charge`) 
VALUES ('$eq_name','$eq_charge')";
DataBase::ExecuteQuery($query);
header("Location:../manage_equipments.php?msg=addsuccess");
}
else if($mode=="edit")
{
$query=("update equipments set eq_name='$eq_name', eq_charge='$eq_charge' where eq_id='$eq_id'");
DataBase::ExecuteQuery($query);
header("Location:../list_equipments.php?msg=editsuccess");
}
else if($mode=="delete")
{
$query=("delete from equipments where eq_id='$eq_id'");
DataBase::ExecuteQuery($query);
header("Location:../list_equipments.php?msg=deletesuccess");
}
?>