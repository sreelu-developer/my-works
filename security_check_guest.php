<?php
if(!empty($_COOKIE['nregs_usertype'])&&$_COOKIE['nregs_usertype']=="webadmin")
{
header('Location:admin/list_equipments.php');
}
elseif(!empty($_COOKIE['nregs_usertype'])&&$_COOKIE['nregs_usertype']=="ads")
{
header('Location:ads/list_employees.php');
}
elseif(!empty($_COOKIE['nregs_usertype'])&&$_COOKIE['nregs_usertype']=="member")
{
header('Location:member/list_finished_works.php');
}
elseif(!empty($_COOKIE['nregs_usertype'])&&$_COOKIE['nregs_usertype']=="panchayath")
{
header('Location:');
}
elseif(!empty($_COOKIE['nregs_usertype']))
{
header('Location:logout_process.php');
}
?>
	
	
