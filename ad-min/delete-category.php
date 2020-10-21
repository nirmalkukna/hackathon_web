<?php
$categoryId=$_REQUEST["id"];
include "../databaseConnect.php";
$stmt=$conn->prepare("delete from tblcategory where categoryId=:categoryId");
$stmt->bindParam(":categoryId",$categoryId);
$stmt->execute();
$conn=null;
$stmt=null;
header("location:categories.php?msg=2");

?>