<!DOCTYPE html>
<html>
  <head>
    <meta charset = "utf-8">
    <link rel="stylesheet" href="styles/login-register.css">
    <title>YUM! - Forgot password</title>
  </head>

  <body>

    <div class="bg-image"></div>

    <div class="form-container">
        <div>
            <img class="logo-register" src="./images/Yum!.png" alt="Yum! logo"/>
        </div>

        <div class="title">
            <p>Forgot password</p>
        </div>

        <form id= "forgot-password-form" action="./include/forgot-password.handler.php" method="post">
            <div class="email-group">
                <label for="email">Enter your email:</label>
                <input type="text" id="email" name="email" placeholder="Enter your email..." />
            </div>

            <?php
            if (isset($_GET["error"])) {
                if($_GET["error"] == "emptyinput") {
                    echo "<p class=\"error\">Fill in all fields!</p>";
                }
                else if ($_GET["error"] == "invalidemail") {
                    echo "<p class=\"error\">Enter a valid email!</p>";
                }
                else if ($_GET["error"] == "emailnotexist") {
                    echo "<p class=\"error\">Email is not registered!</p>";
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

            <div class="btn-group">
                <button type="submit" class="btn-green btn-left" name="submit" >Submit</button>
                <button type="button" class="btn-red btn-right" onclick="document.location='login.php'">Login</button>
            </div>
        </form>

    </div>

  </body>

</html>
