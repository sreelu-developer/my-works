<?php
include_once('../../database.php');
$mode=$_POST['mode'];
$eq_id=$_POST['eq_id'];
$ei_qty=$_POST['ei_qty'];
$ei_id=$_POST['ei_id'];
if($mode=="add"){
$query="INSERT INTO `equipment_inward`(`eq_id`, `ei_qty`, `ei_date`) VALUES
('$eq_id','$ei_qty',CURDATE())";
$ei_id=DataBase::ExecuteQueryReturnID($query);
$query="INSERT INTO `equipment_stock`(`eq_id`, `eq_qty`, `eq_status`, 
`eq_date`, `eq_reference`, `eq_referencetype`)  VALUES
('$eq_id','$ei_qty','INWARD',CURDATE(),$ei_id,'STOCK-ENTRY-BY-AE')";
DataBase::ExecuteQuery($query);
header("Location:../manage_equipmentinward.php?msg=addsuccess");
}
else if($mode=="delete"){
$query=("delete from equipment_inward where ei_id=$ei_id");
DataBase::ExecuteQuery($query);
$query=("delete from equipment_stock where eq_reference='$ei_id' and eq_status='INWARD' and  eq_referencetype='STOCK-ENTRY-BY-AE'"  );
DataBase::ExecuteQuery($query);
header("Location:../list_equipmentinward.php?eq_id=$eq_id&msg=deletesuccess");
}
?>