<?php
    session_start ();
    if (!isset ($_SESSION['userId'])) {
        $_SESSION['userId'] = "guest";
    }
    $cookieName = "userBuyItems_".$_SESSION['userId'];
    $array = json_decode ($_COOKIE[$cookieName]);

    $string = file_get_contents ("data.json");
    $json = json_decode ($string);


    $resArray = [];
    foreach ($array as $key => $value) {
        foreach ($json as $keyj => $valuej) {
            if ($valuej->id == $value->id) {
                array_push ($resArray, $valuej);
                break;
            }
        }
    }

    require 'database.php';
    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    if (!$conn) {
        die ("ERROR: ".mysqli_connect_error());
    }   

    foreach ($resArray as $key => $value) {
        $sql = "INSERT INTO buyinfo (userId, staffId, num) VALUES (?, ?, ?)";
        $stmt = mysqli_stmt_init ($conn);
        if (!mysqli_stmt_prepare ($stmt, $sql)) {   
            header("Location: ../index.php");
            exit(); 
        } else {
            mysqli_stmt_bind_param($stmt, "iii", $_SESSION['userId'], $value->id, $array[$key]->cnt);
            mysqli_stmt_execute($stmt); 
        }
        header("Location: ../profile/".$_SESSION['userUid'].".php");
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php if ($_SESSION['userId'] == "guest"):?>
    <script>alert ("You are buying all this staff as guest. If you wanna save what you but please open new account or login.")</script>;
    <?php endif; ?>
    </div>
</body>

</html>