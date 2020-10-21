<?php 
include "include/check-session.php" ;
include "../databaseConnect.php" ;
include "include/TopMost.php" ;?>
<title>Add Probelm | <?php echo $siteName?></title>

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
                        Add Probelm
                       
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="probelms.php">Probelms</a></li>
						<li class="active">Add Probelms</li>
                    </ol>
                </section>
                <!-- Main content -->
                <section class="content">
					<?php If($_REQUEST["err"] == "1"){ ?>
						<div class="alert alert-danger alert-dismissable">
							<i class="fa fa-ban"></i>
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<b>Oops!</b> Enter Probelm Title
						</div>
					<?php } ?> 
					<?php If($_REQUEST["err"] == "2"){ ?>
						<div class="alert alert-danger alert-dismissable">
							<i class="fa fa-ban"></i>
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<b>Oops!</b> Enter organisation name.
						</div>
					<?php } ?>
					<?php If($_REQUEST["err"] == "3"){ ?>
						<div class="alert alert-danger alert-dismissable">
							<i class="fa fa-ban"></i>
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<b>Oops!</b> Enter Description of Problem(minimum 100 characters).
						</div>
					<?php } ?>
                    <div class="row">
						<form action="add-probelm-process.php" method="post" role="form" name="addAdmin">
	                        <div class="col-md-6">
	                            <div class="box box-primary">
	                                <div class="box-header">
	                                    <h3 class="box-title">Fill Probelm details</h3>
	                                </div><!-- /.box-header -->
	                                <div class="box-body">
										<div class="form-group">
											<label>Probelm Title</label>
											<input type="text" name="problemTitle" value="<?php echo $_SESSION["problemTitle"];?>" required="" class="form-control"/>
										</div>
										<div class="form-group">
											<label>Probelm Category</label>
											<select name="categoryId" class="form-control">
												<?php
													$status=1;
													$stmt=$conn->prepare("SELECT * FROM tblcategory where status=:status");
													$stmt->bindParam(":status",$status);
													$stmt->execute(); 
													$data=$stmt->fetchAll();

													foreach($data as $row)
													{
														?>
															<option value="<?php echo $row["categoryId"];?>"><?php echo $row["categoryName"];?></option>
														<?php
													}
												?>	
											</select>

										</div>
										<div class="form-group">
											<label>Organisation</label>
											<input type="text" name="organisationName" value="<?php echo $_SESSION["organisationName"];?>" required="" class="form-control"/>
										</div>
										<div class="form-group">
											<label>Description</label>
											<textarea name="problemDescription" value="<?php echo $_SESSION["problemDescription"];?>" 
											class="form-control" style="height:150;" ></textarea>

										</div>
	                                </div><!-- /.box-body -->
									<div class="box-footer clearfix">
										<input value="Add Probelm" type="submit" class="btn btn-primary pull-right" data-toggle="tooltip" title="Add Probelm">
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
        <script src="https://cloud.tinymce.com/5/tinymce.min.js"></script>
  		<script>tinymce.init({ selector:'textarea' });</script>
		
<?php include "include/Footer.php" ?>
