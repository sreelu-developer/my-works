<?php
include_once('../../database.php');
$pm_id=$_COOKIE['nregs_id'];
$query1="SELECT `pm_id`,`pw_number`,panchayath_ward_member.pw_id,`pw_name`,`pm_firstname`, `pm_lastname`, `pm_gender`,
 `pm_dob`, `pm_joindate`, `pm_terminatedate`, `pm_emailid`, `pm_mobilenumber`,
 `pm_password`, `pm_status` FROM `panchayath_ward_member` 
 inner join panchayath_ward on panchayath_ward.pw_id=panchayath_ward_member.pw_id
 where pm_id=$pm_id";
$data2=DataBase::SelectData($query1);
$memberdetails=mysqli_fetch_array($data2);

$query1="SELECT `wc_id`, `wc_amount` FROM `wage_configuration`";
$data2=DataBase::SelectData($query1);
$wagedetails=$row1=mysqli_fetch_array($data2);

$query1="SELECT `pm_id`,`pw_number`,panchayath_ward_member.pw_id,`pw_name`,`pm_firstname`, `pm_lastname`, `pm_gender`,
 `pm_dob`, `pm_joindate`, `pm_terminatedate`, `pm_emailid`, `pm_mobilenumber`,
 `pm_password`, `pm_status` FROM `panchayath_ward_member` 
 inner join panchayath_ward on panchayath_ward.pw_id=panchayath_ward_member.pw_id
 where pm_id=$pm_id";
$data2=DataBase::SelectData($query1);
$memberdetails=mysqli_fetch_array($data2);

$query1="SELECT `ad_id`, `pw_id`, `ad_firstname`, `ad_lastname`, `ad_gender`, `ad_dob`, 
`ad_joindate`, `ad_terminatedate`, `ad_emailid`, `ad_password`, `ad_mobilenumber`, 
`ad_status` FROM `area_development_society`
 where pw_id=".$memberdetails['pw_id']." and ad_status='active'";
$data2=DataBase::SelectData($query1);
$adsdetails=mysqli_fetch_array($data2);

$pw_id=$memberdetails['pw_id'];
$ad_id=$adsdetails['ad_id'];
$wk_perheadwages=$wagedetails['wc_amount'];
$wk_type=$_POST['wk_type'];
$wk_contract=$_POST['wk_contract'];
$wk_address=$_POST['wk_address'];
$wk_employeeapplystrength=$_POST['wk_employeeapplystrength'];
$wk_id=$_POST['wk_id'];
$mode=$_POST['mode'];
$wk_status="new";
if($mode=="add"){
$query="INSERT INTO `work`(`pw_id`, `ad_id`, `wk_type`, `wk_address`,
 `wk_status`, `wk_memberapplydate`, `wk_contract`, `wk_employeeapplystrength`,
 wk_adsstatus,wk_panchayathstatus,wk_perheadwages,wk_aestatus,wk_employeeapprovestrength)
VALUES ('$pw_id','$ad_id','$wk_type','$wk_address','new',CURDATE(),'$wk_contract',
'$wk_employeeapplystrength','waiting','waiting','$wk_perheadwages','waiting','$wk_employeeapplystrength')";
DataBase::ExecuteQuery($query);
header("Location:../list_newapplied_works.php?msg=addsuccess");
}
else if($mode=="edit")
{
$query=("update work set wk_type='$wk_type', wk_address='$wk_address',wk_contract='$wk_contract',wk_employeeapplystrength='$wk_employeeapplystrength' where wk_id='$wk_id'");
DataBase::ExecuteQuery($query);
header("Location:../list_newapplied_works.php?msg=editsuccess");
}
else if($mode=="delete")
{
	$query=("delete from work where wk_id='$wk_id'");
DataBase::ExecuteQuery($query);
header("Location:../list_newapplied_works.php?msg=deletesuccess");
}
?>