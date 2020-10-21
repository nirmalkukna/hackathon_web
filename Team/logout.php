<?php
	session_start();
    $_SESSION["teamName"]=null;
    $_SESSION["teamId"]=null;
	session_destroy();
	header("location:http://poornimahackathon.tech/Login.php");
	
	
?>
