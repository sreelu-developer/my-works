<?php
include_once('../../database.php');
$mode=$_POST['mode'];
$wa_id=$_POST['wa_id'];
$em_id=$_POST['em_id'];
$wk_id=$_POST['wk_id'];
if($mode=="add"){
$query="INSERT INTO work_employee_allotment(`wa_id`,`wk_id`,`em_id`)
VALUES ('$wa_id','$wk_id','$em_id')";
DataBase::ExecuteQuery($query);
header("Location:../list_employee_allotment_step2.php?wk_id=$wk_id&msg=addsuccess");
}
else if($mode=="edit"){
}
?>