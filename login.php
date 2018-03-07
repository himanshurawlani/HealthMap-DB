<?php
include 'connect.php';

$user=$passwd="";
$user=test_input($_POST['login_user']);
$passwd=test_input($_POST['login_pass']);

function test_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

$query="SELECT * FROM users WHERE username='$user' and password='$passwd'";
$sql = oci_parse($conn,$query);
oci_execute($sql);
$row_count=oci_fetch_all($sql,$res);

if($row_count == 0)
	$data="Invalid";
else
{
	oci_close($conn);
	$conn_user=oci_connect($user,$passwd,$service);
	session_start();
	$_SESSION["username"]="$user";
	$_SESSION["password"]="$passwd";
	
	$query_user="SELECT table_name from user_tables";
	$sql_user = oci_parse($conn_user,$query_user);	
	oci_execute($sql_user);
	$row=oci_fetch_array($sql_user,OCI_BOTH);
	if($user == "jayesh")
	{
		$row=oci_fetch_array($sql_user,OCI_BOTH);
		$_SESSION["alerts_table"]="ALERT_MAIN";
		$row=oci_fetch_array($sql_user,OCI_BOTH);
		$_SESSION["hc_table"]="HC_CENTER_MAIN";
		$row=oci_fetch_array($sql_user,OCI_BOTH);
		$_SESSION["pat_table"]="PATIENTS_MAIN";
		$_SESSION["selected_table"]=$_SESSION["alerts_table"];
		$_SESSION["selected_table_name"]="alertsTable";
	}
	else if($user=="himanshu")
	{
		$_SESSION["hc_table"]="HC_CENTER_GUJ";
		$row=oci_fetch_array($sql_user,OCI_BOTH);
		$_SESSION["pat_table"]="PATIENTS_GUJ";
		$row=oci_fetch_array($sql_user,OCI_BOTH);
		$_SESSION["alerts_table"]="ALERT_GUJ";
		$_SESSION["selected_table"]=$_SESSION["alerts_table"];
		$_SESSION["selected_table_name"]="alertsTable";
	}
	else{
		$_SESSION["hc_table"]="HC_CENTER_MAH";
		$row=oci_fetch_array($sql_user,OCI_BOTH);
		$_SESSION["pat_table"]="PATIENTS_MAH";
		$row=oci_fetch_array($sql_user,OCI_BOTH);
		$_SESSION["alerts_table"]="ALERT_MAH";
		$_SESSION["selected_table"]=$_SESSION["alerts_table"];
		$_SESSION["selected_table_name"]="alertsTable";
	}
	
	$data="Valid";	
}

echo $data;
?>