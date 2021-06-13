<?php
ob_start();
	include_once 'database.php';
	ob_clean();
	if((isset($_POST["ur_code"]) && !empty($_POST["ur_code"]))) {
		wardcheck(); 
	}
	function wardcheck(){
		$ur_code=$_POST["ur_code"];
		if(	database::RowExists("panchayath_ward","pw_number='$ur_code'")){
			echo "exsists";
		}
		else{
			echo "notexsists";
		}
	}
?>