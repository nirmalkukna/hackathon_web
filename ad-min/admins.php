<?php 
include  "include/check-session.php" ;
include "../databaseConnect.php" ;
$numRecordPerPage=10;
//include "include/pagination.php" ;
include  "include/helperMethods.php";
$pagePermissionId = 4; //PERMISSION TO VIEW admins
include "include/TopMost.php" ;?>

<title>Admin Management | <?php echo $siteName ?></title>
<!-- DATA TABLES -->
<link href="include/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
function deleteConfirm(id)
{
	if(confirm("Are you sure you want to delete this Admin?"))
	{
		location.href = "delete-admin.php?id=" + id;
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
                        Admin Management
                        <small>Add, Edit, Delete Administrator of <?php echo $siteName; ?></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Admins</li>
                    </ol>
                </section>
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
							<?php if($_REQUEST["msg"] == "1"){ ?>
								<div class='alert alert-success alert-dismissable'>
									<i class='fa fa-check'></i>
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
									<b>Done!</b> Admin has been added successfully.
								</div>
							<?php } if($_REQUEST["msg"] == "2"){ ?>
								<div class="alert alert-success alert-dismissable">
									<i class="fa fa-check"></i>
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
									<b>Done!</b> Admin has been updated successfully.
								</div>
							<?php }	if($_REQUEST["msg"] == "3"){ ?>
								<div class="alert alert-success alert-dismissable">
									<i class="fa fa-check"></i>
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
									<b>Done!</b> Admin has been deleted successfully.
								</div>
							<?php } If($_REQUEST["msg"] == "4"){ ?>
								<div class="alert alert-success alert-dismissable">
									<i class="fa fa-check"></i>
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
									<b>Done!</b> Admin Password has been changed successfully.
								</div>
							<?php }	?>
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Administrators of <?php echo $siteName; ?></h3>
									<div class="box-tools pull-right">
                                        <a href="add-admin.php" class="btn btn-default btn-sm text-blue"><i class="fa fa-plus"></i> Add Admin</a>
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="adminsTable" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
												<th>Admin ID</th>
												<th>Full Name</th>
												<th>User Name</th>					
												<th>Email Address</th>
												<th>Status</th>
												<th>Edit</th>
												<th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
											$stmt = $conn->prepare("select * from tbladmins order by adminId desc");
											$stmt->execute();
											while($rows = $stmt->fetch())
											{
											$status = $rows["status"];
											
											if( $status == 0)
											{ 
												$status = "Inactive";
											}
											else
											{	
												$status = "Active";
											}
											?>
											<tr>
												<td><?php echo $rows["adminId"]?></td>
												<td><?php echo $rows["adminName"]?></td>
												<td><?php echo $rows["adminUserName"]?></td>
												<td><?php echo $rows["adminEmailId"]?></td>
												
												<td><?php echo $status ?></td>
												<td><a href="edit-admin.php?id=<?php echo $rows["adminId"]?>"><i class="fa fa-pencil"></i></a></td> 
												<td><a href="delete-admin.php" onClick="JavaScript:deleteConfirm(<?php echo $rows["adminId"]?>); return false"><i class="fa fa-trash-o"></i></a></td> 
											</tr> 
											<?php
											}
												$stmt->null;
												$conn->null;
											?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Admin ID</th>
												<th>Full Name</th>
												<th>User Name</th>					
												<th>Email Address</th>
												<th>Status</th>
												<th>Edit</th>
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
		$("#adminsTable").dataTable();
	});
</script>		
<?php include "include/Footer.php" ?>