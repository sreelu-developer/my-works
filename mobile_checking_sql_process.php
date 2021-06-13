<?php
ob_start();
	include_once 'database.php';
	ob_clean();
	if((isset($_POST["ur_mobile"]) && !empty($_POST["ur_mobile"]))) {
		mobcheck(); 
	}
	function mobcheck(){
		$ur_mobile=$_POST["ur_mobile"];
		$id=$_POST["id"];
		$mode=$_POST["mode"];
		if($mode=="ae"){
			if(	database::RowExists("panchayath_ward_member","pm_mobilenumber='$ur_mobile'") || 
				database::RowExists("area_development_society","ad_mobilenumber='$ur_mobile'") ||
				database::RowExists("assistant_engineer","ae_mobilenumber='$ur_mobile' and ae_id!=$id") ||
				database::RowExists("panchayath_secretary","ps_mobilenumber='$ur_mobile'") ||	
				database::RowExists("employees","em_mobilenumber='$ur_mobile'") ){
				echo "exsists";
			}
			else{
				echo "notexsists";
			}
		}
		else if($mode=="ps"){
			if(	database::RowExists("panchayath_ward_member","pm_mobilenumber='$ur_mobile'") || 
				database::RowExists("area_development_society","ad_mobilenumber='$ur_mobile'") ||
				database::RowExists("assistant_engineer","ae_mobilenumber='$ur_mobile'") ||
				database::RowExists("panchayath_secretary","ps_mobilenumber='$ur_mobile' and ps_id!=$id") ||	
				database::RowExists("employees","em_mobilenumber='$ur_mobile'") ){
				echo "exsists";
			}
			else{
				echo "notexsists";
			}
		}
		else if($mode=="pm"){
			if(	database::RowExists("panchayath_ward_member","pm_mobilenumber='$ur_mobile'  and pm_id!=$id") || 
				database::RowExists("area_development_society","ad_mobilenumber='$ur_mobile'") ||
				database::RowExists("assistant_engineer","ae_mobilenumber='$ur_mobile'") ||
				database::RowExists("panchayath_secretary","ps_mobilenumber='$ur_mobile'") ||	
				database::RowExists("employees","em_mobilenumber='$ur_mobile'") ){
				echo "exsists";
			}
			else{
				echo "notexsists";
			}
		}
		else if($mode=="ad"){
			if(	database::RowExists("panchayath_ward_member","pm_mobilenumber='$ur_mobile' ") || 
				database::RowExists("area_development_society","ad_mobilenumber='$ur_mobile'  and ad_id!=$id") ||
				database::RowExists("assistant_engineer","ae_mobilenumber='$ur_mobile'") ||
				database::RowExists("panchayath_secretary","ps_mobilenumber='$ur_mobile'") ||	
				database::RowExists("employees","em_mobilenumber='$ur_mobile'") ){
				echo "exsists";
			}
			else{
				echo "notexsists";
			}
		}
		else if($mode=="em"){
			if(	database::RowExists("panchayath_ward_member","pm_mobilenumber='$ur_mobile' ") || 
				database::RowExists("area_development_society","ad_mobilenumber='$ur_mobile'") ||
				database::RowExists("assistant_engineer","ae_mobilenumber='$ur_mobile'") ||
				database::RowExists("panchayath_secretary","ps_mobilenumber='$ur_mobile'") ||	
				database::RowExists("employees","em_mobilenumber='$ur_mobile' and em_id!=$id") ){
				echo "exsists";
			}
			else{
				echo "notexsists";
			}
		}
	}
?>