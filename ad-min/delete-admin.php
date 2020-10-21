<?php
	include "include/check-session.php" ; 
    include "../databaseConnect.php";
    $adminId=$_REQUEST["id"];
     $adminId;
    if(is_numeric($adminId)){
        $stmt=$conn->prepare("select * from tbladmins where adminId =:adminId");
        $stmt->bindParam(":adminId",$adminId);
        $stmt->execute();
        $count=$stmt->rowCount();
        if($count==1)
        {
            $stmt=$conn->prepare("delete from tbladmins where adminId =:adminId ");
            $stmt->bindParam(":adminId",$adminId);
            $stmt->execute();
            $stmt=null;
            $conn=null;
            header("location:admins.php?msg=3");
            
        }
        else
        {
            $conn=null;
            $stmt=null;
            header("location:admins.php");
            exit;
        }
    }
    else
    {
        $conn=null;
        header("location:admins.php");
        exit;
    }
?>