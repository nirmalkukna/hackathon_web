<?php
    ini_set('display_errors', 1);
	$teamId=$_POST["teamId"];	
	$fileName= $_FILES["solution"]["name"];
	$fileSize=$_FILES["solution"]["size"];
	$tempName=$_FILES['solution']["tmp_name"];
	$fileType = strtolower(pathinfo($fileName,PATHINFO_EXTENSION));
	if($fileType == "pdf") {
        
    }
    else{
        header("location:upload-solution.php?err=1");
        exit;
    }
    date_default_timezone_set('Asia/Kolkata');
    $addedDateTime=date('d-m-Y H:i');
    $addedIpAddress=$_SERVER['REMOTE_ADDR'];
    include "../databaseConnect.php";
   $stmt=$conn->prepare("select * from tblsolutions where teamId=:teamId");
    $stmt->bindParam(":teamId",$teamId);
    $stmt->execute();
    $count=$stmt->rowCount();
    if($count==1)
    {
        $conn=null;
        $stmt=null;
        header("location:upload-solution.php?err=2");
        exit;
    }
    
    $directory="Solutions/".$fileName;
	move_uploaded_file($tempName, $directory);
	$stmt=$conn->prepare("INSERT INTO tblsolutions (teamId,solutionFile,addedDateTime,addedIpAddress) 
	values (:teamId ,:directory,:addedDateTime ,:addedIpAddress)");
	$stmt->bindParam(":teamId",$teamId);
	$stmt->bindParam(":directory",$directory);
	$stmt->bindParam(":addedDateTime",$addedDateTime);
	$stmt->bindParam(":addedIpAddress",$addedIpAddress);
	$stmt->execute();
	header("location:upload-solution.php?msg=1");

?>