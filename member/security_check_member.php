<?php
if(empty($_COOKIE['nregs_usertype']))
{
header('Location:../index.php');
}
elseif(!empty($_COOKIE['nregs_usertype'])&&$_COOKIE['nregs_usertype']=="employee")
{
header('');
}
elseif(!empty($_COOKIE['nregs_usertype'])&&$_COOKIE['nregs_usertype']=="webadmin")
{
	header('Location:../admin/list_equipments.php');
}
elseif(!empty($_COOKIE['nregs_usertype'])&&$_COOKIE['nregs_usertype']=="ads")
{
header('Location:../ads/list_employees.php');
}
elseif(!empty($_COOKIE['nregs_usertype'])&&$_COOKIE['nregs_usertype']!="member")
{
header('Location:../logout_process.php');
}
?>