<?php
include_once('../../database.php');
$pm_id=$_COOKIE['nregs_id'];

$wk_id=$_GET['wk_id'];
$mode=$_GET['mode'];
if($mode=="approved"){
$query=("update work set wk_adsdate=CURDATE(),wk_adsstatus='approved' where wk_id='$wk_id'");
DataBase::ExecuteQuery($query);
header("Location:../list_waitingapproval_works.php?msg=aprovedsuccess");
}
else if($mode=="rejected")
{
$query=("update work set wk_status='rejected',wk_adsdate=CURDATE(),
wk_adsstatus='rejected',wk_panchayathdate=CURDATE(),
wk_panchayathdate='rejected_by_ads',wk_aedate=CURDATE(),
wk_aestatus='rejected_by_ads',
wk_employeeapprovestrength=0,wk_totalattendance=0,
wk_perheadwages=0,wk_totalcost=0
 where wk_id='$wk_id'");
DataBase::ExecuteQuery($query);
header("Location:../list_waitingapproval_works.php?msg=rejetedsuccess");
}
?>