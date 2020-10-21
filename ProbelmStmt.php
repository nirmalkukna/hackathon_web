<?php include "includes/TopMost.php";?>
	<title>Problems Statement</title>
<?php
	include "includes/Top.php";
	include "includes/Header.php";
	//include "includes/Banner.php";
?>
	<!--================ Start Features Area =================-->
	<?php include "databaseConnect.php";?>
	 <!--================ Start Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content text-center">
                    <h2>Problem Statements</h2>
                    <div class="page_link">
                        <a href="index.html">Home</a>
                        <a href="prb_stmnt.html">Problem Statements</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
	<section class="features_area section_gap_top">
        <div class="container">
            <div class="row justify-content-center">
                <?php
                    if($_REQUEST["err"]==1)
                    {?>
                    <div class="alert alert-danger alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong>oops!</strong> Plese login to your account first.
                    </div>
                    <?php
                        
                    }
                ?> 
                <?php
                    if($_REQUEST["err"]==2)
                    {?>
                    <div class="alert alert-danger alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong>oops!</strong> probelm id is not valid.
                    </div>
                    <?php
                        
                    }
                ?> 
                
            </div>
			<table class="table">
				<thead>
				  <tr>
					<th>S. No.</th>
					<th>Organization Name</th>
					<th>Field</th>
					<th>Problem Statement</th>
				  </tr>
				</thead>
				<tbody>
				    <?php 
				        $stmt=$conn->prepare("SELECT * FROM  tblprobelm INNER JOIN tblcategory ON tblprobelm.categoryId = tblcategory.categoryId;");
				        $stmt->execute();
				        $data =$stmt->fetchAll();
				        $counter=1;
				        foreach($data as $row)
				        {
				            ?>
				                <tr>
				                    <td><?php echo $counter;?></td>
                					<td><?php echo $row["organisationName"];?></td>
                					<td><?php echo $row["categoryName"];?></td>
                					<td><div class="reply-btn">
                                        <a href="" data-toggle="modal" data-target="#myModal<?php echo $row["problemId"];?>" class="btn-reply text-uppercase">VIEW</a> 
                                    <div id="myModal<?php echo $row["problemId"];?>" class="modal fade" role="dialog">
                                      <div class="modal-dialog" style="position: relative; top:100px;">
                                    
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                          <div class="modal-body">
                                            <h5><?php echo $row["categoryName"];?></h5>
                                            <?php echo $row["problemDescription"];?>
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-success">
                                                <a href="Team/add-team-probelm.php?p_id=<?php echo $row["problemId"];?>"style="color:white;">Action</a>
                                            </button>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                          </div>
                                        </div>
                                    
                                      </div>
                                    </div>
                                    </div>
                        
                                </td>
				                </tr>
				            <?php
				            $counter++;
				        }
				    ?>
				  
				 
				</tbody>
			</table>
		  </div>
        </div>
    </section>
    <!--================ End Features Area =================-->
<?php
	include "includes/NewsLetter.php";
	include "includes/Footer.php";
?>