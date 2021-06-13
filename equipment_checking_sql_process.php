<?php
ob_start();
	include_once 'database.php';
	ob_clean();
	if((isset($_POST["ur_code"]) && !empty($_POST["ur_code"]))) {
		equipmentcheck(); 
	}
	function equipmentcheck(){
		$ur_code=$_POST["ur_code"];
		if(	database::RowExists("equipments","eq_name='$ur_code'")){
			echo "exsists";
		}
		else{
			echo "notexsists";
		}
	}
?>