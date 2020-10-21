<?php
    session_start();
    $verifyId=$_SESSION["LastId"];
    include "databaseConnect.php";
    $stmt=$conn->prepare("select emailId from tblteam where teamId = :verifyId");
    $stmt->bindParam(":verifyId",$verifyId);
    $stmt->execute();
    $data= $stmt->fetchAll();
    foreach($data as $row)
    {
        $emailID=$row["emailId"];
    }
    
?>

<html>
	<head>
		<meta charset="utf-8"> 
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Email Verification</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
		<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.5.0/css/all.css' integrity='sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU' crossorigin='anonymous'>
	    <!--<script src="js/move-top.js"></script>-->
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
	    <!--<link rel="stylesheet" href="css/style.css">-->
	    <style>
          #conform-email-section{
              margin-top:40px;
          }
	      #conform-email-section .container .row .section-body .card .card-header h5{
            color: white;
            font-size: 17px;
            font-family: inherit;
	      }
	       #conform-email-section .container .row .section-body .card .card-fotter {
	           border-radius: 0px;
	       }
	        #conform-email-section .container .row .section-body .card .card-header {
	           border-radius: 0px;
	       }
	      #conform-email-section .container .row .section-body .card .card-fotter h5{
            color: white;
            font-size: 17px;
            font-family: inherit;
            padding: 10px;
            border-radius:0px;
	      }
	       #partitioned {
              padding-left: 15px;
              letter-spacing: 42px;
              border: 0;
              background-image: linear-gradient(to left, black 70%, rgba(255, 255, 255, 0) 0%);
              background-position: bottom;
              background-size: 50px 1px;
              background-repeat: repeat-x;
              background-position-x: 35px;
              width: 220px;
            }
	       #conform-email-section .container .row .section-body .card .card-body h6{
	          color: currentColor;
            font-size: 16px;
            font-family: inherit;
	       }
	       
	    </style>
	</head>
	<body>
        <div id="conform-email-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-4  offset-md-4 col-sm-6 offset-sm-3 col-xs-10 offset-xs-1 section-body">
                        <div class="card">
                            <div class="card-header  text-white" style="background: steelblue;">
                                <h5 class="text-center">Verify Eamil Address</h5>
                                <h5 class="text-center"><?php echo $emailID;?></h5>
                            </div>
                            <div class="card-body">
                                
                                <h6 class="text-center">Enter 4 digit verification code</h6>
                                
                                <hr>
                                <center>
                                   <form  method="post">
                                        <input id="partitioned" name="otp" type="number"  maxlength="3" />
                                        <hr>
                                        <button type="submit" class="btn " id="SEND" name="Send Message" value="Send Message" style="width:100%;background: #4CAF50;border-width:color:white; 0px;border-radius: 0px;">SEND</button>
                                    </form> 
                                </center>
                                
                            </div>
                            <div class="card-fotter  text-white" style="background: steelblue;text-align:center;">
                                <small class="text-center">Check Your Inbox Box of Mail.</small>
                                <h5 class="text-center"><a href="" style="color:white;text-decoration:none;" id="resend_otp">Resend OTP</a></h5>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
        <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>
            var obj = document.getElementById('partitioned');
            obj.addEventListener("keydown", stopCarret); 
            obj.addEventListener("keyup", stopCarret); 
            
            function stopCarret() {
            	if (obj.value.length > 3){
            		setCaretPosition(obj, 3);
            	}
            }
            
            function setCaretPosition(elem, caretPos) {
                if(elem != null) {
                    if(elem.createTextRange) {
                        var range = elem.createTextRange();
                        range.move('character', caretPos);
                        range.select();
                    }
                    else {
                        if(elem.selectionStart) {
                            elem.focus();
                            elem.setSelectionRange(caretPos, caretPos);
                        }
                        else
                            elem.focus();
                    }
                }
            }
        </script>
        <script>
            $(document).ready(function(){
              $("#SEND").click(function(e){
                    e.preventDefault();
                    otp= $('#partitioned').val();
                    $.ajax({
                         type: "POST",
                         url: 'verify-email.php',
                         data: {otp:otp},
                         success: function(data) {
                            if(data=="1"){
                                alert("Your Email is Verified By Us.");
                                top.location.href = 'index.php';
                            }
                            else{
                                alert(data);
                            }
                                 
                         }
                    });
              });
            });
         </script>
         <script>
            $(document).ready(function(){
              $("#resend_otp").click(function(e){
                    e.preventDefault();
                    var result = confirm("Do you want to resend otp ?");
                    if(result==true)
                    {
                        $.ajax({
                         type: "POST",
                         url: 'Resend-Mail.php',
                         data: {},
                            success: function(data) {
                                if(data=="1")
                                {
                                    alert("OTP is send check your Inbox.")
                                }
                                 
                            }
                        });
                    }
                    else{
                        return false;
                    }
                    
              });
            });
         </script>
	</body>
</html>