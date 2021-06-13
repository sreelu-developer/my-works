<?php
include_once('../../database.php');
$eq_name=$_POST['eq_name'];
$eq_charge=$_POST['eq_charge'];
$query="INSERT INTO `equipments`(`eq_name`, `eq_charge`) 
VALUES ('$eq_name','$eq_charge')";
DataBase::ExecuteQuery($query);
header("Location:../manage_equipments.php?msg=addsuccess");
?>