<?php
    require "database.php";
    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    if (!$conn) {
        die ("ERROR: ".mysqli_connect_error());
    }   
    $username = $_GET['q'];
    $sql = "SELECT uidUsers FROM users WHERE emailUsers=?";
    $stmt = mysqli_stmt_init ($conn);
    if (!mysqli_stmt_prepare ($stmt, $sql)) {   
        echo mysqli_stmt_error($stmt);
        header("Location: ../signup.php?error=sqlerror");
        exit(); 
    } else {
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result ($stmt);
        $resultCheck = mysqli_stmt_num_rows($stmt);
        if ($resultCheck > 0) {
            echo "BAD";                   
        } else {
            echo "GOOD";
        }
    }
?>