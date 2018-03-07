<?php
	session_start();
	$table=$_SESSION['selected_table'].'_view';
	$user=$_SESSION['username'];
	$passwd=$_SESSION['password'];
	
	$state=$_POST['state'];
	$priority=$_POST['priority'];
	$msgid=$_POST['msgid'];
	$message=$_POST['message'];
	
    $conn = oci_connect($user,$passwd,'localhost/XE');
    $query = "insert into $table values('$state',$priority,$msgid,'$message')";
    $pquery = oci_parse($conn,$query);
	
    if(oci_execute($pquery)){
		oci_commit($conn);
		echo "Success";
	}
	else
	{
		echo "Fail";
	}
	
?>
