<?php 
include   "include/check-session.php" ;
include   "../databaseConnect.php" ;
$adminId	=	$_REQUEST["adminId"];
$adminEmailId=	$_REQUEST["adminEmail"];
$adminUserName=	$_REQUEST["adminUserName"];
$adminName=	$_REQUEST["adminName"]; 
$status		=	$_REQUEST["status"];
	if(strlen($adminName)== 0 || empty($adminName) || trim($adminName)=="")
	{
		$conn=null;
		header("location:edit-admin.php?err=1&id=".$adminId);
		exit;
	}
	if(strlen($adminUserName)== 0 || empty($adminUserName) || trim($adminUserName)=="")
	{
		$conn=null;
		header("location:edit-admin.php?err=2&id=".$adminId);
		exit;
	}	
	if(strlen($adminEmailId)== 0 || empty($adminEmailId) || trim($adminEmailId)=="")
	{
		$conn=null;
		header("location:edit-admin.php?err=3&id=".$adminId);
		exit;
	}

$stmt=$conn->prepare("update tbladmins set adminName=:adminName,adminUserName=:adminUserName,adminEmailId=:adminEmailId,status=:status where adminId=:adminId");
$stmt->bindParam(':adminName', $adminName);
$stmt->bindParam(':adminUserName', $adminUserName);
$stmt->bindParam(':adminEmailId', $adminEmaild);
$stmt->bindParam(':status', $status);
$stmt->bindParam(':adminId', $adminId);
$stmt->execute(); 
$stmt=null;
header("location:admins.php?msg=2");



?>
