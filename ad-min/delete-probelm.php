<?php
	include "../databaseConnect.php"; 
	$problemId=$_REQUEST["id"];
	$stmt=$conn->prepare("delete from  tblprobelm where problemId =:problemId");
	$stmt->bindParam(":problemId",$problemId);
	$stmt->execute();
	$conn=null;
	$stmt=null;
	header("location:probelms.php?msg=2");
?>