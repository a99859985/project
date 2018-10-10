<?php
	header("Content-Type:text/html; charset=utf-8");

	$db_server = "localhost";
	$db_name   = "project";
	$db_user   = "Ben";
	$db_passwd = "99859985";

	$conn=mysqli_connect($db_server,$db_user,$db_passwd);
	mysqli_select_db($conn,$db_name);

	mysqli_query($conn,"set names 'UTF8'");
?>