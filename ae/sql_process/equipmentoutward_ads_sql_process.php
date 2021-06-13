<?php
include_once('../../database.php');
$mode=$_POST['mode'];
$ad_id=$_POST['ad_id'];
$eq_id=$_POST['eq_id'];
$eo_qty=$_POST['eo_qty'];
$eo_id=$_POST['eo_id'];
if($mode=="add"){
$query="INSERT INTO `equipment_outward_ads`(`eq_id`, `ad_id`, `eo_qty`, `eo_date`,eo_returnstatus) VALUES
('$eq_id','$ad_id','$eo_qty',CURDATE(),'NOT-RETURNED')";
$eo_id=DataBase::ExecuteQueryReturnID($query);
$query="INSERT INTO `equipment_stock`(`eq_id`, `eq_qty`, `eq_status`, 
`eq_date`, `eq_reference`, `eq_referencetype`)  VALUES
('$eq_id','-$eo_qty','OUTWARD',CURDATE(),$eo_id,'STOCK-OUTWARD-TO-ADS')";
DataBase::ExecuteQuery($query);
header("Location:../manage_equipmentoutward_ads.php?msg=addsuccess");
}
else if($mode=="delete"){
$query=("delete from equipment_outward_ads where eo_id=$eo_id");
DataBase::ExecuteQuery($query);
$query=("delete from equipment_stock where eq_reference='$eo_id' and eq_status='OUTWARD' and  eq_referencetype='STOCK-OUTWARD-TO-ADS'"  );
DataBase::ExecuteQuery($query);
header("Location:../list_equipmentoutward_stock.php?ad_id=$ad_id&msg=deletesuccess");
}
else if($mode=="return"){
$query=("update equipment_outward_ads set eo_returnstatus='RETURNED' where eo_id=$eo_id");
DataBase::ExecuteQuery($query);
$query="INSERT INTO `equipment_inward_ads`(`eq_id`, `ad_id`, `en_qty`, `en_date`) VALUES
('$eq_id','$ad_id','$eo_qty',CURDATE())";
$eo_id=DataBase::ExecuteQueryReturnID($query);
$query="INSERT INTO `equipment_stock`(`eq_id`, `eq_qty`, `eq_status`, 
`eq_date`, `eq_reference`, `eq_referencetype`)  VALUES
('$eq_id','$eo_qty','INWARD',CURDATE(),$eo_id,'STOCK-INWARD-BY-ADS')";
DataBase::ExecuteQuery($query);
header("Location:../list_equipmentoutward_stock_return.php?ad_id=$ad_id&msg=returnsuccess");	
}
?>