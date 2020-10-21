<?php
session_start();
include "includes/TopMost.php";
?>
	<title>SIGNIN | POORNIMA HACKATHON</title>
<?php
	include "includes/Top.php";
	include "includes/Header.php";
	//include "includes/Banner.php";
?>
	<!--================ Start Features Area =================-->
	<style>
	    span{
	        color:red;
	        text-align:center;
	        font-size:16px;
	        font-family:none;
	    }
	</style>
	  <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content text-center">
                    <h2>Login</h2>
                    <div class="page_link">
                        <a href="index.php">Home</a>
                        <a href="Login.php">Login</a>
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
                        <h2>Login</h2>
                    </div>
                </div>
            </div>
          <div class="container-fluid">
        <div class="container">
            <div class="formBox">
                <form method="POST" action="http://poornimahackathon.tech/Team/auth.php">
                    <?php if($_REQUEST["err"]==1){echo "<span>Invalid Email and password ?</span>";}?>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="inputBox ">
                                    <div class="inputText">Team leader email</div>
                                    <input type="email" name="TeamLeaderEmail" class="input">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="inputBox ">
                                    <div class="inputText">Password</div>
                                    <input type="password" name="TeamPassword" class="input">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <input type="submit" name="" class="button" value="Login">
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
<?php
	include "includes/NewsLetter.php";
	include "includes/Footer.php";
?>