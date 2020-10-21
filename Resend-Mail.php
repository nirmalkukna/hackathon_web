<?php
    session_start();
    include "databaseConnect.php";
    $verifyId=$_SESSION["LastId"];
    include "send-email.php";
	sendMail($conn ,$verifyId);
	$conn=null;
	echo "1";
    
?>