<?php include "includes/TopMost.php";?>
	<title>FAQs | POORNIMA HACKATHON</title>
<?php
	include "includes/Top.php";
	include "includes/Header.php";
	//include "includes/Banner.php";
	echo '<link rel="stylesheet" href="css/bootstrap.css">';
echo '<link rel="stylesheet" href="vendors/linericon/style.css">';
echo '<link rel="stylesheet" href="css/font-awesome.min.css">';
echo '<link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">';
echo '<link rel="stylesheet" href="css/magnific-popup.css">';
echo '<link rel="stylesheet" href="vendors/nice-select/css/nice-select.css">';
echo '<link href="https://unpkg.com/ionicons@4.4.4/dist/css/ionicons.min.css" rel="stylesheet">';

echo '<link rel="stylesheet" href="css/style.css">';
	
?>

<section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content text-center">
                    <h2>FAQs</h2>
                    <div class="page_link">
                        <a href="index.php">Home</a>
                        <a href="FAQ.php">FAQs</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ End Banner Area =================-->

	<!--================ Start Features Area =================-->
	<section class="features_area section_gap_top">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <div class="main_title">
                        <h2>FAQs</h2>
                        
                    </div>
                </div>
            </div>
            <div class="accordion">
    <div class="accordion-item">
      <a>TEAMING UP</a>
      <div class="content">
        <p>1. All team members should be from same college; no inter-college teams are allowed.<br>
2. However, members from different branches of the same college can form a team.<br>
3. Each team would comprise of 4 members. <br>
4. All members MUST be well versed with programming skills<br>
5. Once the team is registered it will be showed on website.<br>
</p>
      </div>
    </div>
    <div class="accordion-item">
      <a>How to submit the Idea?</a>
      <div class="content">
        <p>1. One Team can submit ONLY ONE Idea.<br>
2. Submission dates should be strictly followed. No exceptions will be made.<br>
3. Participants should submit their innovation by filling form available on website.<br>
4. After filling the form which is in pdf format.<br>
5. Entries to be sent only in the prescribed format; otherwise they are bound to get rejected.<br>
6. Requests for changes in the Ideas post the cut off date shall not be entertained. Teams will not be edit any team details once the form is submitted.</p>
      </div>
    </div>
    <div class="accordion-item">
      <a>METHODOLOGY</a>
      <div class="content">
        <p>1. The participants will have to choose the problem and register themselves in the contest.<br>
2. The participants will be given to solve the real time technical problems faced by various companies.<br>
3. Then the students have to register for the Hackathon which will be the Grand Finale where they have to stay in the college and code here for 24 Hrs. <br>
</p>
      </div>
    </div>
    <div class="accordion-item">
      <a>SELECTION CRITERIA</a>
      <div class="content">
        <p>1. Evaluation criteria will include novelty of the idea,complexity,clarity and details in the prescribed format, feasibility, practicability, sustainability, scale of impact,user experience and potential for future work progression.<br>
2. The judging of the hackathon is generally based on the demo presentation given by the team.<br>
3. The 3 main judge decides the final winner according to the different criteria such as:-<br>
3.1.   visibility<br>
3.2.   Awesomeness<br>
3.3.   Technological Stack<br>
3.4.   Impact Created<br>
</p>
      </div>
    </div>
    
  </div>
        </div>
    </section>
     <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/stellar.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
    <script src="vendors/isotope/imagesloaded.pkgd.min.js"></script>
    <script src="vendors/isotope/isotope-min.js"></script>
    <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/mail-script.js"></script>
    <!--gmaps Js-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
    <script src="js/gmaps.min.js"></script>
    <script src="js/theme.js"></script>
    <script>
    	const items = document.querySelectorAll(".accordion a");

function toggleAccordion(){
  this.classList.toggle('active');
  this.nextElementSibling.classList.toggle('active');
}

items.forEach(item => item.addEventListener('click', toggleAccordion));
    </script>
		<!--================ End Features Area =================-->
<?php
	include "includes/NewsLetter.php";
	include "includes/Footer.php";
?>