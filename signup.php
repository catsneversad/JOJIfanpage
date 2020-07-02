<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/lgstyle.css">

    <script>
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        function isEmail(email) {
          const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
          return re.test(String(email).toLowerCase());
        }

        function isAlreadyUsed (tmpMail) {
          var xhttp;
          if (isEmail (tmpMail)) {
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                if (this.responseText == "GOOD") {
                  $("#goodfromAjax_mail").html ("Good EMAIL");
                  return;
                } else {
                  $("#badfromAjax_mail").html ("Already used");
                  return;
                }
              }
            }

            xhttp.open("GET", "includes/checkMail.php?q="+tmpMail, true);
            xhttp.send();
          } 
        }

        function isAlreadyUsername (Username) {
          var xhttp;
          xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              if (this.responseText == "GOOD") {
                $("#goodfromAjax_username").html ("Good username");
                return;
              } else {
                $("#badfromAjax_username").html ("Already used");
                return;
              }
            }
          }
          xhttp.open("GET", "includes/checkUsername.php?q="+Username, true);
          xhttp.send();
        }

        function debounce(func, wait, immediate) {
          var timeout;
          return function() {
            var context = this, args = arguments;
            var later = function() {
              timeout = null;
              if (!immediate) func.apply(context, args);
            };
            var callNow = immediate && !timeout;
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
            if (callNow) func.apply(context, args);
          };
        };


        $('#mail').on('keyup', debounce(function () {
          var tmp = document.getElementById("mail").value;
          $("#goodfromAjax_mail").html ("x");
          $("#badfromAjax_mail").html ("");
          if (isEmail (tmp)) {
            isAlreadyUsed (tmp)
          }
        }, 200));

        $('#uid').on ('keyup', debounce (function () {
          var tmp = document.getElementById("uid").value;
          $("#goodfromAjax_username").html ("");
          $("#badfromAjax_username").html ("");
          if (tmp.length)
            isAlreadyUsername (tmp);
        }, 200));
      });
    </script>

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
        <form action="includes/signup.inc.php" method="post">
            <div class="login-box">
                <?php 
                    if (isset($_GET['error'])) {
                        if ($_GET['error'] == "emptyfields") {
                            echo '<p class="signuperror"> FILL IN ALL FIELDS!</p>';
                        }
                        if ($_GET['error'] == "invalidmailuid") {
                            echo '<p class="signuperror"> FILL VALID MAIL AND USERNAME!</p>';
                        }
                        if ($_GET['error'] == "invalidmail") {
                            echo '<p class="signuperror"> FILL VALID MAIL!</p>';
                        }
                        if ($_GET['error'] == "invaliduid") {
                            echo '<p class="signuperror"> FILL VALID USERNAME!</p>';
                        }
                        if ($_GET['error'] == "passwordcheck") {
                            echo '<p class="signuperror"> PASSWORDS NOT EQUAL!</p>';
                        }
                        if ($_GET['error'] == "sqlerror") {
                            echo '<p class="signuperror"> ERROR 500</p>';
                        }
                    } elseif (isset($_GET['signup']) && $_GET['signup'] == "success") {
                        echo '<p class="signupok"> SUCCESSFUL SINGUP</p>';
                    } 
                 ?>
              <h1>Sign up</h1>
              <div class="textbox">
                <i class="fas fa-user"></i>
                <input type="text" name="uid" id="uid" placeholder="Username">
                <p class="good" id="goodfromAjax_username"></p>
                <p class="bad" id="badfromAjax_username"></p>
              </div>

              <div class="textbox">
                <i class="fas fa-mail-bulk"></i>
                <input type="text" id = "mail" name="mail" placeholder="E-mail">
                <p class="good" id="goodfromAjax_mail"></p>
                <p class="bad" id="badfromAjax_mail"></p>
              </div>

              <div class="textbox">
                <i class="fas fa-lock"></i>
                <input type="password" name="pwd" placeholder="Password">
              </div>

              <div class="textbox">
                <i class="fas fa-lock"></i>
                <input type="password" name="pwd-repeat" placeholder="Repeat password">
              </div>

              <input type="submit" class="btn" name="signup-submit" value="Sign up">
            </div>
        </form>
    </main>

<?php 
    require "footer.php";
?>