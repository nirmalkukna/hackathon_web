<?php 
include "include/check-session.php" ;
include "../databaseConnect.php" ;
include "include/TopMost.php" ;?>
<title>Add Category | <?php echo $siteName?></title>

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
                        Add Category
                       
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="admins.php">Admins</a></li>
						<li class="active">Add Admin</li>
                    </ol>
                </section>
                <!-- Main content -->
                <section class="content">
					<?php If($_REQUEST["err"] == "1"){ ?>
						<div class="alert alert-danger alert-dismissable">
							<i class="fa fa-ban"></i>
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<b>Oops!</b> Enter Category
						</div>
					<?php } ?>
					<?php If($_REQUEST["err"] == "2"){ ?>
						<div class="alert alert-danger alert-dismissable">
							<i class="fa fa-ban"></i>
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<b>Oops!</b> Category is exist already.
						</div>
					<?php } ?>
                    <div class="row">
						<form action="add-category-process.php" method="post" role="form" name="addAdmin">
	                        <div class="col-md-6">
	                            <div class="box box-primary">
	                                <div class="box-header">
	                                    <h3 class="box-title">Fill Category details</h3>
	                                </div><!-- /.box-header -->
	                                <div class="box-body">
										<div class="form-group">
											<label>Category Name</label>
											<input type="text" name="categoryName" value="<?php echo $_SESSION["categoryName"];?>" required="" class="form-control"/>
										</div>
										<div class="form-group">
											<label>status</label>
											<select name="status" class="form-control">
												<option value="1">Active</option>
												<option value="0">In-Active</option>
											</select>
										</div>
	                                </div><!-- /.box-body -->
									<div class="box-footer clearfix">
										<input value="Add Category" type="submit" class="btn btn-primary pull-right" data-toggle="tooltip" title="Add Category">
	                                </div>
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
		
<?php include "include/Footer.php" ?>
