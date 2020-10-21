<?php
	include "../databaseConnect.php";
	$teamId=$_REQUEST["id"];
	$stmt=$conn->prepare("delete from tblteam where teamId=:teamId");
	$stmt->bindParam(":teamId",$teamId);
	$stmt->execute();
	$conn=null;
	$stmt=null;
	header("location:teams.php?msg=3"); 
?>