<?php
    session_start(); 
    if(!isset($_SESSION["teamId"]))
    {
        header("location:http://poornimahackathon.tech/ProbelmStmt.php?err=1");
        exit;
    }
        
     include "../databaseConnect.php";
      $teamId= $_SESSION["teamId"];
      $probelmId=$_REQUEST["p_id"];
      if(is_numeric($probelmId))
      {
         
        $stmt=$conn->prepare("select problemId from tblprobelm where problemId =:probelmId"); 
        $stmt->bindParam(":probelmId",$probelmId);
        $stmt->execute();
        $count=$stmt->rowCount();
        if($count==0)
        {
            $conn=null;
            header("location:http://poornimahackathon.tech/ProbelmStmt.php?err=2");
            exit;
        }
      }
      else{
          $conn=null;
         header("location:http://poornimahackathon.tech/ProbelmStmt.php?err=2");
        exit; 
      }
      $stmt=$conn->prepare("update tblteam set probelmId =:probelmId where teamId =:teamId");
      $stmt->bindParam(":probelmId",$probelmId);
      $stmt->bindParam(":teamId",$teamId);
      $stmt->execute();
      $conn=null;
     header("location:home.php");
      
?>