<?php
    session_start ();
    //$item_id = $_GET['id'];
    $string = file_get_contents ("data.json");
    $array = json_decode ($string);
    foreach ($array as $key => $value) {
        if ($value->id == $_GET['id']) {
            $item_id = $key;
            break;
        }
    } 
    //echo $item_id;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
            crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <link rel="stylesheet" type="text/css" href="../css/lgstyle.css">
</head>
<body style="background-color: white">
    <nav>
      <div class="logo">
        <ul>
          <li><a href="../index.php" style="color: black;">home</a></li>
        </ul>
      </div>
    </nav>
    <div class="container text-center">
        <h3><?php echo $array[$item_id]->name?></h3>
        <img src="../<?php echo $array[$item_id]->url?>" alt="">
        <h2><?php echo $array[$item_id]->price?>KZT</h2>
        <?php if (isset ($_SESSION['role']) && $_SESSION['role'] == 'admin'): ?>
        <form action="change_item.inc.php?id=<?php echo $_GET['id'];?>" method="post">
            <button type="submit" class="btn btn-dark" id = "change_price" name = "changeButton" id = "changeButton">CHANGE PRICE</button>
            <label for="change_price"><input type="text" class="form-control" id="changeamount" name="changeamount" placeholder="Enter new price in TENGE"></label><br><br>
            <button type="submit" class="btn btn-dark" name = "deleteButton" id = "deleteButton"><a></a>DELETE</button> <br><br><br>  
        </form>
        <?php endif; ?>
    </div>
</body>
</html>