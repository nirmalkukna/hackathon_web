<?php
	$categoryName=$_REQUEST["categoryName"]; 
	$status=$_REQUEST["status"];
	if(trim($categoryName)=="" || strlen($categoryName)==0)
	{
		header("locatio:add-category.php?err=1");
		exit;
	}
	include "../databaseConnect.php";
	$stmt=$conn->prepare("select categoryName from tblcategory where categoryName=:categoryName");
	$stmt->bindParam(":categoryName",$categoryName);
	$stmt->execute();
	$count=$stmt->rowCount();
	if($count==1)
	{
		$conn=null;
		$stmt=null;
		header("location:add-category.php?err=2");
		exit;
	}
	$addedIpAddress=$_SERVER['REMOTE_ADDR'];
	$time_now=mktime(date('h')+5,date('i')+30,date('s'));
	$date = date('d-m-Y H:i', $time_now);
	$addedDateTime=$date;
	$stmt=$conn->prepare("insert into tblcategory (categoryName ,status, addedDateTime ,addedIpAddress)
	 values (:categoryName,:status,:addedDateTime,:addedIpAddress)");
	$stmt->bindParam(":categoryName",$categoryName);
	$stmt->bindParam(":status",$status);
	$stmt->bindParam(":addedDateTime",$addedDateTime);
	$stmt->bindParam(":addedIpAddress",$addedIpAddress);
	$stmt->execute();
	$conn=null;
	$stmt=null;
	header("location:categories.php?msg=1")
?>
