<?php session_start();?>
<?php include "includes/TopMost.php";?>
	<title>REGISTRATION | POORNIMA HACKATHON</title>
<?php
	include "includes/Top.php";
	include "includes/Header.php";
	//include "includes/Banner.php";
?>
    <style>
        span{
            color:red;
            font-size:16px;
            font-family:none;
        }
    </style>
	<!--================ Start Features Area =================-->
	 <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content text-center">
                    <h2>Register</h2>
                    <div class="page_link">
                         <a href="index.php">Home</a>
                        <a href="Register.php">Register</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
	<section class="features_area section_gap_top">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <div class="main_title">
                        <h2>Register Your Team</h2>
                    </div>
                </div>
            </div>
          <div class="container-fluid">
        <div class="container">
            <div class="formBox">
                <form method="POST" action="Register-Process.php">
                        <div class="row">
                            <div class="col-sm-12">
                                <h5>Team Leader Details</h5>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="inputBox ">
                                     <?php if($_REQUEST["err"]==1){echo "<span>*Enter Your Team Name ?</span>";}?>
                                    <div class="inputText">Team Name</div>
                                    <input type="text" name="teamName" value="<?php echo $_SESSION["teamName"];?>" class="input">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="inputBox">
                                    <?php if($_REQUEST["err"]==2){echo "<span>*Enter Your Team Leader Name. ?</span>";}?>
                                    <div class="inputText">Leader Name</div>
                                    <input type="text" name="teamLeaderName" value="<?php echo $_SESSION["teamLeaderName"];?>" class="input">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="inputBox">
                                     <?php if($_REQUEST["err"]==3){echo "<span>*Enter Your Team Leader Email. ?</span>";}?>
                                    <div class="inputText">Email</div>
                                    <input type="email" name="teamLeaderEmailId" value="<?php echo $_SESSION["teamLeaderEmailId"];?>" class="input">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="inputBox">
                                      <?php if($_REQUEST["err"]==4){echo "<span>*Enter Your Team Leader Phone No ?. ?</span>";}?>
                                    <div class="inputText">Mobile Number</div>
                                    <input type="number" name="contactNo" value="<?php echo $_SESSION["contactNo"];?>" class="input" maxlength="10">
                                </div>
                            </div>

                             <div class="col-sm-6">
                                <div class="inputBox">
                                    <div class="inputText">Gender</div>
                                    <select id="sel1" class="input">
                                        <option></option>
                                     <option>Male</option>
                                     <option>Female</option>
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-12">
                                <h5>Member 1 Details</h5>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-6">
                                <div class="inputBox">
                                    <?php if($_REQUEST["err"]==5){echo "<span>*Enter First Member Name ?. ?</span>";}?>
                                    <div class="inputText">Name</div>
                                    <input type="text" name="firstMemberName" value="<?php echo $_SESSION["firstMemberName"];?>" class="input">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="inputBox">
                                    <?php if($_REQUEST["err"]==6){echo "<span>*Enter First Member Email ID ?. ?</span>";}?>
                                    <div class="inputText">Email</div>
                                    <input type="email" name="email1" value="<?php echo $_SESSION["email1"];?>" class="input">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="inputBox">
                                     <?php if($_REQUEST["err"]==7){echo "<span>*Enter First Member Phone No?. ?</span>";}?>
                                    <div class="inputText">Mobile Number</div>
                                    <input type="number" name="contact1" value="<?php echo $_SESSION["contact1"];?>" class="input" maxlength="10">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="inputBox">
                                    <div class="inputText">Gender</div>
                                    <select id="sel1" class="input">
                                     <option></option>
                                     <option>Male</option>
                                     <option>Female</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                          <div class="row">
                            <div class="col-sm-12">
                                <h5>Member 2 Details</h5>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-6">
                                <div class="inputBox">
                                     <?php if($_REQUEST["err"]==8){echo "<span>*Enter Second Member Name ?. ?</span>";}?>
                                    <div class="inputText">Name</div>
                                    <input type="text" name="secondMemberName" value="<?php echo $_SESSION["secondMemberName"];?>" class="input">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="inputBox">
                                     <?php if($_REQUEST["err"]==9){echo "<span>*Enter Second Member Email ID ?. ?</span>";}?>
                                    <div class="inputText">Email</div>
                                    <input type="email" name="emailId2" value="<?php echo $_SESSION["emailId2"];?>" class="input">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="inputBox">
                                     <?php if($_REQUEST["err"]==10){echo "<span>*Enter Second Member contact No ?. ?</span>";}?>
                                    <div class="inputText">Mobile Number</div>
                                    <input type="number" name="contact2" value="<?php echo $_SESSION["contact2"];?>" class="input" maxlength="10">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="inputBox">
                                     
                                    <div class="inputText">Gender</div>
                                    <select id="sel1" class="input">
                                     <option></option>
                                     <option>Male</option>
                                     <option>Female</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                          <div class="row">
                            <div class="col-sm-12">
                                <h5>Member 3 Details</h5>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-6">
                                <div class="inputBox">
                                    <?php if($_REQUEST["err"]==11){echo "<span>*Enter Third Member Name ?. ?</span>";}?>
                                    <div class="inputText">Name</div>
                                     
                                    <input type="text" name="thirdMemberName" value="<?php echo $_SESSION["thirdMemberName"];?>" class="input">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="inputBox">
                                    <?php if($_REQUEST["err"]==12){echo "<span>*Enter Third Member Email ID ?. ?</span>";}?>
                                    <div class="inputText">Email</div>
                                    <input type="email" name="emailId3" value="<?php echo $_SESSION["emailId3"];?>" class="input">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="inputBox">
                                    <?php if($_REQUEST["err"]==13){echo "<span>*Enter Third Member Phone No?. ?</span>";}?>
                                    <div class="inputText">Mobile Number</div>
                                    <input type="number" name="contact3"  value="<?php echo $_SESSION["contact3"];?>" class="input" maxlength="10">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="inputBox">
                                    <div class="inputText">Gender</div>
                                    <select id="sel1" class="input">
                                     <option></option>
                                     <option>Male</option>
                                     <option>Female</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                             <div class="row">
                            <div class="col-sm-12">
                                <h5>College Details</h5>
                            </div>
                        </div>

                         <div class="row">
                            <div class="col-sm-6">
                                <div class="inputBox">
                                    <?php if($_REQUEST["err"]==14){echo "<span>*Enter Your College Name ?</span>";}?>
                                    <div class="inputText">College Name</div>
                                    <input type="text" name="college" value="<?php echo $_SESSION["college"];?>" class="input">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="inputBox">
                                    <?php if($_REQUEST["err"]==15){echo "<span>*Enter College Adderss (length 10)?. ?</span>";}?>
                                    <div class="inputText">Address</div>
                                    <input type="text" name="Address" value="<?php echo $_SESSION["Address"];?>" class="input">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <h5>Password</h5>
                            </div>
                        </div>

                         <div class="row">
                            <div class="col-sm-6">
                                <div class="inputBox">
                                    <?php if($_REQUEST["err"]==16){echo "<span>*Enter Your Password (Min length 8) ?. ?</span>";}?>
                                    <div class="inputText">Password</div>
                                    <input type="Password" name="TeamPassword" value="<?php echo $_SESSION["TeamPassword"];?>" class="input">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="inputBox">
                                    <?php if($_REQUEST["err"]==17){echo "<span> Password does not match ?</span>";}?>
                                    <div class="inputText">Confirm Password</div>
                                    <input type="password" name="Con_TeamPassword" value="<?php echo $_SESSION["Con_TeamPassword"];?>"class="input">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <input type="submit" name="" class="button" value="Register">
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
        </div>
    </section>
     <script>
    	const items = document.querySelectorAll(".accordion a");

function toggleAccordion(){
  this.classList.toggle('active');
  this.nextElementSibling.classList.toggle('active');
}

items.forEach(item => item.addEventListener('click', toggleAccordion));
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
     <script type="text/javascript">
        $(".input").focus(function() {
            $(this).parent().addClass("focus");
        })
     </script>
    <!--================ End Features Area =================-->
<?php
	include "includes/NewsLetter.php";
	include "includes/Footer.php";
?>