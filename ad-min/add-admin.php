<?php 
include "include/check-session.php" ;
include "../databaseConnect.php" ;
include "include/TopMost.php" ;?>
<title>Add Admin | <?php echo $siteName?></title>

<?php 
include "include/Top.php";
?>
<link href="<?php echo $siteUrl ?>/ad-min/include/iCheck/minimal/blue.css" rel="stylesheet" type="text/css" />
<?php
include "include/LeftSideBar.php";?>
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Add Admin
                        <small>Select administrator's permissions carefully.</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="admins.php">Admins</a></li>
						<li class="active">Add Admin</li>
                    </ol>
                </section>
                <!-- Main content -->
                <section class="content">
					<?php If($_REQUEST["msg"] == "1"){ ?>
						<div class="alert alert-success alert-dismissable">
							<i class="fa fa-ban"></i>
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<b>Oops!</b> Admin by this Email Address Already exists (<?php echo $_Session["userName"]?>).
						</div>
					<?php } ?>
					<?php If($_REQUEST["err"] == "1"){ ?>
						<div class="alert alert-danger alert-dismissable">
							<i class="fa fa-ban"></i>
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<b>Oops!</b> Enter Admin Name.
						</div>
					<?php } ?>
					<?php If($_REQUEST["err"] == "2"){ ?>
						<div class="alert alert-danger alert-dismissable">
							<i class="fa fa-ban"></i>
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<b>Oops!</b> Enter Admin Email Id.
						</div>
					<?php } ?>
					<?php If($_REQUEST["err"] == "3"){ ?>
						<div class="alert alert-danger alert-dismissable">
							<i class="fa fa-ban"></i>
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<b>Oops!</b> Enter Admin User Name.
						</div>
					<?php } ?>
					<?php If($_REQUEST["err"] == "4"){ ?>
						<div class="alert alert-danger alert-dismissable">
							<i class="fa fa-ban"></i>
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<b>Oops!</b> Enter Admin Password.
						</div>
					<?php } ?>
                    <div class="row">
						<form action="add-admin-process.php" method="post" role="form" name="addAdmin">
	                        <div class="col-md-6">
	                            <div class="box box-primary">
	                                <div class="box-header">
	                                    <h3 class="box-title">Fill administrator details</h3>
	                                </div><!-- /.box-header -->
	                                <div class="box-body">
										<div class="form-group">
											<label>Full Name</label>
											<input name="adminName1" class="form-control" value="<?php echo $_SESSION["adminName1"]; ?>" type="text" required/>
										</div>
										<div class="form-group">
											<label>User Name</label>
											<input name="adminUserName" class="form-control" value="<?php echo $_SESSION["adminUserName"]; ?>" type="text" required/></td>
										</div>
										<div class="form-group">
											<label>Email Address</label>
											<input name="adminEmail" class="form-control" value="<?php echo $_SESSION["adminEmail"] ; ?>" type="text" required/>
										</div>
										<div class="form-group">
											<label>Password</label>
											<input name="adminPassword" class="form-control" value="" type="Password" required/>
										</div>
										
											<label>Status - </label>
											<input type="radio" name="status" class="sgrChk" value="1" checked> Active
											<input type="radio" name="status" value="0"> Inactive
	                                </div><!-- /.box-body -->
									<div class="box-footer clearfix">
										<input value="Add Admin" type="submit" class="btn btn-primary pull-right" data-toggle="tooltip" title="Add Admin">
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
	                                        </div>
	                                    </div>
	                                </div><!-- /.box-header -->
	                            </div><!-- /.box -->
	                        </div>
						</form>
                    </div>
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
        <!-- jQuery 2.0.2 -->
        <script src="<?php echo $siteUrl ?>/ad-min/include/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="<?php echo $siteUrl ?>/ad-min/include/bootstrap.min.js" type="text/javascript"></script>
        <!-- Admin App -->
        <script src="<?php echo $siteUrl ?>/ad-min/include/app.js" type="text/javascript"></script>
		<script type="text/javascript">
		$(document).ready(function() {
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
