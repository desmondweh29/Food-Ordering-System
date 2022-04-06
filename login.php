<!DOCTYPE html>
<html>
  <head>
    <meta charset = "utf-8">
    <link rel="stylesheet" href="styles/login-register.css">
    <title>YUM! - Login</title>
  </head>

  <body>

    <div class="bg-image"></div>

    <div class="form-container">
        <div>
            <img class="logo-register" src="./images/Yum!.png" alt="Yum! logo"/>
        </div>

        <div class="title">
            <p>Login</p>
        </div>

        <form id= "login-form" action="./include/logincheck.php" method="post">
            <div class="email-group">
                <label for="email">E-mail</label>
                <input type="text" id="email" name="email" placeholder="Enter your email..." />
            </div>

            <div class="password-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password..." />
            </div>

            <?php
            if (isset($_GET["error"])) {
                if($_GET["error"] == "emptyinput") {
                    echo "<p class=\"error\">Fill in all fields!</p>";
                }
                else if ($_GET["error"] == "invalidemail") {
                    echo "<p class=\"error\">Enter a valid email!</p>";
                }
                else if ($_GET["error"] == "wronglogin") {
                    echo "<p class=\"error\">Wrong email/password!</p>";
                }
            }
            else
            {
                echo "<br>";
            }
            ?>

            <div class="btn-group">
                <button type="submit" class="btn-green btn-left" name="login">Login</button>
                <button type="button" class="btn-red btn-right" onclick="document.location='index.php'">Back</button>
            </div>
        </form>

        <div class="login-link">
            <a class="text-left" href="./register.php">New here? Register now!</a>
            <a class="text-right" href="./forgot-password.php">Forgot password? Click here!</a>
        </div>


    </div>

  </body>

</html>
