<?php 
    if (isset($_POST['signup-submit'])) {
        require 'database.php';
        $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
        if (!$conn) {
            die ("ERROR: ".mysqli_connect_error());
        }   
        $username = $_POST['uid'];
        $email = $_POST['mail'];
        $password = $_POST['pwd'];
        $password_rep = $_POST['pwd-repeat'];

        if (empty($username) || empty($email) || empty($password) || empty($password_rep)) {
            header("Location: ../signup.php?error=emptyfields");
            exit();
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-0]*$/", $username)) {
            header("Location: ../signup.php?error=invalidmailuid");
            exit();
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header("Location: ../signup.php?error=invalidmail");
            exit();
        } elseif (!preg_match("/^[a-zA-Z0-0]*$/", $username)) {
            header("Location: ../signup.php?error=invaliduid");
            exit();
        } elseif ($password !== $password_rep) {
            header("Location: ../signup.php?error=passwordcheck");
            exit();
        } else {
            $sql = "SELECT uidUsers FROM users WHERE uidUsers=?";
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
                    header("Location: ../signup.php?error=usertaken&mail=".$email);
                    exit();                         
                } else {
                    $sql = "INSERT INTO users (uidUsers, emailUsers, pwdUsers) VALUES (?, ?, ?)";
                    $stmt = mysqli_stmt_init ($conn);
                    if (!mysqli_stmt_prepare ($stmt, $sql)) {   
                        header("Location: ../signup.php?error=sqlerror");
                        exit(); 
                    } else {
                        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                        mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
                        mysqli_stmt_execute($stmt);
                        $sql = "INSERT INTO full_info (username, email, role, join_date) VALUES (?, ?, ?, ?)";
                        $stmt = mysqli_stmt_init ($conn);
                        if (!mysqli_stmt_prepare ($stmt, $sql)) {   
                            header("Location: ../signup.php?error=sqlerror");
                            exit(); 
                        } else {
                            $now_date = date("Y-m-d");
                            $now_role = "user";
                            mysqli_stmt_bind_param($stmt, "ssss", $username, $email, $now_role, $now_date);
                            mysqli_stmt_execute($stmt);

                            $content = "<?php require 'default.php'; ?>";
                            $fp = fopen($_SERVER['DOCUMENT_ROOT']."/task/phpproj/profile/".$username.".php","wb");
                            fwrite($fp, $content);
                            fclose($fp); 
                            header("Location: ../signup.php?signup=success");     
                            exit(); 
                        }
                    }
                }
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close ($conn);
    } else {
        header("Location: ../signup.php");
        exit();
    } 
?>