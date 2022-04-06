<!DOCTYPE html>
<html>
  <head>
    <meta charset = "utf-8">
    <link rel="stylesheet" href="styles/login-register.css">
    <title>YUM! - Email Sent!</title>
  </head>

  <body>

    <div class="bg-image"></div>

    <div class="form-container">
        <div>
            <img class="logo-register" src="./images/Yum!.png" alt="Yum! logo"/>
        </div>


        <div class="title">
            <p>Email Sent!</p>
        </div>

        <h2>We have sent an email to  <a href="mailto:<?php echo $_GET['email'] ?>"><?php echo $_GET['email'] ?></a> to help you recover your account. </h2>
        <br>
        <h4>Please login into your email account and click on the link we have sent to reset your password.</h4>
    </div>

  </body>

</html>

