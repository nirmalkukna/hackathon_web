<?php 
include "include/check-session.php" ;
include   "../databaseConnect.php"; 
include   "include/helperMethods.php";


 $adminName1		= check_input($_REQUEST["adminName1"]);
 $adminEmail	=	check_input($_REQUEST["adminEmail"]);
 $adminUserName	=	check_input($_REQUEST["adminUserName"]);
 $adminPassword	=	check_input($_REQUEST["adminPassword"]);
 $status		=   $_REQUEST["status"];
	$_SESSION["adminName1"] 		= $adminName1;
	$_SESSION["adminUserName"] 	= $adminUserName;
	$_SESSION["adminEmail"] 	= $adminEmail;
	$_SESSION["adminPassword"] 	= $adminPassword;
if(strlen($adminName1)== 0 || empty($adminName1) || $adminName1=="")
{
	$conn=null;
	header("location:add-admin.php?err=1");
	exit;
}
if(strlen($adminEmail)== 0 || empty($adminEmail) || $adminEmail=="")
{
	$conn=null;
	header("location:add-admin.php?err=2");
	exit;
}
if(strlen($adminUserName)== 0 || empty($adminUserName) || $adminUserName=="")
{
	$conn=null;
	header("location:add-admin.php?err=3");
	exit;
}
if(strlen($adminPassword)== 0 || empty($adminPassword) || $adminPassword=="")
{
	$conn=null;
	header("location:add-admin.php?err=4");
	exit;
}

$query ="select count(*) from tbladmins where adminUserName = :adminUserName or adminEmailId = :adminEmailId";
$stmt=$conn->prepare($query);
$stmt->bindParam(':adminUserName', $adminUserName);
$stmt->bindParam(':adminEmailId', $adminEmail);
$stmt->execute();
$numrows=$stmt->fetchColumn();

if($numrows > 0 )
{
	$stmt=null;
	$conn=null;
	header("location:add-admin.php?msg=1");
}
else 
{
	
$stmt = $conn->prepare("insert into tbladmins(adminName,adminUserName,adminEmailId,adminPassword,status) VALUES (:adminName, :adminUserName,:adminEmailId,:adminPassword,:status)");
$stmt->bindParam(':adminName', $adminName1);
$stmt->bindParam(':adminUserName', $adminUserName);
$stmt->bindParam(':adminEmailId', $adminEmail);
$stmt->bindParam(':adminPassword', $adminPassword);
$stmt->bindParam(':status', $status);
$stmt->execute(); 
$stmt=null;
header("location:admins.php?msg=1");
}
?>