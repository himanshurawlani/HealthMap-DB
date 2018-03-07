<?php
	session_start();
	$table = $_SESSION["selected_table"].'_view';
	
	$conn = oci_connect($_SESSION["username"],$_SESSION["password"],"localhost/XE");
	$delete_data = $_POST['delete_data'];
	
	$query = "";
	echo strpos($table,"ALERT")."  ".$table;
	
	if(strpos($table,"ERT")!=false)
	{
		$query = "delete from $table where msgid=$delete_data";
		echo $query;
	}
	else if(strpos($table,"C_")!=false)
	{
		$query = "delete from $table where center_id=$delete_data";
	}
	else if(strpos($table,"IENTS")!=false)
	{
		$query = "delete from $table where aadhar_no=$delete_data";
	}
	$pquery = oci_parse($conn,$query);
	$check=oci_execute($pquery);
	if($check)
	{
		oci_commit($conn);
		echo 'Row deleted '.$query;
	}
	else
	{
		echo 'Row does not exist';
	}
?>