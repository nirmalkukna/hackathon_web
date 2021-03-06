<?php 
include "include/check-session.php" ;
include "../databaseConnect.php" ;
include "include/TopMost.php" ;?>
<title>Upload Solution | <?php echo $siteName?></title>

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
                        Upload Solution of <?php echo $_SESSION["teamName"];?>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
						<li class="active">Upload</li>
                    </ol>
                </section>
                <!-- Main content -->
                <section class="content">
					
					
                    <div class="row">
						<form action="upload-solution-process.php" method="post" id="formData" enctype="multipart/form-data">
	                        <div class="col-md-6">
	                            
	                            <div class="box box-primary">
	                                <div class="box-header">
	                                    <h3 class="box-title">Plese Upload Your Solution 
	                                    <small class="text-danger">(Only Pdf files are allowed.)</small></h3>
	                                </div><!-- /.box-header -->
	                                <div class="box-body">
	                                    <?php If($_REQUEST["err"] == "1"){ ?>
            						<div class="alert alert-danger alert-dismissable">
            							<i class="fa fa-ban"></i>
            							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            							<b>Oops!</b> Only PDF file is allowed.
            						</div>
                    					<?php } ?>
                    					<?php If($_REQUEST["err"] == "2"){ ?>
                    						<div class="alert alert-danger alert-dismissable">
                    							<i class="fa fa-ban"></i>
                    							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    							<b>Oops!</b> You Have Uploaded File already.
                    						</div>
                    					<?php } ?>
                    					<?php If($_REQUEST["msg"] == "1"){ ?>
                    						<div class="alert alert-success alert-dismissable">
                    							
                    							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    							<b>Done !</b> Your solution is uploaded successfully.
                    						</div>
                    					<?php } ?>
	                                    <div class="form-group">
	                                        <input type="hidden" name="teamId" value="<?php echo $_SESSION["teamId"];?>"/>
	                                    </div>
	                                	
	                                	<div class="form-group">
	                                		<input type="file" name="solution" class="form-control"/>
	                                	</div>
	                                	<div class="box-footer clearfix">
											<input value="Upload-Solution" id="submit" type="submit" class="btn btn-primary pull-right" data-toggle="tooltip" title="Upload-Solution">
	                                </div>
									</div><!-- /.box-body -->	
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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		
<?php include "include/Footer.php" ?>
