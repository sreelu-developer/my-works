<?php
include_once('../../database.php');
$wk_id=$_GET['wk_id'];
$wa_id=$_GET['wa_id'];
$wr_date=$_GET['wr_date'];

$query="INSERT INTO `work_attendance`(`wa_id`, `wk_id`, `wr_date`)
VALUES('$wa_id','$wk_id','$wr_date')";
DataBase::ExecuteQuery($query);

$query="update work set wk_totalattendance=wk_totalattendance+1,
wk_totalcost=wk_perheadwages+wk_totalcost where wk_id=$wk_id";
DataBase::ExecuteQuery($query);

header("Location:../list_attendance_step2.php?wr_date=$wr_date&wk_id=$wk_id&msg=addsuccess");

?>