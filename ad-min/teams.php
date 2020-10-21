<?php 
include  "include/check-session.php" ;
include "../databaseConnect.php" ;
$numRecordPerPage=10;
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
                        Teams Management
                        <small>Add, Edit, Delete Teams of <?php echo $siteName; ?></small>
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
							<?php if($_REQUEST["msg"] == "3"){ ?>
                                <div class='alert alert-success alert-dismissable'>
                                    <i class='fa fa-check'></i>
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <b>Done!</b> Team is Deletd Successfully.
                                </div>
                            <?php }?>
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Teams of <?php echo $siteName; ?></h3>
									<div class="box-tools pull-right disable">
                                        <a href="" class="btn btn-default btn-sm text-blue"><i class="fa fa-plus"></i> Add Team</a>
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="teamsTable" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
												<th>S.No</th>
												<th>Team Name</th>
												<th>Team Leader Name</th>
												<th>Leader Email ID</th>
												<th>College</th>
												<th>Phone</th>
												<th>Status</th>
												<th>Details</th>
												<th>Update</th>
												<th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            	include "databaseConnect.php";
                                            	$stmt=$conn->prepare("select * from 
                                            		tblteam order by teamId desc"); 
                                            	$stmt->execute();
                                            	$data=$stmt->fetchAll();
                                            	$counter=1;
                                            	foreach($data as $row)
                                            	{
                                            		?>
                                            			<tr>
                                            				<td><?php echo $counter;?></td>
                                            				<td><?php echo $row["teamName"];?></td>
                                            				<td><?php echo $row["teamLeaderName"];?></td>
                                            				<td><?php echo $row["emailId"];?></td>
                                            				<td><?php echo $row["college"];?></td>
                                            				<td><?php echo $row["contactNo"];?></td>
                                            				<td>
                                            					<?php
                                            						if($row["status"]==1)
                                            						{
                                            							echo "Active";
                                            						}
                                            						else
                                            						{
                                            							echo "inActive";
                                            						}
                                            					?>
                                            			
                                            				</td>
                                            				<td><a href="team-details.php?id=<?php echo $row["teamId"];?>"><i class="fa fa-info"></i></a></td>
                                            				<td><a href="edit-team.php?id=<?php echo $row["teamId"];?>"><i class="fa fa-pencil"></i></a></td>
                                            				<td>
                                                                <a href="delete-team.php" onClick="JavaScript:deleteConfirm(id=<?php echo $row["teamId"];?>); return false"><i class="fa fa-trash-o"></i>
                                                                </a></td>
                                            			</tr>
                                            		<?php
                                            		$counter++;
                                            	}
                                            ?>
											
                                        </tbody>
                                        <tfoot>
                                            <tr>
												<th>S.No</th>
												<th>Team Name</th>
												<th>Team Leader Name</th>
												<th>Leader Email ID</th>
												<th>College</th>
												<th>Phone</th>
												<th>Status</th>
												<th>Details</th>
												<th>Update</th>
												<th>Delete</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div><!-- /.box-body -->

									<div class="row">
										<div class="col-xs-6">
											<div class="dataTables_info" id="membersTable_info">
												<?php 
												 
												?>
											</div>
										</div>
										<div class="col-xs-6">
											<div class="dataTables_paginate paging_bootstrap">
												<ul class="pagination">
												<li>
												<?php
												
											     ?>
												</ul>
											</div>
										</div>
									</div>
                            </div><!-- /.box -->
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