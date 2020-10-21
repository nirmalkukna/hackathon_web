<?php 
include  "include/check-session.php" ;
include "../databaseConnect.php" ;
$numRecordPerPage=10;
 $teamId=$_REQUEST["id"];
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
                        Teams Details
                        
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="teams.php"><i class="fa fa-dashboard"></i> Teams</a></li>
                        <li class="active">Teams</li>
                    </ol>
                </section>
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
							<?php if($_REQUEST["msg"] == "3"){ ?>
                                <div class='alert alert-success alert-dismissable'>
                                    <i class='fa fa-check'></i>
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <b>Done!</b> Team is Deletd Successfully.
                                </div>
                            <?php }?>
                            <div class="col-md-6">
                                <div class=" box">
                                <div class="box-header">
                                    <h3 class="box-title">Teams of Details <?php echo $siteName; ?></h3>
                                    
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
                                                            <td><strong>Team Name</strong></td>   
                                                            <td><?php echo $row["teamName"];?></td>         
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Team Leader Name</strong></td>   
                                                            <td><?php echo $row["teamLeaderName"];?></td>         
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Email ID</strong></td>   
                                                            <td><?php echo $row["emailId"];?></td>         
                                                        </tr>
                                                        <tr>
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
                                                            <td><strong>First Member Name</strong></td>   
                                                            <td><?php echo $row["firstMemberName"];?></td>         
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Second Member Name</strong></td>   
                                                            <td><?php echo $row["secondMemberName"];?></td>         
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Third Member Name</strong></td>   
                                                            <td><?php echo $row["thirdMemberName"];?></td>         
                                                        </tr>
                                                        <tr>
                                                            <td><strong>College</strong></td>   
                                                            <td><?php echo $row["college"];?></td>         
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Phone No</strong></td>   
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