<?php
	require_once("const.php");
	// 1. Create a databae connection

	$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS);
	if(!$connection){
		die("Database connection failed: " . mysql_error());
		}

	// 2. Select a datbase to us

	$db_select = mysqli_select_db($connection, DB_NAME);
	if(!$db_select)
	{
		die("Database selection failed". mysqli_error());
	}
?>