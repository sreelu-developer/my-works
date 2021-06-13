<?php
	include_once 'database.php';
	if((isset($_POST["ur_email"]) && !empty($_POST["ur_email"]))) {
		mailcheck(); 
	}
	function mailcheck(){
		$ur_email=$_POST["ur_email"];
		$id=$_POST["id"];
		$mode=$_POST["mode"];
		if($mode=="ae"){
		if(	database::RowExists("web_administrator","wa_username='$ur_email'") ||
			database::RowExists("panchayath_ward_member","pm_emailid='$ur_email'") || 
			database::RowExists("area_development_society","ad_emailid='$ur_email'") ||
			database::RowExists("assistant_engineer","ae_emailid='$ur_email' and ae_id!=$id") ||
			database::RowExists("panchayath_secretary","ps_emailid='$ur_email'") ||	
			database::RowExists("employees","em_emailid='$ur_email'") ){
			echo "exsists";
		}
		else{
			echo "notexsists";
		}
		}
		else if($mode=="ps"){
		if(	database::RowExists("web_administrator","wa_username='$ur_email'") ||
			database::RowExists("panchayath_ward_member","pm_emailid='$ur_email'") || 
			database::RowExists("area_development_society","ad_emailid='$ur_email'") ||
			database::RowExists("assistant_engineer","ae_emailid='$ur_email' ") ||
			database::RowExists("panchayath_secretary","ps_emailid='$ur_email' and ps_id!=$id") ||	
			database::RowExists("employees","em_emailid='$ur_email'") ){
			echo "exsists";
		}
		else{
			echo "notexsists";
		}
		}
		else if($mode=="pm"){
		if(	database::RowExists("web_administrator","wa_username='$ur_email'") ||
			database::RowExists("panchayath_ward_member","pm_emailid='$ur_email'  and pm_id!=$id") || 
			database::RowExists("area_development_society","ad_emailid='$ur_email'") ||
			database::RowExists("assistant_engineer","ae_emailid='$ur_email' ") ||
			database::RowExists("panchayath_secretary","ps_emailid='$ur_email'") ||	
			database::RowExists("employees","em_emailid='$ur_email'") ){
			echo "exsists";
		}
		else{
			echo "notexsists";
		}
		}
		else if($mode=="ad"){
		if(	database::RowExists("web_administrator","wa_username='$ur_email'") ||
			database::RowExists("panchayath_ward_member","pm_emailid='$ur_email'") || 
			database::RowExists("area_development_society","ad_emailid='$ur_email' and ad_id!=$id") ||
			database::RowExists("assistant_engineer","ae_emailid='$ur_email' ") ||
			database::RowExists("panchayath_secretary","ps_emailid='$ur_email'") ||	
			database::RowExists("employees","em_emailid='$ur_email'") ){
			echo "exsists";
		}
		else{
			echo "notexsists";
		}
		}
		else if($mode=="em"){
		if(	database::RowExists("web_administrator","wa_username='$ur_email'") ||
			database::RowExists("panchayath_ward_member","pm_emailid='$ur_email'") || 
			database::RowExists("area_development_society","ad_emailid='$ur_email'") ||
			database::RowExists("assistant_engineer","ae_emailid='$ur_email' ") ||
			database::RowExists("panchayath_secretary","ps_emailid='$ur_email'") ||	
			database::RowExists("employees","em_emailid='$ur_email'  and em_id!=$id") ){
			echo "exsists";
		}
		else{
			echo "notexsists";
		}
		}
	}
?>