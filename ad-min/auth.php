<?php
session_start();
include "../databaseConnect.php";
$adminUserName=$_REQUEST["userName"]; 
$adminPassword=$_REQUEST["password"];
$stmt=$conn->prepare("select adminUserName and adminPassword from tbladmins where adminUserName=:adminUserName and adminPassword=:adminPassword");
$stmt->bindParam(":adminUserName",$adminUserName);
$stmt->bindParam(":adminPassword",$adminPassword);
$stmt->execute();
$count=$stmt->rowCount();
$stmt=null;
if($count==1)
{
	$stmt=$conn->prepare("select * from tbladmins where adminUserName=:adminUserName and adminPassword=:adminPassword");
	$stmt->bindParam(":adminUserName",$adminUserName);
	$stmt->bindParam(":adminPassword",$adminPassword);
	$stmt->execute();
	$data=$stmt->fetchAll();
	foreach($data as $row)
	{
		 $adminName=$row["adminUserName"];
		$adminId=$row["adminId"];
		$status=$row["status"];

	}
	if($status==1)
	{
		
		$_SESSION["adminId"]=$adminId;
      	$_SESSION["adminName"]=$adminName;
		header("location:home.php");
	}
	else
	{
		header("location:index.php?err=2");
	}

}
else
{
	header("location:index.php?err=1");
}
?>