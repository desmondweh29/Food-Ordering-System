<!DOCTYPE html>
<html>
  <head>
    <meta charset = "utf-8">
    <link rel="stylesheet" href="styles/login-register.css">
    <title>YUM! - Reset password</title>
  </head>

  <body>

    <div class="bg-image"></div>

    <div class="form-container">
        <div>
            <img class="logo-register" src="./images/Yum!.png" alt="Yum! logo"/>
        </div>


        <div class="title">
            <p>Reset password</p>
        </div>

        <form id= "register-form" method="post">
            <div class="password-group">
                <label for="password">Enter New Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password..." />
            </div>

            <div class="password-confirm-group">
                <label for="password_confirm">Confirm New Password</label>
                <input type="password" id="password_confirm" name="password_confirm" placeholder="Confirm your password..." />
            </div>

            <?php
            if (isset($_GET["error"])) {
                if($_GET["error"] == "emptyinput") {
                    echo "<p class=\"error\">Fill in all fields!</p>";
                }
                else if ($_GET["error"] == "passwordsdontmatch") {
                  echo "<p class=\"error\">Passwords do not match!</p>";
                }
                else if ($_GET["error"] == "stmtfailed") {
                    echo "<p class=\"error\">Something went wrong, try again!</p>";
                }
            }
            else
            {
                echo "<br>";
            }
            ?>

            <button type="submit" class="btn-green btn-left" name="submit">Submit</button>
            <button type="button" class="btn-red btn-right" onclick="document.location='index.php'">Home</button>
        </form>
    </div>
    <?php
          if(isset($_GET["token"])){
            require_once './include/db_handler.php';
            require_once './include/generalErrorHandling.php';
            $token = $_GET["token"];
            $email = $_GET["email"];

              if(isset($_POST["submit"])){
                $password = $_POST["password"];
                $password_confirm = $_POST["password_confirm"];

                if (emptyInputResetPassword($password, $password_confirm) !== false) {
                  header("location: reset-password.php?token=$token&email=$email&error=emptyinput");
                  exit();
                }
                
                if (pwdMatch($password, $password_confirm) !== false) {
                  header("location: reset-password.php?token=$token&email=$email&error=passwordsdontmatch");
                  exit();
                }

                fetchtoken($conn,$email,$token,$password);
                //return to register page?
                //need confirmation?
                header("location: ./reset-success.php");
                exit();
              }
            }else{
              
            }
        ?>

  </body>

</html>
