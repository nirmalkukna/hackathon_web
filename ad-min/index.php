<?php
error_reporting(0);
error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
	
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Signin || Hackathon Control Panel</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    
    <!-- Bootstrap core CSS -->
    <style>
        html,
        body {
          height: 100%;
        }
        
        body {
          display: -ms-flexbox;
          display: -webkit-box;
          display: flex;
          -ms-flex-align: center;
          -ms-flex-pack: center;
          -webkit-box-align: center;
          align-items: center;
          -webkit-box-pack: center;
          justify-content: center;
          padding-top: 40px;
          padding-bottom: 40px;
          background-color: #6c757d;
        }
        
        .container .row .col-md-4 .form-signin {
          width: 100%;
          max-width: 330px;
          padding: 15px;
          margin: 0 auto;
        }
        .container .row .col-md-4 .form-signin .checkbox {
          font-weight: 400;
        }
        .container .row .col-md-4 .form-signin .form-control {
          position: relative;
          box-sizing: border-box;
          height: auto;
          padding: 10px;
          font-size: 16px;
          margin-top: 15px;
          height: 40px;
        }
        .container .row .col-md-4 .form-signin .form-control:focus {
          z-index: 2;
        }
        .container .row .col-md-4 .form-signin input[type="email"] {
          margin-bottom: -1px;
          border-bottom-right-radius: 0;
          border-bottom-left-radius: 0;
        }
        .container .row .col-md-4 .form-signin input[type="password"] {
          margin-bottom: 10px;
          border-top-left-radius: 0;
          border-top-right-radius: 0;
        }
       .container .row .col-md-4 form #logo{
            font-size: 47px;
            font-weight: 753px;
            font-family: fantasy;
            background: steelblue;
            background-size: 30px;
            width: 85px;
            height: 66px;
            float: center;
            color: white;
            border-radius: 8px;
            margin-left: 100px;
        }
    </style>
  </head>
  <body class="text-center">
     <div class="container">
         <div class="row">
             <div class="col-md-4 offset-md-4 col-sm-8 offset-sm-2 col-xs-12">
                <form class="form-signin" action="auth.php" method="post">
                  <h4>Admin Control Panel.</h4>
                  <h3 class="text-center" style="font-size: 25px; font-family: fantasy;font-weight: bolder;">Plese Sign in Account.</h3>
                  <p style="text-align:center;">Plese,fill the correct details of below username and password for loging into the control panel of this website.</p>
                  <?php if($_REQUEST["err"]=="1")
                    {?>
                        <div class="alert alert-danger alert-dismissible" role="alert" style="font-size:16px;font-family:none;border-radius:0px;">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>Sorry!</strong> Invalid username or password?
                        </div>
                    <?php
                    }?>
                    <?php if($_REQUEST["err"]=="2")
                    {?>
                        <div class="alert alert-danger alert-dismissible" role="alert" style="font-size:16px;font-family:none;border-radius:0px;">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>Sorry!</strong> Your account is not active?
                        </div>
                    <?php
                    }?>
                  <input type="text" name="userName" class="form-control" placeholder="Username" required="" autofocus="">
                  <input type="password"  name="password" class="form-control" placeholder="Password" required="">
                  <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                  <p class="mt-5 mb-3 text-muted">© 2019-2020</p>
                </form> 
             </div>
         </div>
     </div>
    
  </body>
</html>
