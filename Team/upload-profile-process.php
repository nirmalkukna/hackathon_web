<?php
	$teamId=$_POST["teamId"];	
	$fileName= $_FILES["images"]["name"];
	$fileSize=$_FILES["images"]["size"];
	$tempName=$_FILES['images']["tmp_name"];
	$fileType = strtolower(pathinfo($fileName,PATHINFO_EXTENSION));
	if($fileSize > 500000)
	{
		echo "The Size of file below 500 KB";
		exit;
	}
	if($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg"
		&& $fileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    exit;
}
$directory="Picture/".$fileName;
include "../databaseConnect.php";
$stmt=$conn->prepare("select teamProfile from tblteam where teamId=:teamId");
$stmt->bindParam(":teamId",$teamId);
$stmt->execute();
$data=$stmt->fetchAll();
foreach($data as $row)
{
	$profileImage=$row["teamProfile"];
}
if($profileImage !="")
{
	unlink($profileImage);
}



	move_uploaded_file($tempName, $directory);
	$stmt=$conn->prepare("update tblteam set teamProfile=:directory where teamId=:teamId");
	$stmt->bindParam(":directory",$directory);
	$stmt->bindParam(":teamId",$teamId);
	$stmt->execute();
	$conn=null;
	$stmt=null;
	echo "1";

?>