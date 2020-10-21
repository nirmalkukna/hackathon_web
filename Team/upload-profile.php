<?php 
include "include/check-session.php" ;
include "../databaseConnect.php" ;
include "include/TopMost.php" ;?>
<title>Update Profile | <?php echo $siteName?></title>

<?php 
include "include/Top.php";
?>
<style>
	.profile-box{
		border: 1px solid #ddd;
		  border-radius: 4px;
		  padding: 5px;
		  width: 200px;
		  height:200px;
	}
</style>
<link href="<?php echo $siteUrl ?>/ad-min/include/iCheck/minimal/blue.css" rel="stylesheet" type="text/css" />
<?php
include "include/LeftSideBar.php";?>
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Update Profile of <?php echo $_SESSION["teamName"];?>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
						<li class="active">Upload</li>
                    </ol>
                </section>
                <!-- Main content -->
                <section class="content">
					
					
                    <div class="row">
						<form action="" method="post" id="formData" enctype="multipart/form-data">
	                        <div class="col-md-6">
	                            <div class="box box-primary">
	                                <div class="box-header">
	                                    <h3 class="box-title">Select Profile Here</h3>
	                                </div><!-- /.box-header -->
	                                <div class="box-body">
	                                	<input type="hidden" name="teamId" value="<?php echo $_SESSION["teamId"];?>"/>	
                						<div id="wrapper">
											 <img id="output_image" src="images/avatar-male.png" class="profile-box"/>	
										</div>
										<br>
	                                	<div class="form-group">
	                                		<input type="file" name="images" accept="image/*"  onchange="preview_image(event)">
	                                	</div>
	                                	<div class="box-footer clearfix">
											<input value="Add Profile" id="submit" type="submit" class="btn btn-primary pull-right" data-toggle="tooltip" title="Add Profile">
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
		<script type="text/javascript">
			function preview_image(event) 
			{
			 var reader = new FileReader();
			 reader.onload = function()
			 {
			  var output = document.getElementById('output_image');
			  output.src = reader.result;
			 }
			 reader.readAsDataURL(event.target.files[0]);
			}
		</script>
		<script>
			$(document).ready(function(){
				$('#submit').click(function(e){
					e.preventDefault();
					var form = $('#formData')[0];
			        var formData = new FormData(form);
			        event.preventDefault();
			        $.ajax({
			            url: "upload-profile-process.php", // the endpoint
			            type: "POST", // http method
			            processData: false,
			            contentType: false,
			            data: formData,
			            success:function(data){
                            if(data=="1"){
                                alert("Your Profile is Updated..");
                                top.location.href = 'home.php';
                            }
                            else{
                                alert(data);
                            }
			            		
			             	
			            }
			        });
				});
			});
		</script>
<?php include "include/Footer.php" ?>
