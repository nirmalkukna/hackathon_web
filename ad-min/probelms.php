<?php 
include  "include/check-session.php" ;
include "../databaseConnect.php" ;
//include "include/pagination.php" ;
include  "include/helperMethods.php";
include "include/TopMost.php" ;?>

<title>Problem Management | <?php echo $siteName ?></title>
<!-- DATA TABLES -->
<link href="include/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
function deleteConfirm(id)
{
	if(confirm("Are you sure you want to delete this Probelm?"))
	{
		location.href = "delete-probelm.php?id=" + id;
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
                        Problem Management
                        <small>Add, Delete Problem of <?php echo $siteName; ?></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Problems</li>
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
									<b>Done!</b> Probelm has been added successfully.
								</div>
							<?php }?>
                            <?php if($_REQUEST["msg"] == "2"){ ?>
                                <div class='alert alert-success alert-dismissable'>
                                    <i class='fa fa-check'></i>
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <b>Done!</b> Probelm has been deleted successfully.
                                </div>
                            <?php }?>
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">probelms of <?php echo $siteName; ?></h3>
									<div class="box-tools pull-right">
                                        <a href="add-probelms.php" class="btn btn-default btn-sm text-blue"><i class="fa fa-plus"></i> Add Probelm</a>
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="probelmTable" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
												<th>S.No</th>
												<th>Probelm Title</th>
												<th>Category</th>
												<th>Organisation</th>
												<th>Description</th>
												<th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            	$stmt=$conn->prepare("select  * from tblprobelm inner join tblcategory ON tblprobelm.categoryId = tblcategory.categoryId;");
                                            	$stmt->execute();
                                            	$data=$stmt->fetchAll();
                                            	$counter=1;
                                            	foreach($data as $row)
                                            	{
                                            		?>
                                            			<tr>
                                            				<td><?php echo $counter;?></td>
                                            				<td><?php echo $row["problemTitle"];?></td>
                                            				<td><?php echo $row["categoryName"];?></td>
                                            				<td><?php echo $row["organisationName"];?></td>
                                            				<td><button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#<?php echo $row["problemTitle"];?>">show</button></td>
                                            				<td><a href="delete-probelm.php" onClick="JavaScript:deleteConfirm(<?php echo $row["problemId"]?>); return false"><i class="fa fa-trash-o"></i></a></td> 
                                            			</tr>
                                            		<?php
                                                    $counter++;
                                            	}
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                              	<th>S.No</th>
												<th>Probelm Title</th>
												<th>Category</th>
												<th>Organisation</th>
												<th>Description</th>
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
		$("#probelmTable").dataTable();
	});
</script>		
<?php include "include/Footer.php" ?>