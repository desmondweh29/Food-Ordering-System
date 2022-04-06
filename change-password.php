<?php
    include_once 'header.php';
?>
    <style>
        <?php include 'styles/login-register.css' ?>
    </style>

<div class="container-lg">
    <div class="title-profile">
        <p>Change password</p>
    </div>

    <form id= "register-form" action="./include/change-password.handler.php" method="post">
    <div class="password-group">
            <label for="password">Enter Current Password</label>
            <input type="password" id="password_current" name="password_current" placeholder="Enter your current password..." />
        </div>
        <br>

        <div class="password-group">
            <label for="password">Enter New Password</label>
            <input type="password" id="password_new" name="password_new" placeholder="Enter your new password..." />
        </div>
        <br>
        <div class="password-confirm-group">
            <label for="password_confirm">Confirm New Password</label>
            <input type="password" id="password_confirm" name="password_confirm" placeholder="Confirm your new password..." />
        </div>

        <?php
        if (isset($_GET["error"])) {
            if($_GET["error"] == "emptyinput") {
                echo "<p class=\"error\">Fill in all fields!</p>";
            }
            else if ($_GET["error"] == "passwordsdontmatch") {
                echo "<p class=\"error\">Passwords do not match!</p>";
            }
            else if ($_GET["error"] == "currentpasswordwrong") {
                echo "<p class=\"error\">Wrong current password!</p>";
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

        <button type="submit" class="btn btn-primary" name="submit" id="chgpwd-submit">Change password</button>
    </form>
</div>
    
<?php
    include_once 'footer.php';
?>