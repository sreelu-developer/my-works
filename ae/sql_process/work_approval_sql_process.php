<?php
include_once('../../database.php');
$wk_id=$_GET['wk_id'];
$mode=$_GET['mode'];
if($mode=="approved"){
$query=("update work set wk_aedate=CURDATE(),wk_aestatus='approved',wk_status='approved' where wk_id='$wk_id'");
DataBase::ExecuteQuery($query);
header("Location:../list_waitingapproval_works.php?msg=aprovedsuccess");
}
else if($mode=="rejected"){
$query=("update work set wk_status='rejected',wk_aestatus=CURDATE(),
wk_aestatus='rejected'
wk_employeeapprovestrength=0,wk_totalattendance=0,
wk_perheadwages=0,wk_totalcost=0
 where wk_id='$wk_id'");
DataBase::ExecuteQuery($query);
header("Location:../list_waitingapproval_works.php?msg=rejetedsuccess");
}
?>