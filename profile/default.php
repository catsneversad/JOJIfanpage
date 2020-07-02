<?php
    session_start ();
    $url = $_SERVER['REQUEST_URI'];
    //echo $url."<br>";
    $l = strrpos($url, '/', -1) + 1;
    $r = strrpos($url, '.', -1) - 1;
    $cur_username = substr ($url, $l, $r - $l + 1);

    require '../includes/Database.php';
    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    if (!$conn) {
        die ("ERROR: ".mysqli_connect_error());
    }
    
    $sql = "SELECT * FROM full_info WHERE username=?";
    $stmt = mysqli_stmt_init ($conn);
    if (!mysqli_stmt_prepare ($stmt, $sql)) {
        echo mysqli_stmt_error($stmt);
        exit ();
    } else {
        mysqli_stmt_bind_param ($stmt, "s", $cur_username);
        mysqli_stmt_execute ($stmt);
        $result = mysqli_stmt_get_result ($stmt);
        $row = mysqli_fetch_assoc($result);
        $cur_id = $row['id'];
        $cur_email = $row['email'];
        $cur_name = $row['name'];
        $cur_surname = $row['surname'];
        $cur_phone_number = $row['phone_number'];
        $cur_short_info = $row['short_info'];
        $cur_img = $row['img'];
        $cur_role = $row['role'];
        $cur_join_date = $row['join_date'];
    }

    if ($cur_name == null) {
        $cur_name = "no name";
    }
    if ($cur_surname == null) {
        $cur_surname = "no surname";
    }
    if ($cur_phone_number == null) {
        $cur_phone_number = "no phone number";
    }
    if ($cur_short_info == null) {
        $cur_short_info = "no short info";
    }
    if ($cur_img == null) {
        $cur_img = "default.jpg";
    }

    $string = file_get_contents ("../includes/data.json");
    $array = json_decode ($string);
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/lgstyle.css">
    <link rel="stylesheet" type="text/css" href="../css/account_style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <nav>
        <div class="logo">
            <ul>
                <li><a href="../index.php">home</a></li>
            </ul>
        </div>
    </nav>
    <div class="container emp-profile">
        <div class="row">
            <div class="col-md-4">
                <div class="profile-img">
                    <img src="../img/profile_images/<?php echo $cur_img?>" alt="" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="profile-head">
                    <h5><?php echo $cur_surname. " ".$cur_name;?></h5>
                    <h6><?php echo $cur_short_info;?></h6>
                </div>
            </div>
            <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                <div class="text-center text-sm-right">
                    <span class="badge badge-secondary"><?php echo $cur_role;?></span>
                    <div class="text-muted"><small>Joined
                            <?php echo $cur_join_date;?></small></div>
                    <br>
                    <?php if (isset($_SESSION['userUid'])):?>
                    <button class="profile-edit-btn"><a href="../includes/profile_actions/edit_profile.php">Edit Profile</a></button>
                    <?php endif; ?>
            </div>
        </div>
    </div>
    <br><br>
    <div class="row">
        <div class="col-md-8">
            <div class="tab-content profile-tab" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Username</label>
                        </div>
                        <div class="col-md-6">
                            <p><?php echo $cur_username; ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Full name</label>
                        </div>
                        <div class="col-md-6">
                            <p><?php echo $cur_surname." ".$cur_name; ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Email</label>
                        </div>
                        <div class="col-md-6">
                            <p><?php echo $cur_email; ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Phone</label>
                        </div>
                        <div class="col-md-6">
                            <p><?php echo $cur_phone_number; ?></p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
    <div class="container emp-profile">
        <h3><?php echo $cur_username;?>'s buys</h3>
        <?php
            require '../includes/database.php';
            $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
            if (!$conn) {
                die ("ERROR: ".mysqli_connect_error());
            }   
            $sql = "SELECT * FROM buyinfo WHERE userId = ?";
            $stmt = mysqli_stmt_init ($conn);
            if (!mysqli_stmt_prepare ($stmt, $sql)) {   
                echo mysqli_stmt_error($stmt);
                header("Location: ../index.php");
                exit(); 
            } else {
                mysqli_stmt_bind_param($stmt, "i", $_SESSION["userId"]);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result ($stmt);
                $resultCheck = mysqli_stmt_num_rows($stmt);
                echo ("<div>Number of buys:".$resultCheck."</div>");

                $row = mysqli_fetch_assoc($result);
                    //echo ("<p>".$row['staffId']."</p>");
                //echo ('<div class="item"><div class="buttons"><span class="delete-btn"></span></div><div class="image"><img src="../img/'.$array[$row['staffId']]->url.'_small.jfif" width="75px" height = "75px" alt=""/></div><div class="description"><span>'.$array[$row['staffId']]->name.'</span></div></div>');
            }
        ?>
    </div>
</body>

</html>