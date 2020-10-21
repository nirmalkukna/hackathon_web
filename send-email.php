<?php
function sendMail($conn ,$verifyId){
    $stmt=$conn->prepare("select teamLeaderName ,emailId,OTP_PIN from tblteam where teamId=:verifyId");
    $stmt->bindParam(":verifyId",$verifyId);
    $stmt->execute();
    $data=$stmt->fetchAll();
    foreach($data as $row)
    {
        $EmailId=$row["emailId"];
        $leaderName=$row["teamLeaderName"];
        $leaderName=$row["teamLeaderName"];
        $OTP_PIN=$row["OTP_PIN"];
    }
   require_once "PHPMailer/PHPMailerAutoload.php";

$mail = new PHPMailer;

//Enable SMTP debugging. 
//$mail->SMTPDebug = 3;                               
//Set PHPMailer to use SMTP.
$mail->isSMTP();            
//Set SMTP host name                          
    $mail->Host = "smtp.hostinger.in";
    //Set this to true if SMTP host requires authentication to send email
    $mail->SMTPAuth = true;                          
    //Provide username and password     
    $mail->Username = "info@poornimahackathon.tech";                 
    $mail->Password = "eshop@786";                           
    //If SMTP requires TLS encryption then set it
    $mail->SMTPSecure = "tls";                           
    //Set TCP port to connect to 
    $mail->Port = 587 ;                                   
    
    $mail->From = "info@poornimahackathon.tech";
    $mail->FromName = "Hackathon";                    
    
    $mail->From = "info@poornimahackathon.tech";
    $mail->FromName = "Hackathon";
    $mail->addAddress($EmailId, $leaderName);
    $mail->isHTML(true);
    $mail->Subject = "Verification Eamil";
    $mail->Body = '
        <h5 style="color:blue;text-align:center;font-family:italic;">Welcome To Hackathone Event '.$leaderName.'.Your One Time Password is :'.$OTP_PIN.'</h5>
    ';
    $mail->AltBody = "This is the plain text version of the email content";
    
    if(!$mail->send()) 
    {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } 
}
?>
