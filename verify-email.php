<?php
session_start();
$verifyId=$_SESSION["LastId"];
$OTP_PIN=$_REQUEST["otp"];
$isValidEmail=1;
include "databaseConnect.php";
$stmt=$conn->prepare("select OTP_PIN from tblteam where teamId=:verifyId");
$stmt->bindParam(":verifyId",$verifyId);
$stmt->execute();
$data=$stmt->fetchAll();
foreach($data as $row)
{
    $PIN=$row["OTP_PIN"];
}
if($OTP_PIN ==$PIN )
{
   $stmt1=$conn->prepare("update tblteam set isValidEmail =:isValidEmail and teamId=:verifyId");
   $stmt1->bindParam(":isValidEmail",$isValidEmail);
   $stmt1->bindParam(":verifyId",$verifyId);
   $stmt1->execute();
  echo "1";
}
else
{
    echo "Incorrect Verification Code";
}
?>