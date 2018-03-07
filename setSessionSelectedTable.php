<?php	
	session_start();
	
	if($_POST['selected_table'] == "alertsTable"){
		$_SESSION["selected_table"]=$_SESSION["alerts_table"]; 
		$_SESSION["selected_table_name"]="alertsTable";
	}
	else if($_POST['selected_table'] == "hcTable"){
		$_SESSION["selected_table"]=$_SESSION["hc_table"];
		$_SESSION["selected_table_name"]="hcTable";
	}
	else if($_POST['selected_table'] == "patTable"){
		$_SESSION["selected_table"]=$_SESSION["pat_table"];
		$_SESSION["selected_table_name"]="patTable";
	}
	
	echo $_SESSION['selected_table'];
?>