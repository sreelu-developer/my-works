<?php
setcookie("nregs_id",$user['wa_id'],time()-(60*60*24*30));
setcookie("nregs_usertype","webadmin",time()-(60*60*24*30));
header('Location:index.php');
?>
