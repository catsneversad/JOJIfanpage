<?php 
  session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <title>new</title>
  <link rel="stylesheet" type="text/css" href="css/styles.css">
  <script src="js/script.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
            crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 

  <script>
    var was = [];
    var array = [];
    for (var i = 0; i < 100; i ++) {
      was[i] = 0;
    }
  </script>

</head>

<body>
    <nav>
      <div class="logo">
        <ul>
          <li><a href="index.php">home</a></li>
        </ul>
      </div>
    <ul>
      <!-- <li><a href="forum.php">forum</li> -->

      <?php if (isset($_SESSION['userUid'])):?>
      <li><a href="profile/<?php echo $_SESSION['userUid'];?>.php"><?php echo $_SESSION['userUid'];?></a></li>
      <li style="padding-top: 12px;">
        <form action="includes/logout.inc.php" method="post">
          <input type="submit" class="btn" name="logout-submit" value="logout">
        </form>
      </li>
      <?php endif; ?>
      <?php if (!isset($_SESSION['userUid'])):?>
      <li><a class="spln" href="login.php">login</a></li>      
      <li><a class="spln" href="signup.php">signup</a></li>
      <?php endif; ?>
    </ul>
  </nav>