<?php
	session_start();
	$_SESSION["adminId"]=null;
	$_SESSION["adminName"]=null;
	session_destroy();
	header("location:index.php");
	
	
?>
