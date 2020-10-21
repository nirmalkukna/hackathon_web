<?php 
include "include/check-session.php" ;
include "../databaseConnect.php" ;
include "include/TopMost.php" ;?>
<title>Edit Admin | <?php echo $siteName ?></title>
<?php
$id = $_REQUEST["id"];
if($id == null || !is_numeric($id))
{
	$conn=null;
	header("location:admins.php?err=1");
	exit;
}
$query ="select count(*) from tbladmins where adminId = :adminid";
$stmt=$conn->prepare($query);
$stmt->bindParam(':adminid', $id);
$stmt->execute();
$numrows=$stmt->fetchColumn(); 
if ($numrows < 1)
{
	$stmt=null;
	$conn=null;
	header("location:admins.php");
}
else
{
	$stmt = $conn->prepare("select * from tbladmins where adminId=:adminId");
	$stmt->bindParam(':adminId', $id);
	$stmt->execute();
	$row = $stmt->fetch();
	$status = $row["adminUserName"];
	$adminName11	= $row["adminName"];
	$adminUserName	= $row["adminUserName"];
	$adminPassword	= $row["adminPassword"];
	$status			= $row["status"];
	$adminEmailId	= $row["adminEmailId"];
	$stmt=null;
}
include "include/Top.php" ;
include "include/LeftSideBar.php" ; ?>
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Edit Admin
                        <small>Select administrator's permissions carefully.</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="admins.php">Admins</a></li>
						<li class="active">Edit Admin</li>
                    </ol>
                </section>
                <!-- Main content -->
                <section class="content">
					<?php if($_REQUEST["msg"] == "1") {?>
						<div class="alert alert-danger alert-dismissable">
							<i class="fa fa-ban"></i>
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<b>Oops!</b> Admin by this Email Address Already exists (<?php echo $_SESSION["adminUserName"] ?>).
						</div>
					<?php } ?>
					<?php if($_REQUEST["err"] == "1") {?>
						<div class="alert alert-danger alert-dismissable">
							<i class="fa fa-ban"></i>
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<b>Oops!</b> Enter Admin Name.
						</div>
					<?php } ?>
					<?php if($_REQUEST["err"] == "2") {?>
						<div class="alert alert-danger alert-dismissable">
							<i class="fa fa-ban"></i>
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<b>Oops!</b> Enter Admin User Name.
						</div>
					<?php } ?>
					<?php if($_REQUEST["err"] == "3") {?>
						<div class="alert alert-danger alert-dismissable">
							<i class="fa fa-ban"></i>
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<b>Oops!</b> Enter Admin Email Address.
						</div>
					<?php } ?>
                    <div class="row">
						<form action="edit-admin-process.php" method="post" role="form" name="addAdmin">
						<input type="hidden" name="adminId" value="<?php echo $id?>">
                        <div class="col-md-6">
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Fill administrator details</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
									<div class="form-group">
										<label>Full Name</label>
										<input name="adminName" class="form-control" value="<?php echo $adminName11 ?>" type="text" required/>
									</div>
									<div class="form-group">
										<label>User Name</label>
										<input name="adminUserName" class="form-control" value="<?php echo $adminUserName ?>" type="text" required/></td>
									</div>
									<div class="form-group">
										<label>Email Address</label>
										<input name="adminEmail" class="form-control" value="<?php  echo $adminEmailId ?>" type="text" required/>
									</div>
									<div class="form-group">
										<label>Status - </label>
										<div class="radio inline">
											<input type="radio" name="status" value="1"  <?php if($status ==1){echo "checked";} ?>> Active
											<input type="radio" name="status" value="0"  <?php if($status ==0){echo "checked";} ?>> Inactive
										</div>
									</div>
                                </div><!-- /.box-body -->
								<div class="box-footer clearfix">
									<input value="Update Admin" type="submit" class="btn btn-primary pull-right" data-toggle="tooltip" title="Update Admin">
                                </div>
                            </div><!-- /.box -->
                        </div>
						<div class="col-md-6">
                            <div class="box box-danger">
                                <div class="box-header">
                                    <h3 class="box-title">Admin's Permissions</h3>
                                      <div class="box-tools pull-right">
                                        <div class="btn-group" data-toggle="btn-toggle">
										<button type="button" class="btn btn-default btn-sm" id="selecctall"><i class="fa fa-square text-green"></i> SELECT ALL</button>
										<button type="button" class="btn btn-default btn-sm active" id="deselecctall"><i class="fa fa-square text-red"></i> DESELECT ALL</button>
									</div></div>
                                </div><!-- /.box-header -->
                                <div class="box-body">
									
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
						</form>
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
<script type="text/javascript">
 $(function() {
	$('#selecctall').click(function(event) {
		$('.sgrCheck').each(function() {
			this.checked = true;
		});
	});
	$('#deselecctall').click(function(event) {
		$('.sgrCheck').each(function() {
			this.checked = false;
		});
	});
});
</script>
<?php include "include/Footer.php" ?>