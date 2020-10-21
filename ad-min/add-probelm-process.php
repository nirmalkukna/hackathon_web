<?php
 
 $problemTitle=$_REQUEST["problemTitle"];
 $categoryId=$_REQUEST["categoryId"];
 $organisationName=$_REQUEST["organisationName"];
 $problemDescription=$_REQUEST["problemDescription"];
 $_SESSION["problemTitle"]=$problemTitle;
 $_SESSION["categoryId"]=$categoryId;
 $_SESSION["organisationName"]=$organisationName;
 $_SESSION["problemDescription"]=$problemDescription;
 if(trim($problemTitle)==""  || strlen($problemTitle)==0)
 {
 	header("location:add-probelms.php?err=1");
 	exit;
 }
 if(trim($organisationName)==""  || strlen($organisationName)==0)
 {
 	header("location:add-probelms.php?err=2");
 	exit;
 }
 if(trim($problemDescription)==""  || strlen($problemDescription) <10)
 {
 	header("location:add-probelms.php?err=3");
 	exit;
 }
 include "../databaseConnect.php";
 $addedIpAddress=$_SERVER['REMOTE_ADDR'];
$time_now=mktime(date('h')+5,date('i')+30,date('s'));
$date = date('d-m-Y H:i', $time_now);
$addedDateTime=$date;
$status=1;
$stmt=$conn->prepare("insert into tblprobelm (organisationName, problemTitle ,problemDescription,categoryId,addedDateTime,addedIpAddress)
 values (:organisationName,:problemTitle,:problemDescription,:categoryId,:addedDateTime,:addedIpAddress)");
$stmt->bindParam(":organisationName",$organisationName);
$stmt->bindParam(":problemTitle",$problemTitle);
$stmt->bindParam(":problemDescription",$problemDescription);
$stmt->bindParam(":categoryId",$categoryId);
$stmt->bindParam(":addedDateTime",$addedDateTime);
$stmt->bindParam(":addedIpAddress",$addedIpAddress);
$stmt->execute();
$_SESSION["problemTitle"]=null;
$_SESSION["categoryId"]=null;
$_SESSION["organisationName"]=null;
$_SESSION["problemDescription"]=null;
$conn=null;
$stmt=null;
header("location:probelms.php?msg=1");

?>