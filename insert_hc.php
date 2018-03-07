<?php
	session_start();
	$table=$_SESSION['selected_table'].'_view';
	$user=$_SESSION['username'];
	$passwd=$_SESSION['password'];
	$cid=$_POST['id'];
	$pname=$_POST['name'];
	$ploc=$_POST['loc'];
	$type=$_POST['type'];
	
    $conn = oci_connect($user,$passwd,'localhost/XE');
    $query = "insert into $table values($cid,'$pname','$ploc','$type')";
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