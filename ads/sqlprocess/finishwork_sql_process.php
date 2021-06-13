<?php
include_once('../../database.php');

$wk_id=$_GET['wk_id'];

$query="update work set wk_status='finished',wk_finishdate=CURDATE() where wk_id=$wk_id";
DataBase::ExecuteQuery($query);
header("Location:../list_attendance_step1.php?msg=addsuccess");

?>