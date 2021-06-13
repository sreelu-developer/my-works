<?php
include_once('../../database.php');

$wk_id=$_GET['wk_id'];

$query="update work set wk_status='started',wk_startdate=CURDATE() where wk_id=$wk_id";
DataBase::ExecuteQuery($query);
header("Location:../list_start_work.php?msg=addsuccess");

?>