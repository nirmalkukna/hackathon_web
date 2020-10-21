<?php 
include  "include/check-session.php" ;
include "../databaseConnect.php" ;
$numRecordPerPage=10;
 $teamId=$_SESSION["teamId"];
//include "include/pagination.php" ;
include  "include/helperMethods.php";
include "include/TopMost.php" ;?>

<title>Teams Management | <?php echo $siteName ?></title>
<!-- DATA TABLES -->
<link href="include/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
function deleteConfirm(id)
{
	if(confirm("Are you sure you want to delete this Team?"))
	{
		location.href = "delete-team.php?id=" + id;
	}
}
</script>
<?php
include "include/Top.php" ;

include "include/LeftSideBar.php" ;?>
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Teams Details of <?php echo $_SESSION["teamName"];?>
                        
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Teams</li>
                    </ol>
                </section>
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
							
                            <div class="col-md-6">
                                <div class=" box">
                                <div class="box-header">
                                    <h3 class="box-title">Team of Details <?php echo $_SESSION["teamName"]; ?></h3>
                                    
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="teamsTable" class="table table-bordered table-hover">
                                        
                                        <tbody>
                                            <?php
                                                include "databaseConnect.php";
                                                $stmt=$conn->prepare("select * from 
                                                    tblteam where teamId=:teamId");
                                                    $stmt->bindParam(":teamId",$teamId); 
                                                $stmt->execute();
                                                $data=$stmt->fetchAll();
                                                $counter=1;
                                                foreach($data as $row)
                                                {
                                                    ?>
                                                        <tr>
                                                            <td><strong>1.</strong></td>
                                                            <td><strong>Team Name</strong></td>   
                                                            <td><?php echo $row["teamName"];?></td>         
                                                        </tr>
                                                        <tr>
                                                            <td><strong>2.</strong></td>
                                                            <td><strong>Team Leader Name</strong></td>   
                                                            <td><?php echo $row["teamLeaderName"];?></td>         
                                                        </tr>
                                                        <tr>
                                                            <td><strong>3.</strong></td>
                                                            <td><strong>Email ID</strong></td>   
                                                            <td><?php echo $row["emailId"];?></td>         
                                                        </tr>
                                                        <tr>
                                                            <td><strong>4.</strong></td>
                                                            <td><strong>Status</strong></td>   
                                                            <td>
                                                                <?php $status= $row["status"];
                                                                    if($status==1)
                                                                    {
                                                                        echo "Active";
                                                                    }
                                                                    else{
                                                                        echo "inActive";
                                                                    }
                                                                ?>
                                                                
                                                            </td>         
                                                        </tr>
                                                        <tr>
                                                            <td><strong>5.</strong></td>
                                                            <td><strong>First Member Name</strong></td>   
                                                            <td><?php echo $row["firstMemberName"];?></td>         
                                                        </tr>
                                                        <tr>
                                                            <td><strong>6.</strong></td>
                                                            <td><strong>First Member Email ID</strong></td>   
                                                            <td><?php echo $row["emailId1"];?></td>         
                                                        </tr>
                                                        <tr>
                                                            <td><strong>7.</strong></td>
                                                            <td><strong>First Member Phone No</strong></td>   
                                                            <td><?php echo $row["contact1"];?></td>         
                                                        </tr>
                                                        <tr>
                                                            <td><strong>8.</strong></td>
                                                            <td><strong>Second Member Name</strong></td>   
                                                            <td><?php echo $row["secondMemberName"];?></td>         
                                                        </tr>
                                                        <tr>
                                                            <td><strong>9.</strong></td>
                                                            <td><strong>Second Member Email ID</strong></td>   
                                                            <td><?php echo $row["emailId2"];?></td>         
                                                        </tr>
                                                        <tr>
                                                            <td><strong>10.</strong></td>
                                                            <td><strong>Second Member Phone No</strong></td>   
                                                            <td><?php echo $row["contact2"];?></td>         
                                                        </tr>
                                                        <tr>
                                                            <td><strong>11.</strong></td>
                                                            <td><strong>Third Member Name</strong></td>   
                                                            <td><?php echo $row["thirdMemberName"];?></td>         
                                                        </tr>
                                                         <tr>
                                                            <td><strong>12.</strong></td>
                                                            <td><strong>Third Member Name</strong></td>   
                                                            <td><?php echo $row["thirdMemberName"];?></td>         
                                                        </tr>
                                                        <tr>
                                                            <td><strong>13.</strong></td>
                                                            <td><strong>Third Member Email ID</strong></td>   
                                                            <td><?php echo $row["emailId3"];?></td>         
                                                        </tr>
                                                        <tr>
                                                            <td><strong>14.</strong></td>
                                                            <td><strong>Third Member Phone No</strong></td>   
                                                            <td><?php echo $row["contact3"];?></td>         
                                                        </tr>
                                                        <tr>
                                                            <td><strong>15.</strong></td>
                                                            <td><strong>College</strong></td>   
                                                            <td><?php echo $row["college"];?></td>         
                                                        </tr>
                                                        <tr>
                                                            <td><strong>16.</strong></td>
                                                            <td><strong>Third Member Phone No</strong></td>   
                                                            <td><?php echo $row["contact3"];?></td>         
                                                        </tr>
                                                        <tr>
                                                            <td><strong>17.</strong></td>
                                                            <td><strong>Team Leader phone No</strong></td>   
                                                            <td><?php echo $row["contactNo"];?></td>         
                                                        </tr>
                                                        
                                                    <?php
                                                    $counter++;
                                                }
                                            ?>
                                            
                                        </tbody>
                                    </table>
                                </div><!-- /.box-body -->
                            </div>
                        </div>
                    </div>
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
<!-- jQuery 2.0.2 -->
<script src="include/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="include/bootstrap.min.js" type="text/javascript"></script>
<!-- Admin App -->
<script src="include/app.js" type="text/javascript"></script>
<!-- DATA TABES SCRIPT -->
<script src="include/jquery.dataTables.js" type="text/javascript"></script>
<script src="include/dataTables.bootstrap.js" type="text/javascript"></script>
<!-- page script -->
<script type="text/javascript">
	$(function() {
		$("#teamsTable").dataTable();
	});
</script>		
<?php include "include/Footer.php" ?>