<?php
    if (isset($_POST['edit_save'])) {
        session_start ();
        require '../Database.php';
        $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
        if (!$conn) {
            die ("ERROR: ".mysqli_connect_error());
        }   
        
        $username = $_POST['uid'];
        $email = $_POST['mail'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $phone_number = $_POST['phone_number'];
        $img = $_POST['img'];
        $info = $_POST['myInfo'];
        $oldPassword = $_POST['curPassword'];
        $newPassword1 = $_POST['newPassword1'];
        $newPassword2 = $_POST['newPassword2'];

        $sql = "SELECT * FROM users WHERE uidUsers=?";
        $stmt = mysqli_stmt_init ($conn);
        if (!mysqli_stmt_prepare ($stmt, $sql)) {
            echo mysqli_stmt_error($stmt);
            //header("Location: ../login.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param ($stmt, "s", $_SESSION['userUid']);
            mysqli_stmt_execute ($stmt);
            $result = mysqli_stmt_get_result ($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                if (!password_verify($oldPassword, $row['pwdUsers'])) {
                    header("Location: edit_profile.php?error=wrongPassword");
                    exit();
                } 
            } else {
                header("Location: edit_profile.php?error=nouser");
                exit ();
            }
        }
        if ($newPassword1 != null && $newPassword1 != $newPassword2) {
            header("Location: .edit_profile.php?error=notEqualPasswords");
            exit ();
        }
        $sql = "UPDATE full_info SET username = ?, email= ?, name = ?, surname = ?,phone_number = ?,short_info = ?, img = ? WHERE username='".$_SESSION['userUid']."'";
        //echo $sql;
        $stmt = mysqli_stmt_init ($conn);
        if (!mysqli_stmt_prepare ($stmt, $sql)) {
            echo mysqli_stmt_error($stmt);
            //header("Location: ../login.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param ($stmt, "sssssss", $username, $email, $name, $surname, $phone_number, $info, $img);
            mysqli_stmt_execute ($stmt);
        }




        
        if ($newPassword1 != null) {
            $sql = "UPDATE users SET uidUsers = ?, emailUsers = ?, pwdUsers = ? WHERE idusers = ?";
            $stmt = mysqli_stmt_init ($conn);
            if (!mysqli_stmt_prepare ($stmt, $sql)) {   
                header("Location: edit_profile.php?error=sqlerror");
                exit(); 
            } else {
                $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                mysqli_stmt_bind_param($stmt, "sssi", $username, $email, $hashedPwd, $_SESSION['userId']);
                mysqli_stmt_execute($stmt);
            }
        } else {
            $sql = "UPDATE users SET uidUsers = ?, emailUsers = ? WHERE idusers = ?";
            echo $sql;
            $stmt = mysqli_stmt_init ($conn);
            if (!mysqli_stmt_prepare ($stmt, $sql)) {   
                header("Location: edit_profile.php?error=sqlerror");
                exit(); 
            } else {
                mysqli_stmt_bind_param($stmt, "ssi", $username, $email, $_SESSION['userId']);
                mysqli_stmt_execute($stmt);
            }
        }
        if ($username == $_SESSION['userUid']) {
            header("Location: ../../profile/$username.php");     
            exit();
        } else {

            $old_file = $_SERVER['DOCUMENT_ROOT']."/task/phpproj/profile/".$_SESSION['userUid'].".php";
            unlink ($old_file);

            $content = "<?php require 'default.php'; ?>";
            $fp = fopen($_SERVER['DOCUMENT_ROOT']."/task/phpproj/profile/".$username.".php","wb");
            fwrite($fp, $content);
            fclose($fp);
            $_SESSION['userUid'] = $username; 
            header("Location: ../../profile/$username.php"); 
        }
    } else {
        header("Location: edit_profile.php");
        exit();
    }
?>