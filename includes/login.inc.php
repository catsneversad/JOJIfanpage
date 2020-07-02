<?php 
    if (isset($_POST['login-submit'])) {
        require 'Database.php';
        $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
        if (!$conn) {
            die ("ERROR: ".mysqli_connect_error());
        }   
        $mailuid = $_POST['mailuid'];
        $password = $_POST['pwd'];

        if (empty($mailuid) || empty($password)) {
            header("Location: ../login.php?error=emptyfields");
            exit();
        } else {
            $sql = "SELECT * FROM users WHERE uidUsers=? OR emailUsers=?;";
            $stmt = mysqli_stmt_init ($conn);
            if (!mysqli_stmt_prepare ($stmt, $sql)) {
                echo mysqli_stmt_error($stmt);
                //header("Location: ../login.php?error=sqlerror");
                exit();
            } else {
                mysqli_stmt_bind_param ($stmt, "ss", $mailuid, $mailuid);
                mysqli_stmt_execute ($stmt);
                $result = mysqli_stmt_get_result ($stmt);
                if ($row = mysqli_fetch_assoc($result)) {
                    if (!password_verify($password, $row['pwdUsers'])) {
                        header("Location: ../login.php?error=wrongpwd");
                        exit();
                    } else {

                        session_start();
                        $_COOKIE['userId'] = $row['idusers'];
                        //echo $_COOKIE['userId'];
                        $_SESSION['userId'] = $row['idusers'];
                        $_SESSION['userUid'] = $row['uidUsers'];
                        
                        echo $_SESSION['userUid'];

                        $sql = "SELECT * FROM full_info WHERE username = ?";
                        $stmt = mysqli_stmt_init ($conn);
                        if (!mysqli_stmt_prepare ($stmt, $sql)) {
                            echo mysqli_stmt_error($stmt);
                            exit ();
                        } else {
                            mysqli_stmt_bind_param ($stmt, "s", $row['uidUsers']);
                            mysqli_stmt_execute ($stmt);
                            $result = mysqli_stmt_get_result ($stmt);
                            $row = mysqli_fetch_assoc($result);
                            $_SESSION['role'] = $row['role'];
                        }
                        header("Location: ../index.php");
                        //exit ();
                    }
                } else {
                    header("Location: ../login.php?error=nouser");
                    exit ();
                }
            }
        }
    } else {
        header("Location: ../index.php");
        exit();
    } 
?>