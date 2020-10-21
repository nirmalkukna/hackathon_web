<?php
	session_start();
	include "databaseConnect.php";
	
	$teamName=$_REQUEST["teamName"];
	$teamLeaderName=$_REQUEST["teamLeaderName"];
	$emailId=$_REQUEST["teamLeaderEmailId"];
	$contactNo=$_REQUEST["contactNo"];

	$firstMemberName=$_REQUEST["firstMemberName"] ;
	$emailId1=$_REQUEST["email1"] ;
	$contact1=$_REQUEST["contact1"] ;
	
	$secondMemberName=$_REQUEST["secondMemberName"] ;
	$emailId2=$_REQUEST["emailId2"] ;
	$contact2=$_REQUEST["contact2"] ;
	$gender2=$_REQUEST["gender2"] ;

	$thirdMemberName=$_REQUEST["thirdMemberName"] ;
	$emailId3=$_REQUEST["emailId3"] ;
	$contact3=$_REQUEST["contact3"] ;
	$gender3=$_REQUEST["gender3"] ;

	$college=$_REQUEST["college"] ;
	$Address=$_REQUEST["Address"] ;
	
	$TeamPassword=$_REQUEST["TeamPassword"] ;
	$Con_TeamPassword=$_REQUEST["Con_TeamPassword"] ;
	$_SESSION["teamName"]=$teamName;
	$_SESSION["teamLeaderName"]=$teamLeaderName;
	$_SESSION["teamLeaderEmailId"]=$emailId;
	$_SESSION["contactNo"]=$contactNo;

	$_SESSION["firstMemberName"]=$firstMemberName;
	$_SESSION["email1"]=$emailId1;
	$_SESSION["contact1"]=$contact1;

	$_SESSION["secondMemberName"]=$secondMemberName;
	$_SESSION["emailId2"]=$emailId2;
	$_SESSION["contact2"]=$contact2;

	$_SESSION["thirdMemberName"]=$thirdMemberName;
	$_SESSION["emailId3"]=$emailId3;
	$_SESSION["contact3"]=$contact3;

	$_SESSION["college"]=$college;
	$_SESSION["Address"]=$Address;
	$_SESSION["TeamPassword"]=$TeamPassword;
	$_SESSION["Con_TeamPassword"]=$Con_TeamPassword;
	if(trim($teamName)=="" || strlen($teamName) == 0)
	{
	    echo "Enter Your Team Name";
	    header("location:Register.php?err=1");
	    exit;
	}
	if(trim($teamLeaderName)=="" || strlen($teamLeaderName)==0)
	{
	    echo "Enter Your Team Leader Name";
	    header("location:Register.php?err=2");
	    exit;
	}
	if(!filter_var($emailId, FILTER_VALIDATE_EMAIL))
	{
	    echo "Enter Your Team Leader Email ID";
	    header("location:Register.php?err=3");
	    exit;
	}
	if(trim($contactNo)=="" || strlen($contactNo) < 9)
	{
	    echo "Enter Your Team Leader Contact No";
	    header("location:Register.php?err=4");
	    exit;
	}
	if(trim($firstMemberName)=="" || strlen($firstMemberName) ==0)
	{
	    echo "Enter Your First Member Name";
	    header("location:Register.php?err=5");
	    
	    exit;
	}
	if(!filter_var($emailId1, FILTER_VALIDATE_EMAIL))
	{
	    echo "Enter Your First Member Email Id";
	    header("location:Register.php?err=6");
	    exit;
	}
	if(trim($contact1)=="" || strlen($contact1) ==0)
	{
	    echo "Enter Your First Member contact No";
	    header("location:Register.php?err=7");
	    exit;
	}
	if(trim($secondMemberName)=="" || strlen($secondMemberName) ==0)
	{
	    echo "Enter Your Second Member Name";
	    header("location:Register.php?err=8");
	    exit;
	}
	if(!filter_var($emailId2, FILTER_VALIDATE_EMAIL))
	{
	    echo "Enter Your Second Member Email Id";
	    header("location:Register.php?err=9");
	    exit;
	}
	if(trim($contact2)=="" || strlen($contact2) <9)
	{
	    echo "Enter Your Second Member Member contact No";
	    header("location:Register.php?err=10");
	    exit;
	}
	if(trim($thirdMemberName)=="" || strlen($thirdMemberName) ==0)
	{
	    echo "Enter Your Third Member Name";
	    header("location:Register.php?err=11");
	    exit;
	}
	if(!filter_var($emailId3, FILTER_VALIDATE_EMAIL))
	{
	    echo "Enter Your Second Member Email Id";
	    header("location:Register.php?err=12");
	    exit;
	}
	if(trim($contact3)=="" || strlen($contact3) <9)
	{
	    echo "Enter Your Third Member Member contact No";
	    header("location:Register.php?err=13");
	    exit;
	}
	if(trim($college)=="" || strlen($college)==0)
	{
	    echo "Enter College Name";
	    header("location:Register.php?err=14");
	    exit;
	}
	if(trim($Address)=="" || strlen($Address) < 10)
	{
	    echo "Enter College Address";
	    header("location:Register.php?err=15");
	    exit;
	}
	if(trim($TeamPassword)=="" || strlen($TeamPassword) <7)
	{
	    echo "The Length of Password Must be 8";
	    header("location:Register.php?err=16");
	    exit;
	}
	if($Con_TeamPassword != $TeamPassword)
	{
	    echo "Both Password Field Must Be Same";
	    header("location:Register.php?err=17");
	    exit;
	}
	$status=1;
	$OTP_PIN= mt_rand(1000, 9999);
	$isValidEmail=0;
	$stmt=$conn->prepare("INSERT INTO tblteam(teamName, teamLeaderName, emailId, status, firstMemberName, emailId1, contact1, secondMemberName, emailId2, contact2, thirdMemberName, emailId3, contact3, college, Address, password, contactNo,OTP_PIN,isValidEmail) VALUES (:teamName, :teamLeaderName, :emailId, :status, :firstMemberName, :emailId1, :contact1, :secondMemberName, :emailId2, :contact2, :thirdMemberName,:emailId3, :contact3, :college, :Address, :TeamPassword, :contactNo,:OTP_PIN,:isValidEmail)");
	$stmt->bindParam(":teamName",$teamName);
	$stmt->bindParam(":teamLeaderName",$teamLeaderName);
	$stmt->bindParam(":emailId",$emailId);
	$stmt->bindParam(":status",$status);
	$stmt->bindParam(":firstMemberName",$firstMemberName);
	$stmt->bindParam(":emailId1",$emailId1);
	$stmt->bindParam(":contact1",$contact1);
	$stmt->bindParam(":secondMemberName",$secondMemberName);
	$stmt->bindParam(":emailId2",$emailId2);
	$stmt->bindParam(":contact2",$contact2);
	$stmt->bindParam(":thirdMemberName",$thirdMemberName);
	$stmt->bindParam(":emailId3",$emailId3);
	$stmt->bindParam(":contact3",$contact3);
	$stmt->bindParam(":college",$college);
	$stmt->bindParam(":Address",$Address);
	$stmt->bindParam(":TeamPassword",$TeamPassword);
	$stmt->bindParam(":contactNo",$contactNo);
	$stmt->bindParam(":OTP_PIN",$OTP_PIN);
	$stmt->bindParam(":isValidEmail",$isValidEmail);
	$stmt->execute();
	$LastId= $conn->lastInsertId();
	$_SESSION["LastId"]=$LastId;
	include "send-email.php";
	sendMail($conn ,$LastId);
    $_SESSION["teamName"]=null;
	$_SESSION["teamLeaderName"]=null;
	$_SESSION["teamLeaderEmailId"]=null;
	$_SESSION["contactNo"]=null;
	$_SESSION["gender"]=null;

	$_SESSION["firstMemberName"]=null;
	$_SESSION["email1"]=null;
	$_SESSION["contact1"]=null;
	$_SESSION["gender1"]=null;

	$_SESSION["secondMemberName"]=null;
	$_SESSION["emailId2"]=null;
	$_SESSION["contact2"]=null;
	$_SESSION["gender2"]=null;

	$_SESSION["thirdMemberName"]=null;
	$_SESSION["emailId3"]=null;
	$_SESSION["contact3"]=null;
	$_SESSION["gender3"]=null;

	$_SESSION["college"]=null;
	$_SESSION["Address"]=null;
	$_SESSION["TeamPassword"]=null;
	$_SESSION["Con_TeamPassword"]=null;
	$conn=null;
	$stmt=null;
	header("location:conform-email.php");

?>