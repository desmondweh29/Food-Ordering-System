<!DOCTYPE html>
<html>
  <head>
    <meta charset = "utf-8">
    <link rel="stylesheet" href="style_register.css">
    <script type="text/javascript" src="scripts/jquery-3.6.0.js" defer></script>
    <script type="text/javascript" src="scripts/register.js" defer></script>
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

        <form id= "register-form" action="" method="post">
            <div class="email-group">
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" placeholder="Enter your email..." required/>
            </div>

            <div class="password-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password..." required/>
            </div>

            <div class="password-confirm-group">
                <label for="password_confirm">Confirm Password</label>
                <input type="password" id="password_confirm" name="password_confirm" placeholder="Confirm your password..." required/>
            </div>

            <button type="submit" class="btn-green btn-left">Register</button>
            <button class="btn-red btn-right">Back</button>
        </form>
    </div>

  </body>

</html>
