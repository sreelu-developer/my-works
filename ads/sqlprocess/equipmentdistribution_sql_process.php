<?php
include_once('../../database.php');
$mode=$_POST['mode'];
$ad_id=$_COOKIE['nregs_id'];
$em_id=$_POST['em_id'];
$eq_id=$_POST['eq_id'];
$ed_charge=$_POST['ed_charge'];
$ed_totaldistribution=$_POST['ed_totaldistribution'];
$ed_totalamount=$ed_charge*$ed_totaldistribution;
$ed_enddate=$_POST['ed_enddate'];
$ed_id=$_POST['ed_id'];
$balanceqty=$_POST['balanceqty']-$ed_totaldistribution;
if($mode=="add"){
$query="INSERT INTO `equipment_distribution`(`eq_id`, `ad_id`, `em_id`, `ed_charge`,
`ed_startdate`, `ed_enddate`, `ed_totaldistribution`, `ed_totalamount`, `ed_status`) VALUES
('$eq_id','$ad_id','$em_id','$ed_charge',CURDATE(),'$ed_enddate',
$ed_totaldistribution,$ed_totalamount,'DISTRIBUTED')";
$eo_id=DataBase::ExecuteQuery($query);
header("Location:../manage_equipment_distribution.php?eq_id=$eq_id&balanceqty=$balanceqty&msg=addsuccess");
}
else if($mode=="delete"){
$query=("delete from equipment_outward_ads where eo_id=$eo_id");
DataBase::ExecuteQuery($query);
$query=("delete from equipment_stock where eq_reference='$eo_id' and eq_status='OUTWARD' and  eq_referencetype='STOCK-OUTWARD-TO-ADS'"  );
DataBase::ExecuteQuery($query);
header("Location:../list_equipmentoutward_stock.php?ad_id=$ad_id&msg=deletesuccess");
}
else if($mode=="return"){
	$query=("update equipment_distribution set ed_status='RETURNED' where ed_id=$ed_id");
	DataBase::ExecuteQuery($query);
	header("Location:../list_employeestock_register.php?em_id=$em_id&msg=returnsuccess");	
}
?>