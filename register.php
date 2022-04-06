<!DOCTYPE html>
<html>
  <head>
    <meta charset = "utf-8">
    <link rel="stylesheet" href="styles/login-register.css">
    <title>YUM! - Register</title>
  </head>

  <body>

    <div class="bg-image"></div>

    <div class="form-container">
        <div>
            <img class="logo-register" src="./images/Yum!.png" alt="Yum! logo"/>
        </div>

        <div class="title">
            <p>Register</p>
        </div>

        <form id= "register-form" action="./include/registercheck.php" method="post">
            <div class="email-group">
                <label for="email">E-mail</label>
                <input type="text" id="email" name="email" placeholder="Enter your email..."/>
            </div>

            <div class="password-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password..."/>
            </div>

            <div class="password-confirm-group">
                <label for="password_confirm">Confirm Password</label>
                <input type="password" id="password_confirm" name="password_confirm" placeholder="Confirm your password..."/>
            </div>

            <?php
            if (isset($_GET["error"])) {
                if($_GET["error"] == "emptyinput") {
                    echo "<p class=\"error\">Fill in all fields!</p>";
                }
                else if ($_GET["error"] == "invalidemail") {
                    echo "<p class=\"error\">Enter a valid email!</p>";
                }
                else if ($_GET["error"] == "passwordsdontmatch") {
                    echo "<p class=\"error\">Password and Confirm Password do not match!</p>";
                }
                else if ($_GET["error"] == "emailtaken") {
                    echo "<p class=\"error\">Email taken, use another email!</p>";
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

            <button type="submit" class="btn-green btn-left" name ="register">Register</button>
            <button type="button" class="btn-red btn-right" onclick="document.location='login.php'">Back</button>
        </form>
        

    </div>

  </body>

</html>
