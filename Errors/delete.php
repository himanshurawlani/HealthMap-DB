<?php

$conn = oci_connect("himanshu","abc","localhost/XE");
$query = "delete from alert_guj_view where msgid=1234";
$pq	= oci_parse($conn,$query);

if(oci_execute($pq))
{
	oci_commit($conn);
	echo "Ha";
}
else
{
	echo "nai";
}
?>