<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/lgstyle.css">
</head>

<body>
    <nav>
      <div class="logo">
        <ul>
          <li><a href="index.php">home</a></li>
        </ul>
      </div>
    </nav>
    <main>
        <form action="includes/login.inc.php" method="post">
            <div class="login-box">
              <?php 
                    if (isset($_GET['error'])) {
                        if ($_GET['error'] == "emptyfields") {
                            echo '<p class="signuperror"> FILL IN ALL FIELDS!</p>';
                        }
                        if ($_GET['error'] == "wrongpwd") {
                            echo '<p class="signuperror"> WRONG PASSWORD!</p>';
                        }
                        if ($_GET['error'] == "nouser") {
                            echo '<p class="signuperror"> NO SUCH USER!</p>';
                        }
                    }  
                 ?>
              <h1>Login</h1>
              <div class="textbox">
                <i class="fas fa-user"></i>
                <input type="text" name="mailuid" placeholder="Username/E-mail">
              </div>

              <div class="textbox">
                <i class="fas fa-lock"></i>
                <input type="password" name="pwd" placeholder="Password">
              </div>

              <input type="submit" class="btn" name="login-submit" value="Login">
            </div>
        </form>
    </main>

<?php 
    require "footer.php";
?>