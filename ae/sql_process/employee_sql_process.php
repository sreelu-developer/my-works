<?php
include_once('../../database.php');
$mode=$_POST['mode'];
$em_id=$_POST['em_id'];
$pw_id=trim($_POST['pw_id']);
if($mode=="approved"){
$em_id=$_POST['em_id'];
$query=("update employees set em_approvalstatus='aeapproved', em_status='approved' where em_id=$em_id");
DataBase::ExecuteQuery($query);
header("Location:../list_employees_applications.php?pw_id=$pw_id&msg=approvesuccess");
}
else if($mode=="denied"){
$em_id=$_POST['em_id'];
$query=("update employees set em_approvalstatus='aedenied', em_status='denied' where em_id=$em_id");
DataBase::ExecuteQuery($query);
header("Location:../list_employees_applications.php?pw_id=$pw_id&msg=denysuccess");
}
?>