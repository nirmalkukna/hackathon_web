<?php
session_start();
include "../databaseConnect.php";
$TeamLeaderEmailId=$_REQUEST["TeamLeaderEmail"]; 
$TeamPassword=$_REQUEST["TeamPassword"];
$stmt=$conn->prepare("select emailId and password from tblteam where emailId=:TeamLeaderEmailId and password=:TeamPassword");
$stmt->bindParam(":TeamLeaderEmailId",$TeamLeaderEmailId);
$stmt->bindParam(":TeamPassword",$TeamPassword);
$stmt->execute();
$count=$stmt->rowCount();
if($count==1)
{
	$stmt=$conn->prepare("select * from tblteam where emailId=:TeamLeaderEmailId and password=:TeamPassword");
	$stmt->bindParam(":TeamLeaderEmailId",$TeamLeaderEmailId);
	$stmt->bindParam(":TeamPassword",$TeamPassword);
	$stmt->execute();
	$data=$stmt->fetchAll();
	foreach($data as $row)
	{
		 $teamName=$row["teamName"];
		 $teamId=$row["teamId"];
		 $isValidEmail=$row["isValidEmail"];

	}
	if($isValidEmail==1)
	{
		
		$_SESSION["teamName"]=$teamName;
		$_SESSION["teamId"]=$teamId;
		$conn=null;
		$stmt=null;
		header("location:home.php");
	}
	else
	{
	    $_SESSION["LastId"]=$teamId;
	    $verifyId=$_SESSION["LastId"];
	    include "../send-email.php";
	    sendMail($conn ,$verifyId);
	    
		header("location:http://poornimahackathon.tech/conform-email.php");
		$stmt=null;
		$conn=null;
	}

}
else
{
	header("location:http://poornimahackathon.tech/Login.php?err=1");
	$stmt=null;
	$conn=null;
}
?>