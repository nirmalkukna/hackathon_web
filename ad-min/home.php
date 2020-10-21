<?php include "include/check-session.php" ;?>
<?php 
include "../databaseConnect.php";
?>

<?php include "include/TopMost.php"; ?>
        <title>Dashboard | <?php echo $siteName ?></title>
		<!-- Morris chart -->
        <link href="include/morris.css" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="include/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- Date Picker -->
        <link href="include/datepicker3.css" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="include/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="include/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
         <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
		<script>
		new Morris.Line({
  // ID of the element in which to draw the chart.
  element: 'myfirstchart',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: [
    { year: '2008', value: 20 },
    { year: '2009', value: 10 },
    { year: '2010', value: 5 },
    { year: '2011', value: 5 },
    { year: '2012', value: 20 }
  ],
  // The name of the data record attribute that contains x-values.
  xkey: 'year',
  // A list of names of data record attributes that contain y-values.
  ykeys: ['value'],
  // Labels for the ykeys -- will be displayed when you hover over the
  // chart.
  labels: ['Value']
});
		</script>
<?php include "include/Top.php" ?>
<?php include "include/LeftSideBar.php" ;
?>	
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Welcome to <?php echo $siteName ?>'s Administration
                        <small>Control panel</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </section>
               <!-- Main content -->
                <section class="content">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
					<?php if($_REQUEST["msg"] == "4"){?>
								<div class="alert alert-success alert-dismissable">
									<i class="fa fa-check"></i>
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
									<b>Done!</b> Admin Password has been changed successfully.
								</div>
							<?php
								}
								?>
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3>
									<?php
										
                                        $stmt=$conn->prepare("select adminId from tbladmins");
                                        $stmt->execute();
                                        $count=$stmt->rowCount();
                                        echo $count;
                                        ?>
                                    </h3>
                                    <p>
										Total Admins
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="admins.php" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        
						<div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3>
										<?php
                                         $stmt=$conn->prepare("select teamId from tblteam");
                                        $stmt->execute();
                                        $count=$stmt->rowCount();
                                        echo $count; 
                                        ?>
                                       
                                    </h3>
                                    <p>
                                        Total Number of Teams.
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-paper-airplane"></i>
                                </div>
                                <a href="teams.php" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                       
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3>
										<?php
                                         $stmt=$conn->prepare("select problemId from tblprobelm");
                                        $stmt->execute();
                                        $count=$stmt->rowCount();
                                        echo $count; 
                                        ?>
                                    </h3>
                                    <p>
                                      Total Probelms. 
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-compose"></i>
                                </div>
                                <a href="probelms.php" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->			
                    </div><!-- /.row -->
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        <!-- jQuery 2.0.2 -->
        <script src="include/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="include/bootstrap.min.js" type="text/javascript"></script>
        <!-- Admin App -->
        <script src="include/app.js" type="text/javascript"></script>
        <!-- Morris.js charts -->
        <script src="include/raphael-min.js"></script>
        <script src="include/morris.min.js" type="text/javascript"></script>
		
        <!-- Sparkline -->
        <script src="include/jquery.sparkline.min.js" type="text/javascript"></script>
		
        <!-- jvectormap -->
        <script src="include/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
        <script src="include/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="include/daterangepicker.js" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="include/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="include/icheck.min.js" type="text/javascript"></script>
        <script type="text/javascript">
		
		</script>
<?php include "include/Footer.php"; ?>